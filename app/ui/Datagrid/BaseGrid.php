<?php

namespace App\UI\Datagrid;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Utils\DateTime;
use App\Model\Utils\Html;
use Doctrine\ORM\QueryBuilder;
use Ublaboo\DataGrid\AggregationFunction\IAggregationFunction;
use Ublaboo\DataGrid\AggregationFunction\IMultipleAggregationFunction;
use Ublaboo\DataGrid\Column\ColumnText;
use Ublaboo\DataGrid\DataGrid;

class BaseGrid extends DataGrid
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplateFile(__DIR__ . '/templates/template.latte');
	}

	public function addColumnAllocationDescription(string $key, string $name)
	{
		$this->addColumnText($key, $name)
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				if ($projectAllocation->getDescription() === null)
				{
					return "-";
				}

				return Html::el("i", [
					"class"             => "fas fa-info-circle",
					"data-bs-toggle"    => "tooltip",
					"data-bs-placement" => "top",
					"data-bs-title"     => $projectAllocation->getDescription(),
				]);
			})
			->setAlign('center')
		;
	}

	public function addColumnAllocationStatus(string $key, string $name)
	{
		$this->addColumnText('state', "Status")
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				$state = $projectAllocation->getState();
				$currentDatetime = new DateTime();
				$option = [
					"data-bs-toggle"    => "tooltip",
					"data-bs-placement" => "top",
				];

				bdump($state);
				// Nastaveni zobrazeni ikonky stavu
				switch ($state)
				{
					// Status je aktivni
					case ProjectAllocation::STATE_ACTIVE:
						// Status aktivní má podstavy

						// Nadchazejici
						if ($currentDatetime < $projectAllocation->getTimespanFrom())
						{
							$option["class"] = "fas fa-callendar-alt text-success";
							$option["data-bs-title"] = "Naplánované";
						}

						// Probehly (ve vysledku veden jako neaktivni)
						if ($currentDatetime > $projectAllocation->getTimespanTo() && $projectAllocation->getTimespanTo() !== null)
						{
							$option["class"] = "fas fa-history text-warning";
							$option["data-bs-title"] = "Proběhlé";
						}

						// Probihajici
						if (
							$currentDatetime >= $projectAllocation->getTimespanFrom()
							&& ($currentDatetime <= $projectAllocation->getTimespanTo()
								|| $projectAllocation->getTimespanTo() === null)
						)
						{
							$option["class"] = "fas fa-check text-success";
							$option["data-bs-title"] = "Probíhající";
						}

						break;
					// Status je veden jako draft
					case ProjectAllocation::STATE_INACTIVE_DRAFT:
						$option["class"] = "fas fa-drafting-compass text-secondary";
						$option["data-bs-title"] = "Rozpracované";
						break;
					// Status je veden jako zrušený
					case ProjectAllocation::STATE_INACTIVE_CANCELED:
						$option["class"] = "fas fa-ban text-danger";
						$option["data-bs-title"] = "Zrušené";
						break;
					default:
						break;
				}

				return Html::el('i', $option);
			})
			->setAlign('center')
		;
	}

	public function addAggregationRow()
	{
		$this->setMultipleAggregationFunction(
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
					/** @var QueryBuilder $qb */
					$qb = clone $dataSource;
					$aggregationData = AllocationFacade::getAggregationData($qb);
					$this->projectAllocationSum = $aggregationData['allocation_sum'];
					$this->projectAllocationFTESum = $aggregationData['allocationFTE_sum'];
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
	}
}
