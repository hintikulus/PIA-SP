<?php

namespace App\UI\Components\Project;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Database\EntityManager;
use App\Model\Utils\DateTime;
use App\Model\Utils\Html;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Contributte\Translation\Translator;
use Doctrine\ORM\QueryBuilder;
use Nette\Security\User;
use Ublaboo\DataGrid\AggregationFunction\IAggregationFunction;
use Ublaboo\DataGrid\AggregationFunction\IMultipleAggregationFunction;
use Ublaboo\DataGrid\Column\Action\Confirmation\StringConfirmation;

class ProjectUserAllocationGrid extends BaseComponent
{
	private AllocationFacade $allocationFacade;

	private int $projectId;

	public function __construct(
		AllocationFacade $allocationFacade,
		User             $user,
		Translator       $translator,
		int              $projectId,
	)
	{
		$this->allocationFacade = $allocationFacade;
		$this->user = $user;
		$this->translator = $translator;
		$this->projectId = $projectId;
	}

	public function createComponentGrid()
	{
		$grid = new BaseGrid();

		$grid->setDataSource(
			$this->allocationFacade->getQueryBuilderForProjectAllocationGrid($this->projectId)
		);

		$grid->addColumnText('name', 'Pracovník')
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				return $projectAllocation->getUser()->getFullname();
			})
		;

		$grid->addColumnNumber('allocation', 'Alokace (h/w)')
			->setFormat(2, ',', ' ')
		;

		$grid->addColumnNumber('allocation_fte', 'Alokace (FTE)')
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				return $projectAllocation->getAllocationFTE();
			})
			->setFormat(2, ',', ' ')
		;

		$grid->addColumnDateTime("from", "Od")
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				return $projectAllocation->getTimespanFrom()?->format(App::DATE_FORMAT) ?? "-";
			})
		;

		$grid->addColumnDateTime("to", "Do")
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				return $projectAllocation->getTimespanTo()?->format(App::DATE_FORMAT) ?? "-";
			})
		;

		$grid->addColumnText("description", "Popis")
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				if ($projectAllocation->getDescription() === null)
				{
					return "-";
				}

				return Html::el('i', [
					"class"             => "fas fa-info-circle",
					"data-bs-toggle"    => "tooltip",
					"data-bs-placement" => "top",
					"data-bs-title"     => $projectAllocation->getDescription(),
				]);
			})
			->setAlign('center')
		;

		$grid->addColumnAllocationStatus('stats', 'Status');

		if ($this->user->isAllowed("Admin:Project:allocationAdd"))
		{
			$grid->addAction("allocationEdit", "Upravit", ":allocationEdit")
				->setClass("btn btn-outline-secondary btn-sm mb-0 px-2")
				->setIcon("edit")
			;
		}

		if ($this->user->isAllowed("Admin:Project:allocationDelete"))
		{
			$grid->addAction("delete", "", "delete")
				->setIcon('trash')
				->setClass('btn btn-outline-danger btn-sm px-2 mb-0 ajax')
				->setConfirmation(new StringConfirmation("Opravdu chcete odstranit záznam?"))
				->setRenderCondition(function() {
					return true;
				})
			;
		}

		/**
		 * Row for aggregated data (hour sum)
		 */
		$grid->setMultipleAggregationFunction(
			new class implements IMultipleAggregationFunction {
				/** @var float */
				private float $projectAllocationSum = 0;

				/** @var float */
				private float $projectAllocationFTESum = 0;

				public function getFilterDataType(): string
				{
					return IAggregationFunction::DATA_TYPE_FILTERED;
				}

				public function processDataSource($dataSource): void
				{
					/** @var QueryBuilder $qm */
					$qm = clone $dataSource;
					$result = $qm->select('SUM(ar.allocation) as allocation_sum')->getQuery()->getArrayResult();
					$this->projectAllocationSum = round((float)$result[0]['allocation_sum'], 2);
					$this->projectAllocationFTESum = round((float)$result[0]['allocation_sum'] / App::FTE, 2);
				}


				public function renderResult(string $key): string
				{
					if ($key === 'allocation')
					{
						return 'Σ: ' . $this->projectAllocationSum . " h";
					}

					if ($key === 'allocation_fte')
					{
						return 'Σ: ' . $this->projectAllocationFTESum . " FTE";
					}

					return '';
				}
			}
		);

		return $grid;
	}

	public function handleDelete(int $id)
	{
		$result = $this->allocationFacade->delete($id);

		if ($result->isSuccess())
		{
			$this->presenter->flashMessage("Alokace byla úspěšně odstraněna.", "success");
			$this->presenter->redrawControl("flashMessages");
		}
		else
		{
			$this->presenter->flashMessage("Při odstraňování nastala chyba.", "danger");
			$this->presenter->redrawControl("flashMessages");
		}

		if ($this->presenter->isAjax())
		{
			/** @var BaseGrid $grid */
			$grid = $this["grid"];

			$grid->reload();
		}
	}
}
