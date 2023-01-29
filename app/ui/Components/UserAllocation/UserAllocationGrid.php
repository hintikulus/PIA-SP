<?php

namespace App\UI\Components\UserAllocation;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Utils\DateTime;
use App\Model\Utils\Html;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Contributte\Translation\Translator;
use Doctrine\ORM\QueryBuilder;
use Nette\Security\User;
use Ublaboo\DataGrid\AggregationFunction\IAggregationFunction;
use Ublaboo\DataGrid\AggregationFunction\IMultipleAggregationFunction;

class UserAllocationGrid extends BaseComponent
{
	private AllocationFacade $allocationFacade;
	private ?int $id;

	public function __construct(
		AllocationFacade $allocationFacade,
		User             $user,
		Translator       $translator,
		?int             $id,
	)
	{
		$this->allocationFacade = $allocationFacade;
		$this->user = $user;
		$this->translator = $translator;
		$this->id = $id;
	}

	public function createComponentGrid(): BaseGrid
	{
		$translator = $this->translator->createPrefixedTranslator("admin.userAllocation");

		$grid = new BaseGrid();

		$grid->setDataSource($this->allocationFacade->getQueryBuilderForMyAllocationGrid($this->id ?? $this->user->getId()));

		$grid->addColumnText("project", $translator->translate('attributes.project'))
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				return $projectAllocation->getProject()->getName();
			})
		;

		$grid->addColumnDateTime("timespan_from", $translator->translate('attributes.timespan_from'));

		$grid->addColumnDateTime("timespan_to", $translator->translate('attributes.timespan_to'))
			->setRenderer(function(ProjectAllocation $allocation) {
				return $allocation->getTimespanToTransformed()?->format(App::DATE_FORMAT) ?? '-';
			})
		;

		$grid->addColumnNumber('allocation', $translator->translate('attributes.allocation'))
			->setFormat(2, ',', ' ')
		;

		$grid->addColumnNumber('allocation_fte', $translator->translate('attributes.allocation_fte'))
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				return $projectAllocation->getAllocationFTE();
			})
			->setFormat(2, ',', ' ')
		;

		$grid->addColumnAllocationDescription('description', $translator->translate('attributes.description'));

		$grid->addColumnAllocationStatus('state', $translator->translate('attributes.state'));

		$grid->addAggregationRow('project');

		return $grid;
	}
}
