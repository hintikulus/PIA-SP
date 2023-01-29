<?php

namespace App\UI\Datagrid;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Utils\DateTime;
use App\Model\Utils\Html;
use Contributte\Translation\Translator;
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

	/**
	 * Přidá do gridu položku se statusem alokace
	 * @param string $key
	 * @param string $name
	 * @return ColumnText
	 * @throws \Ublaboo\DataGrid\Exception\DataGridException
	 */
	public function addColumnAllocationStatus(string $key, string $name): ColumnText
	{
		return $this->addColumnText('state', $name)
			->setRenderer(function(ProjectAllocation $projectAllocation) {
				$state = $projectAllocation->getState();
				$currentDatetime = new DateTime();
				$option = [
					"data-bs-toggle"    => "tooltip",
					"data-bs-placement" => "top",
				];

				// Nastaveni zobrazeni ikonky stavu
				switch ($state)
				{
					// Status je aktivni
					case ProjectAllocation::STATE_ACTIVE:
						// Status aktivní má podstavy

						// Nadchazejici
						if ($currentDatetime < $projectAllocation->getTimespanFrom())
						{
							$option["class"] = "fas fa-calendar-check text-success";
							$option["data-bs-title"] = $this->translator->translate('admin.allocation.status.scheduled');
						}

						// Probehly (ve vysledku veden jako neaktivni)
						if ($currentDatetime > $projectAllocation->getTimespanTo() && $projectAllocation->getTimespanTo() !== null)
						{
							$option["class"] = "fas fa-history text-warning";
							$option["data-bs-title"] = $this->translator->translate('admin.allocation.status.past');
						}

						// Probihajici
						if (
							$currentDatetime >= $projectAllocation->getTimespanFrom()
							&& ($currentDatetime <= $projectAllocation->getTimespanTo()
								|| $projectAllocation->getTimespanTo() === null)
						)
						{
							$option["class"] = "fas fa-check text-success";
							$option["data-bs-title"] = $this->translator->translate('admin.allocation.status.ongoing');
						}

						break;
					// Status je veden jako draft
					case ProjectAllocation::STATE_INACTIVE_DRAFT:
						$option["class"] = "fas fa-drafting-compass text-secondary";
						$option["data-bs-title"] = $this->translator->translate('admin.allocation.status.draft');
						break;
					// Status je veden jako zrušený
					case ProjectAllocation::STATE_INACTIVE_CANCELED:
						$option["class"] = "fas fa-ban text-danger";
						$option["data-bs-title"] = $this->translator->translate('admin.allocation.status.canceled');
						break;
					default:
						break;
				}

				return Html::el('i', $option);
			})
			->setAlign('center')
		;
	}

	/**
	 * Přidá do gridu řádek s agregačními funkcemi pro alokace
	 * @param string $labelColumnName
	 * @return void
	 * @throws \Ublaboo\DataGrid\Exception\DataGridException
	 */
	public function addAggregationRow(string $labelColumnName): void
	{
		$this->setMultipleAggregationFunction(
			new class($labelColumnName, $this->translator) implements IMultipleAggregationFunction {

				/** @var Translator */
				private Translator $translator;

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

				public function __construct(string $labelColumnName, Translator $translator)
				{
					$this->labelColumnName = $labelColumnName;
					$this->translator = $translator;
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
					$qb = clone $dataSource;
					$aggregationData = AllocationFacade::getAggregationData($qb);
					$this->projectAllocationSum = $aggregationData['allocation_sum'];
					$this->projectAllocationFTESum = $aggregationData['allocationFTE_sum'];
					$this->projectAllocationActiveSum = $aggregationData['allocation_active_sum'];
					$this->projectAllocationFTEActiveSum = $aggregationData['allocationFTE_active_sum'];
				}

				public function renderResult(string $key): string
				{
					if ($key === $this->labelColumnName)
					{
						$div = Html::el('div');
						$div->addHtml(Html::el('span')->setHtml($this->translator->translate('admin.baseGrid.total')));
						$div->addHtml(Html::el('br'));
						$div->addHtml(Html::el('span')->setHtml($this->translator->translate('admin.baseGrid.totalActive')));
						return $div;
					}

					if ($key === 'allocation')
					{
						$div = Html::el('div');
						$div->addHtml(
							Html::el('span')->setHtml(
								$this->translator->translate('admin.baseGrid.totalValueHours', ['value' => $this->projectAllocationSum])
							)
						);
						$div->addHtml(Html::el('br'));
						$div->addHtml(
							Html::el('span')->setHtml(
								$this->translator->translate('admin.baseGrid.totalValueHours', ['value' => $this->projectAllocationActiveSum])
							)
						);
						return $div;
					}

					if ($key === 'allocation_fte')
					{
						$div = Html::el('div');
						$div->addHtml(
							Html::el('span')->setHtml(
								$this->translator->translate('admin.baseGrid.totalValueHours', ['value' => $this->projectAllocationFTESum])
							)
						);
						$div->addHtml(Html::el('br'));
						$div->addHtml(
							Html::el('span')->setHtml(
								$this->translator->translate('admin.baseGrid.totalValueHours', ['value' => $this->projectAllocationFTEActiveSum])
							)
						);
						return $div;
					}

					return '';
				}
			}
		);
	}
}
