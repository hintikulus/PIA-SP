<?php

namespace App\UI\Datagrid;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Utils\DateTime;
use App\Model\Utils\Html;
use Doctrine\DBAL\Schema\Column;
use Doctrine\ORM\Query;
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

	/**
	 * Přidá do gridu položku s popisem alokace
	 * @param string $key
	 * @param string $name
	 * @return ColumnText
	 * @throws \Ublaboo\DataGrid\Exception\DataGridException
	 */
	public function addColumnAllocationDescription(string $key, string $name): ColumnText
	{
		return $this->addColumnText($key, $name)
			->setRenderer(function (ProjectAllocation $projectAllocation) {
				if ($projectAllocation->getDescription() === null) {
					return "-";
				}

				return Html::el("i", [
					"class" => "fas fa-info-circle",
					"data-bs-toggle" => "tooltip",
					"data-bs-placement" => "top",
					"data-bs-title" => $projectAllocation->getDescription(),
				]);
			})
			->setAlign('center');
	}

	/**
	 * Přidá do gridu položku se statusem alokace
	 * @param string $key
	 * @param string $name
	 * @return ColumnText
	 * @throws \Ublaboo\DataGrid\Exception\DataGridException
	 */
	public function addColumnAllocationStatus(string $key, string $name): ColumnText
	{
		return $this->addColumnText('state', "Status")
			->setRenderer(function (ProjectAllocation $projectAllocation) {
				$state = $projectAllocation->getState();
				$currentDatetime = new DateTime();
				$option = [
					"data-bs-toggle" => "tooltip",
					"data-bs-placement" => "top",
				];

				// Nastaveni zobrazeni ikonky stavu
				switch ($state) {
					// Status je aktivni
					case ProjectAllocation::STATE_ACTIVE:
						// Status aktivní má podstavy

						// Nadchazejici
						if ($currentDatetime < $projectAllocation->getTimespanFrom()) {
							$option["class"] = "fas fa-calendar-check text-success";
							$option["data-bs-title"] = "Naplánované";
						}

						// Probehly (ve vysledku veden jako neaktivni)
						if ($currentDatetime > $projectAllocation->getTimespanTo() && $projectAllocation->getTimespanTo() !== null) {
							$option["class"] = "fas fa-history text-warning";
							$option["data-bs-title"] = "Proběhlé";
						}

						// Probihajici
						if (
							$currentDatetime >= $projectAllocation->getTimespanFrom()
							&& ($currentDatetime <= $projectAllocation->getTimespanTo()
								|| $projectAllocation->getTimespanTo() === null)
						) {
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
			->setAlign('center');
	}

	/**
	 * Přidá do gridu řádek s agregačními funkcemi pro alokace
	 * @return void
	 * @throws \Ublaboo\DataGrid\Exception\DataGridException
	 */
	public function addAggregationRow(string $labelColumnName): void
	{
		$this->setMultipleAggregationFunction(
			new class($labelColumnName) implements IMultipleAggregationFunction {

				/** @var string */
				private string $labelColumnName;

				/** @var float */
				private float $projectAllocationSum = 0;

				/** @var float */
				private float $projectAllocationFTESum = 0;

				/** @var float */
				private float $projectAllocationActiveSum = 0;

				/** @var float */
				private float $projectAllocationFTEActiveSum = 0;

				public function __construct($labelColumnName)
				{
					$this->labelColumnName = $labelColumnName;
				}

				public function getFilterDataType(): string
				{
					return IAggregationFunction::DATA_TYPE_FILTERED;
				}

				/**
				 * @param QueryBuilder $dataSource
				 * @return void
				 */
				public function processDataSource($dataSource): void
				{
					bdump($dataSource);
					/** @var QueryBuilder $qb */
					$qb = clone $dataSource;
					$aggregationData = AllocationFacade::getAggregationData($qb);
					$this->projectAllocationSum = $aggregationData['allocation_sum'];
					$this->projectAllocationFTESum = $aggregationData['allocationFTE_sum'];
					$this->projectAllocationActiveSum = $aggregationData['allocation_active_sum'];
					$this->projectAllocationFTEActiveSum = $aggregationData['allocationFTE_active_sum'];
				}

				public function renderResult(string $key): string
				{
					if ($key === $this->labelColumnName) {
						$div = Html::el('div');
						$div->addHtml(Html::el('span')->setHtml('Celkem'));
						$div->addHtml(Html::el('br'));
						$div->addHtml(Html::el('span')->setHtml('Celkem (aktivní)'));
						return $div;
					}

					if ($key === 'allocation') {
						$div = Html::el('div');
						$div->addHtml(Html::el('span')->setHtml('Σ: ' . $this->projectAllocationSum . ' h'));
						$div->addHtml(Html::el('br'));
						$div->addHtml(Html::el('span')->setHtml('Σ: ' . $this->projectAllocationActiveSum . ' h'));
						return $div;
					}

					if ($key === 'allocation_fte') {
						$div = Html::el('div');
						$div->addHtml(Html::el('span')->setHtml('Σ: ' . $this->projectAllocationFTESum . ' FTE'));
						$div->addHtml(Html::el('br'));
						$div->addHtml(Html::el('span')->setHtml('Σ: ' . $this->projectAllocationFTEActiveSum . ' h'));
						return $div;
					}

					return '';
				}
			}
		);
	}
}
