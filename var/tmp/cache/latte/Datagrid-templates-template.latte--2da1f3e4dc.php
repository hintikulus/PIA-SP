<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Datagrid/templates/template.latte */
final class Template2da1f3e4dc extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		0 => ['datagrid-class' => 'blockDatagrid_class', 'outer-filters' => 'blockOuter_filters', 'icon-filter' => 'blockIcon_filter', 'table-class' => 'blockTable_class', 'data' => 'blockData', 'header' => 'blockHeader', 'group-actions' => 'blockGroup_actions', 'group_actions' => 'blockGroup_actions1', 'exports' => 'blockExports', 'settings' => 'blockSettings', 'icon-gear' => 'blockIcon_gear', 'icon-checked' => 'blockIcon_checked', 'icon-unchecked' => 'blockIcon_unchecked', 'icon-eye' => 'blockIcon_eye', 'icon-repeat' => 'blockIcon_repeat', 'header-column-row' => 'blockHeader_column_row', 'icon-sort-up' => 'blockIcon_sort_up', 'icon-sort-down' => 'blockIcon_sort_down', 'icon-sort' => 'blockIcon_sort', 'icon-caret-down' => 'blockIcon_caret_down', 'icon-eye-slash' => 'blockIcon_eye_slash', 'icon-remove' => 'blockIcon_remove', 'header-filters' => 'blockHeader_filters', 'tbody' => 'blockTbody', 'icon-arrows-v' => 'blockIcon_arrows_v', 'noItems' => 'blockNoItems', 'tfoot' => 'blockTfoot', 'pagination' => 'blockPagination', 'inlineAddRow' => 'blockInlineAddRow', 'columnSummary' => 'blockColumnSummary', 'columnsSummary' => 'blockColumnsSummary', 'aggregationFunctions' => 'blockAggregationFunctions', 'column-header' => 'blockColumn_header', 'column-value' => 'blockColumn_value'],
		'snippet' => ['grid' => 'blockGrid', 'gridSnippets' => 'blockGridSnippets', 'table' => 'blockTable', 'toolbar' => 'blockToolbar', 'exports' => 'blockExports1', 'thead-group-action' => 'blockThead_group_action', 'tbody' => 'blockTbody1', 'items' => 'blockItems', 'pagination' => 'blockPagination1', 'summary' => 'blockSummary'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '
<div class="';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('datagrid-class', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'htmlAttr', $s);
		}) /* line 18 */;
		echo '" data-refresh-state="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("refreshState!")) /* line 18 */;
		echo '">
	<div';
		echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('grid')) . '"';
		echo '>
';
		$this->renderBlock('grid', [], null, 'snippet');
		echo '	</div>
</div>












';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['f' => '43', 'form_control' => '79', 'toolbar_button' => '98', 'export' => '102', 'v_key' => '115', 'visibility' => '115', 'key' => '145, 202, 255, 289, 299, 427, 475, 488', 'column' => '145, 202, 255, 289, 427, 475, 488', 'inlineEditControl' => '263', 'action' => '299', 'row' => '245', 'inlineAddControl' => '435'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block datagrid-class} on line 18 */
	public function blockDatagrid_class(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo 'datagrid datagrid-';
		echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 18 */;
		echo ' table-responsive box-lesson p-0';
	}


	/** {block outer-filters} on line 23 */
	public function blockOuter_filters(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($control->hasCollapsibleOuterFilters()) /* line 24 */ {
			echo '					<div class="row text-right datagrid-collapse-filters-button-row">
						<div class="col-sm-12">
							<button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#datagrid-';
			echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 26 */;
			echo '-row-filters">
';
			$this->renderBlock('icon-filter', get_defined_vars()) /* line 27 */;
			echo ' ';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.show_filter')) /* line 27 */;
			echo '
							</button>
						</div>
					</div>
';
		}
		echo "\n";
		if ($control->hasCollapsibleOuterFilters() && !$filter_active) /* line 32 */ {
			$filter_row_class = 'row-filters collapse' /* line 33 */;
		} elseif ($filter_active) /* line 34 */ {
			$filter_row_class = 'row-filters collapse in show' /* line 35 */;
		} else /* line 36 */ {
			$filter_row_class = 'row-filters' /* line 37 */;
		}
		echo '					<div class="';
		echo LR\Filters::escapeHtmlAttr($filter_row_class) /* line 39 */;
		echo '" id="datagrid-';
		echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 39 */;
		echo '-row-filters">
						<div class="row">
';
		$i = 0 /* line 41 */;
		$filterColumnsClass = 'col-sm-' . (12 / $control->getOuterFilterColumnsCount()) /* line 42 */;
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($filters, $ʟ_it ?? null) as $f) /* line 43 */ {
			echo '							<div class="datagrid-row-outer-filters-group ';
			echo LR\Filters::escapeHtmlAttr($filterColumnsClass) /* line 43 */;
			echo '">
								
';
			$filter_block = 'filter-' . $f->getKey() /* line 47 */;
			$filter_type_block = 'filtertype-' . $f->getType() /* line 48 */;
			echo "\n";
			if ($this->hasBlock($filter_block)) /* line 50 */ {
				$this->renderBlock($filter_block, ['filter' => $f, 'input' => $form['filter'][$f->getKey()], 'outer' => TRUE] + [], 'html') /* line 51 */;
			} else /* line 52 */ {
				if ($this->hasBlock($filter_type_block)) /* line 53 */ {
					$this->renderBlock($filter_type_block, ['filter' => $f, 'input' => $form['filter'][$f->getKey()], 'outer' => TRUE] + [], 'html') /* line 54 */;
				} else /* line 55 */ {
					$this->createTemplate($f->getTemplate(), ['filter' => $f, 'input' => $form['filter'][$f->getKey()], 'outer' => TRUE] + $this->params, 'include')->renderToContentType('html') /* line 56 */;
				}
			}
			$i = $i+1 /* line 59 */;
			echo '							</div>
';
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		if (!$control->hasAutoSubmit()) /* line 61 */ {
			echo '							<div class="col-sm-12">
								<div class="text-right datagrid-manual-submit">
									';
			$ʟ_input = $_input = is_object($filter['filter']['submit']) ? $filter['filter']['submit'] : end($this->global->formsStack)[$filter['filter']['submit']];
			echo $ʟ_input->getControl() /* line 63 */;
			echo '
								</div>
							</div>
';
		}
		echo '						</div>
					</div>
';
	}


	/** {block icon-filter} on line 27 */
	public function blockIcon_filter(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '								<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 27 */;
		echo 'filter"></i>';
	}


	/** {block table-class} on line 70 */
	public function blockTable_class(array $ʟ_args): void
	{
		echo 'table align-items-center mb-0';
	}


	/** {block data} on line 70 */
	public function blockData(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '			<table class="';
		$this->renderBlock('table-class', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'htmlAttr', $s);
		}) /* line 70 */;
		echo '"';
		echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('table')) . '"';
		echo '>
';
		$this->renderBlock('table', [], null, 'snippet');
		echo '			</table>
';
		
	}


	/** {block header} on line 71 */
	public function blockHeader(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '				<thead>
';
		$this->renderBlock('group-actions', get_defined_vars()) /* line 72 */;
		$this->renderBlock('header-column-row', get_defined_vars()) /* line 141 */;
		$this->renderBlock('header-filters', get_defined_vars()) /* line 201 */;
		echo '				</thead>
';
	}


	/** {block group-actions} on line 72 */
	public function blockGroup_actions(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($hasGroupActions || $exports || $toolbarButtons || $control->canHideColumns() || $inlineAdd) /* line 72 */ {
			echo '					<tr class="row-group-actions">
						<th colspan="';
			echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 73 */;
			echo '" class="ublaboo-datagrid-th-form-inline">
';
			if ($hasGroupActions) /* line 74 */ {
				$this->renderBlock('group_actions', get_defined_vars()) /* line 75 */;
				echo "\n";
			}
			echo "\n";
			if ($control->canHideColumns() || $inlineAdd || $exports || $toolbarButtons) /* line 96 */ {
				echo '							<div class="datagrid-toolbar">
';
				if ($toolbarButtons) /* line 97 */ {
					echo '								<span';
					echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('toolbar')) . '"';
					echo '>
';
					$this->renderBlock('toolbar', [], null, 'snippet');
					echo '								</span>
';
				}
				echo "\n";
				$this->renderBlock('exports', get_defined_vars()) /* line 101 */;
				echo "\n";
				$this->renderBlock('settings', get_defined_vars()) /* line 105 */;
				echo '							</div>
';
			}
			echo '						</th>
					</tr>
';
		}
		
	}


	/** {block group_actions} on line 75 */
	public function blockGroup_actions1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '									<span class="datagrid-group-action-title">
										';
		echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.group_actions')) /* line 77 */;
		echo ':
									</span>
';
		$iterations = 0;
		foreach ($filter['group_action']->getControls() as $form_control) /* line 79 */ {
			if ($form_control instanceof \Nette\Forms\Controls\SubmitButton && $form_control->getName() === 'submit') /* line 80 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl()->addAttributes(['class' => 'btn btn-primary btn-sm', 'disabled' => TRUE]) /* line 81 */;
				echo "\n";
			} elseif ($form_control instanceof \Nette\Forms\Controls\SubmitButton) /* line 82 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl()->addAttributes(['disabled' => TRUE]) /* line 83 */;
				echo "\n";
			} elseif ($form_control->getName() == 'group_action') /* line 84 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl()->addAttributes(['class' => 'form-control input-sm form-control-sm', 'disabled' => TRUE]) /* line 85 */;
				echo "\n";
			} else /* line 86 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl() /* line 87 */;
				echo "\n";
			}
			$iterations++;
		}
		if ($control->shouldShowSelectedRowsCount()) /* line 90 */ {
			echo '										<span class="datagrid-selected-rows-count"></span>
';
		}
		
	}


	/** {block exports} on line 101 */
	public function blockExports(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($exports) /* line 101 */ {
			echo '								<span class="datagrid-exports"';
			echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('exports')) . '"';
			echo '>
';
			$this->renderBlock('exports', [], null, 'snippet');
			echo '								</span>
';
		}
		
	}


	/** {block settings} on line 105 */
	public function blockSettings(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($control->canHideColumns() || $inlineAdd) /* line 105 */ {
			echo '								<div class="datagrid-settings">
									';
			if ($inlineAdd) /* line 106 */ {
				echo '
										';
				echo LR\Filters::escapeHtmlText($inlineAdd->renderButtonAdd()) /* line 107 */;
				echo "\n";
			}
			echo '
									<div class="btn-group">
';
			if ($control->canHideColumns()) /* line 111 */ {
				echo '										<button type="button" class="btn btn-xs btn-default btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
';
				$this->renderBlock('icon-gear', get_defined_vars()) /* line 112 */;
				echo '										</button>
';
			}
			echo '										<ul class="dropdown-menu dropdown-menu-right dropdown-menu--grid">
';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($columnsVisibility, $ʟ_it ?? null) as $v_key => $visibility) /* line 115 */ {
				echo '											<li>
												';
				if ($visibility['visible']) /* line 116 */ {
					echo '
													<a class="ajax dropdown-item" href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("hideColumn!", ['column' => $v_key])) /* line 117 */;
					echo '">
';
					$this->renderBlock('icon-checked', get_defined_vars()) /* line 118 */;
					$this->renderBlock('column-header', ['column' => $visibility['column']] + get_defined_vars(), 'html') /* line 119 */;
					echo '													</a>
';
				} else /* line 121 */ {
					echo '													<a class="ajax dropdown-item" href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("showColumn!", ['column' => $v_key])) /* line 122 */;
					echo '">
';
					$this->renderBlock('icon-unchecked', get_defined_vars()) /* line 123 */;
					$this->renderBlock('column-header', ['column' => $visibility['column']] + get_defined_vars(), 'html') /* line 124 */;
					echo '													</a>
';
				}
				echo '											</li>
';
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo '											<li role="separator" class="divider dropdown-divider"></li>
											<li>
												<a class="ajax dropdown-item" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("showAllColumns!")) /* line 130 */;
			echo '">';
			$this->renderBlock('icon-eye', get_defined_vars()) /* line 130 */;
			echo ' ';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.show_all_columns')) /* line 130 */;
			echo '</a>
											</li>
';
			if ($control->hasSomeColumnDefaultHide()) /* line 132 */ {
				echo '											<li>
												<a class="ajax dropdown-item" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("showDefaultColumns!")) /* line 133 */;
				echo '">';
				$this->renderBlock('icon-repeat', get_defined_vars()) /* line 133 */;
				echo ' ';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.show_default_columns')) /* line 133 */;
				echo '</a>
											</li>
';
			}
			echo '										</ul>
									</div>
								</div>
';
		}
		
	}


	/** {block icon-gear} on line 112 */
	public function blockIcon_gear(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '											<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 112 */;
		echo 'cog"></i>
';
	}


	/** {block icon-checked} on line 118 */
	public function blockIcon_checked(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '														<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 118 */;
		echo 'check-square"></i>
';
	}


	/** {block icon-unchecked} on line 123 */
	public function blockIcon_unchecked(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '														<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 123 */;
		echo 'square"></i>
';
	}


	/** {block icon-eye} on line 130 */
	public function blockIcon_eye(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 130 */;
		echo 'eye"></i>';
	}


	/** {block icon-repeat} on line 133 */
	public function blockIcon_repeat(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 133 */;
		echo 'repeat"></i>';
	}


	/** {block header-column-row} on line 141 */
	public function blockHeader_column_row(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '					<tr>
';
		if ($hasGroupActions) /* line 142 */ {
			echo '						<th class="col-checkbox"';
			$ʟ_tmp = ['rowspan=2' => !empty($filters) && !$control->hasOuterFilterRendering()];
			echo LR\Filters::htmlAttributes(isset($ʟ_tmp[0]) && is_array($ʟ_tmp[0]) ? $ʟ_tmp[0] : $ʟ_tmp) /* line 142 */;
			echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('thead-group-action')) . '"';
			echo '>
';
			$this->renderBlock('thead-group-action', [], null, 'snippet');
			echo '						</th>
';
		}
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 145 */ {
			$th = $column->getElementForRender('th', $key) /* line 146 */;
			$th->class = "text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-" . $column->getAlign() /* line 147 */;
			echo '							';
			echo $th->startTag() /* line 148 */;
			echo "\n";
			$col_header = 'col-' . $key . '-header' /* line 149 */;
			echo "\n";
			if ($this->hasBlock($col_header)) /* line 154 */ {
				$this->renderBlock($col_header, ['column' => $column] + [], 'html') /* line 155 */;
			} else /* line 156 */ {
				if ($column->isSortable()) /* line 157 */ {
					echo '										<a href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['sort' => $control->getSortNext($column)])) /* line 158 */;
					echo '" id="datagrid-sort-';
					echo LR\Filters::escapeHtmlAttr($key) /* line 158 */;
					echo '"';
					echo ($ʟ_tmp = array_filter([$column->isSortedBy() ? 'sort' : '', 'ajax'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 158 */;
					echo '>
';
					$this->renderBlock('column-header', ['column' => $column] + get_defined_vars(), 'html') /* line 159 */;
					echo "\n";
					if ($column->isSortedBy()) /* line 161 */ {
						if ($column->isSortAsc()) /* line 162 */ {
							$this->renderBlock('icon-sort-up', get_defined_vars()) /* line 163 */;
						} else /* line 164 */ {
							$this->renderBlock('icon-sort-down', get_defined_vars()) /* line 165 */;
						}
					} else /* line 167 */ {
						$this->renderBlock('icon-sort', get_defined_vars()) /* line 168 */;
					}
					echo '										</a>
';
				} else /* line 171 */ {
					$this->renderBlock('column-header', ['column' => $column] + get_defined_vars(), 'html') /* line 172 */;
				}
			}
			echo '
								<div class="datagrid-column-header-additions">
';
			if ($control->canHideColumns()) /* line 177 */ {
				echo '									<div class="btn-group column-settings-menu">
										<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
';
				$this->renderBlock('icon-caret-down', get_defined_vars()) /* line 179 */;
				echo '										</a>
										<ul class="dropdown-menu dropdown-menu--grid">
											<li>
												<a class="ajax dropdown-item" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("hideColumn!", ['column' => $key])) /* line 183 */;
				echo '">
';
				$this->renderBlock('icon-eye-slash', get_defined_vars()) /* line 184 */;
				echo ' ';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.hide_column')) /* line 184 */;
				echo '</a>
											</li>
										</ul>
									</div>
';
			}
			echo "\n";
			if ($control->hasColumnReset()) /* line 189 */ {
				echo '										<a data-datagrid-reset-filter-by-column="';
				echo LR\Filters::escapeHtmlAttr($key) /* line 190 */;
				echo '" title="';
				echo LR\Filters::escapeHtmlAttr(($this->filters->translate)('ublaboo_datagrid.reset_filter')) /* line 190 */;
				echo '" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("resetColumnFilter!", ['key' => $key])) /* line 190 */;
				echo '"';
				echo ($ʟ_tmp = array_filter([isset($filters[$key]) && $filters[$key]->isValueSet() ? '' : 'hidden', 'ajax'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 190 */;
				echo '>
';
				$this->renderBlock('icon-remove', get_defined_vars()) /* line 191 */;
				echo '										</a>
';
			}
			echo '								</div>
							';
			echo $th->endTag() /* line 195 */;
			echo "\n";
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 197 */ {
			echo '						<th class="col-action text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-left">
							';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.action')) /* line 198 */;
			echo '
						</th>
';
		}
		echo '					</tr>
';
	}


	/** {block icon-sort-up} on line 163 */
	public function blockIcon_sort_up(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '													<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 163 */;
		echo 'caret-up"></i>
';
	}


	/** {block icon-sort-down} on line 165 */
	public function blockIcon_sort_down(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '													<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 165 */;
		echo 'caret-down"></i>
';
	}


	/** {block icon-sort} on line 168 */
	public function blockIcon_sort(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '												<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 168 */;
		echo 'sort"></i>
';
	}


	/** {block icon-caret-down} on line 179 */
	public function blockIcon_caret_down(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '											<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 179 */;
		echo 'caret-down"></i>
';
	}


	/** {block icon-eye-slash} on line 184 */
	public function blockIcon_eye_slash(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '													<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 184 */;
		echo 'eye-slash"></i>';
	}


	/** {block icon-remove} on line 191 */
	public function blockIcon_remove(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '											<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 191 */;
		echo 'remove"></i>
';
	}


	/** {block header-filters} on line 201 */
	public function blockHeader_filters(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (!empty($filters) && !$control->hasOuterFilterRendering()) /* line 201 */ {
			echo '					<tr>
						';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 202 */ {
				echo "\n";
				$th = $column->getElementForRender('th', $key) /* line 203 */;
				$th->class[] = "py-2" /* line 204 */;
				echo '							';
				echo $th->startTag() /* line 205 */;
				echo "\n";
				$col_header = 'col-filter-' . $key . '-header' /* line 206 */;
				if (!$control->hasOuterFilterRendering() && isset($filters[$key])) /* line 207 */ {
					$i = $filter['filter'][$key] /* line 208 */;
					echo "\n";
					$filter_block = 'filter-' . $filters[$key]->getKey() /* line 210 */;
					$filter_type_block = 'filtertype-' . $filters[$key]->getType() /* line 211 */;
					echo "\n";
					if ($this->hasBlock($filter_block)) /* line 213 */ {
						$this->renderBlock($filter_block, ['filter' => $filters[$key], 'input' => $i, 'outer' => FALSE] + [], 'html') /* line 214 */;
					} else /* line 215 */ {
						if ($this->hasBlock($filter_type_block)) /* line 216 */ {
							$this->renderBlock($filter_type_block, ['filter' => $filters[$key], 'input' => $i, 'outer' => FALSE] + [], 'html') /* line 217 */;
						} else /* line 218 */ {
							$this->createTemplate($filters[$key]->getTemplate(), ['filter' => $filters[$key], 'input' => $i, 'outer' => FALSE] + $this->params, 'include')->renderToContentType('html') /* line 219 */;
						}
					}
					echo "\n";
				}
				echo '							';
				echo $th->endTag() /* line 224 */;
				echo "\n";
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 226 */ {
				echo '						<th class="col-action text-center">
							';
				if (!$control->hasAutoSubmit() && !$control->hasOuterFilterRendering()) /* line 227 */ {
					echo '
								';
					$ʟ_input = $_input = is_object($filter['filter']['submit']) ? $filter['filter']['submit'] : end($this->global->formsStack)[$filter['filter']['submit']];
					echo $ʟ_input->getControl() /* line 228 */;
					echo "\n";
				}
				echo '						</th>
';
			}
			echo '					</tr>
';
		}
		
	}


	/** {block tbody} on line 234 */
	public function blockTbody(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '				<tbody ';
		if ($control->isSortable()) /* line 235 */ {
			echo 'data-sortable data-sortable-url="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link($control->getSortableHandler())) /* line 235 */;
			echo '" data-sortable-parent-path="';
			echo LR\Filters::escapeHtmlAttr($control->getSortableParentPath()) /* line 235 */;
			echo '"';
		}
		echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('tbody')) . '"';
		echo '>
';
		$this->renderBlock('tbody', [], null, 'snippet');
		echo '				</tbody>
';
		
	}


	/** {block icon-arrows-v} on line 309 */
	public function blockIcon_arrows_v(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '												<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 309 */;
		echo 'arrows-v ';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 309 */;
		echo 'arrows-alt-v"></i>
';
	}


	/** {block noItems} on line 365 */
	public function blockNoItems(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (!$rows) /* line 366 */ {
			echo '							<tr>
								<td colspan="';
			echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 367 */;
			echo '" class="px-4">
';
			if ($filter_active) /* line 368 */ {
				echo '										';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.no_item_found_reset')) /* line 369 */;
				echo ' <a class="link ajax" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("resetFilter!")) /* line 369 */;
				echo '">';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.here')) /* line 369 */;
				echo '</a>.
';
			} else /* line 370 */ {
				echo '										';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.no_item_found')) /* line 371 */;
				echo "\n";
			}
			echo '								</td>
							</tr>
';
		}
		
	}


	/** {block tfoot} on line 379 */
	public function blockTfoot(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '					<tfoot';
		echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('pagination')) . '"';
		echo '>
';
		$this->renderBlock('pagination', [], null, 'snippet');
		echo '					</tfoot>
';
		
	}


	/** {block pagination} on line 382 */
	public function blockPagination(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '							<tr>
';
		if (!$control->isTreeView()) /* line 383 */ {
			echo '								<td colspan="';
			echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 383 */;
			echo '" class="row-grid-bottom bg-transparent border-0 px-4">
									<div class="col-items">
';
			if ($control->isPaginated()) /* line 385 */ {
				echo '										<small class="text-muted">
											(';
				$paginator = $control['paginator']->getPaginator() /* line 386 */;
				echo '

';
				if ($control->getPerPage() === 'all') /* line 388 */ {
					echo '												';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.items')) /* line 389 */;
					echo ': ';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.all')) /* line 389 */;
					echo "\n";
				} else /* line 390 */ {
					echo '												';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.items')) /* line 391 */;
					echo ': ';
					echo LR\Filters::escapeHtmlText($paginator->getOffset() > 0 ? $paginator->getOffset() + 1 : ($paginator->getItemCount() > 0 ? 1 : 0)) /* line 391 */;
					echo ' - ';
					echo LR\Filters::escapeHtmlText(sizeof($rows) + $paginator->getOffset()) /* line 391 */;
					echo '
												';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.from')) /* line 392 */;
					echo ' ';
					echo LR\Filters::escapeHtmlText($paginator->getItemCount()) /* line 392 */;
					echo '
											';
				}
				echo ')
										</small>
';
			}
			echo '									</div>
									<div class="col-pagination text-center">
';
			/* line 397 */ $_tmp = $this->global->uiControl->getComponent("paginator");
			if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
			$_tmp->render();
			echo '									</div>
									<div class="col-per-page text-right">
';
			if ($control->isPaginated()) /* line 400 */ {
				echo '											Zobrazit
											';
				$ʟ_input = $_input = is_object($filter['perPage']) ? $filter['perPage'] : end($this->global->formsStack)[$filter['perPage']];
				echo $ʟ_input->getControl()->addAttributes(['data-autosubmit-per-page' => TRUE, 'class' => 'form-control input-sm form-control-sm ps-2 pe-2']) /* line 402 */;
				echo '
											';
				$ʟ_input = $_input = is_object($filter['perPage_submit']) ? $filter['perPage_submit'] : end($this->global->formsStack)[$filter['perPage_submit']];
				echo $ʟ_input->getControl()->addAttributes(['class' => 'datagrid-per-page-submit']) /* line 403 */;
				echo '
											záznamů
';
				if ($filter_active) /* line 405 */ {
					echo '											<a class="ajax btn btn-danger btn-sm reset-filter ms-3 mb-0" href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("resetFilter!")) /* line 405 */;
					echo '">';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.reset_filter')) /* line 405 */;
					echo '</a>
';
				}
			}
			echo '									</div>
								</td>
';
		}
		echo '							</tr>
';
	}


	/** {define inlineAddRow} on line 420 */
	public function blockInlineAddRow(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($inlineAdd->shouldBeRendered()) /* line 421 */ {
			$inlineAdd->onSetDefaults($filter['inline_add']) /* line 422 */;
			echo '
		<tr class="datagrid-row-inline-add datagrid-row-inline-add-hidden">
';
			if ($hasGroupActions) /* line 425 */ {
				echo '			<td class="col-checkbox"></td>
';
			}
			echo "\n";
			$iterations = 0;
			foreach ($columns as $key => $column) /* line 427 */ {
				$col = 'col-' . $key /* line 428 */;
				echo "\n";
				$td = clone $column->getElementForRender('td', $key) /* line 430 */;
				$td->class[] = 'datagrid-inline-edit' /* line 431 */;
				echo '				';
				echo $td->startTag() /* line 432 */;
				echo "\n";
				if (isset($filter['inline_add'][$key])) /* line 433 */ {
					if ($filter['inline_add'][$key] instanceof \Nette\Forms\Container) /* line 434 */ {
						$iterations = 0;
						foreach ($filter['inline_add'][$key]->getControls() as $inlineAddControl) /* line 435 */ {
							echo '								';
							$ʟ_input = $_input = is_object($inlineAddControl) ? $inlineAddControl : end($this->global->formsStack)[$inlineAddControl];
							echo $ʟ_input->getControl() /* line 436 */;
							echo "\n";
							$iterations++;
						}
					} else /* line 438 */ {
						echo '							';
						$ʟ_input = $_input = is_object($filter['inline_add'][$key]) ? $filter['inline_add'][$key] : end($this->global->formsStack)[$filter['inline_add'][$key]];
						echo $ʟ_input->getControl() /* line 439 */;
						echo "\n";
					}
				}
				echo '				';
				echo $td->endTag() /* line 442 */;
				echo "\n";
				$iterations++;
			}
			echo '
			<td class="col-action col-action-inline-edit">
				';
			$ʟ_input = $_input = is_object($filter['inline_add']['cancel']) ? $filter['inline_add']['cancel'] : end($this->global->formsStack)[$filter['inline_add']['cancel']];
			echo $ʟ_input->getControl() /* line 446 */;
			echo '
				';
			$ʟ_input = $_input = is_object($filter['inline_add']['submit']) ? $filter['inline_add']['submit'] : end($this->global->formsStack)[$filter['inline_add']['submit']];
			echo $ʟ_input->getControl() /* line 447 */;
			echo '
			</td>
		</tr>
';
		}
		
	}


	/** {define columnSummary} on line 454 */
	public function blockColumnSummary(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo "\n";
		if (!empty($rows) && ($columnsSummary || $control->hasSomeAggregationFunction())) /* line 456 */ {
			echo '	<tr class="datagrid-row-columns-summary"';
			echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('summary')) . '"';
			echo '>
';
			$this->renderBlock('summary', [], null, 'snippet');
			echo '	</tr>
';
		}
		echo "\n";
	}


	/** {define columnsSummary} on line 473 */
	public function blockColumnsSummary(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo "\n";
		$iterations = 0;
		foreach ($columns as $key => $column) /* line 475 */ {
			$td = $column->getElementForRender('td', $key) /* line 476 */;
			echo '
		';
			echo $td->startTag() /* line 478 */;
			echo '
			';
			echo LR\Filters::escapeHtmlText($columnsSummary->render($key)) /* line 479 */;
			echo '
		';
			echo $td->endTag() /* line 480 */;
			echo "\n";
			$iterations++;
		}
		echo "\n";
	}


	/** {define aggregationFunctions} on line 486 */
	public function blockAggregationFunctions(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo "\n";
		$iterations = 0;
		foreach ($columns as $key => $column) /* line 488 */ {
			$td = $column->getElementForRender('td', $key) /* line 489 */;
			echo '
		';
			echo $td->startTag() /* line 491 */;
			echo "\n";
			if ($aggregationFunctions) /* line 492 */ {
				if (isset($aggregationFunctions[$key])) /* line 493 */ {
					echo '					';
					echo $aggregationFunctions[$key]->renderResult() /* line 494 */;
					echo "\n";
				}
			} else /* line 496 */ {
				echo '				';
				echo $multipleAggregationFunction->renderResult($key) /* line 497 */;
				echo "\n";
			}
			echo '		';
			echo $td->endTag() /* line 499 */;
			echo "\n";
			$iterations++;
		}
		echo "\n";
	}


	/** {define column-header} on line 505 */
	public function blockColumn_header(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (!$column->isHeaderEscaped()) /* line 506 */ {
			if ($column instanceof \Nette\Utils\Html || !$column->isTranslatableHeader()) /* line 507 */ {
				echo '			';
				echo $column->getName() /* line 508 */;
				echo "\n";
			} else /* line 509 */ {
				echo '			';
				echo ($this->filters->translate)($column->getName()) /* line 510 */;
				echo "\n";
			}
		} else /* line 512 */ {
			if ($column instanceof \Nette\Utils\Html || !$column->isTranslatableHeader()) /* line 513 */ {
				echo '			';
				echo LR\Filters::escapeHtmlText($column->getName()) /* line 514 */;
				echo "\n";
			} else /* line 515 */ {
				echo '			';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)($column->getName())) /* line 516 */;
				echo "\n";
			}
		}
		
	}


	/** {define column-value} on line 522 */
	public function blockColumn_value(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$col = 'col-' . $key /* line 523 */;
		$item = $row->getItem() /* line 524 */;
		echo "\n";
		if ($column->hasTemplate()) /* line 526 */ {
			$this->createTemplate($column->getTemplate(), array_merge(['row' => $row, 'item' => $item, ], $column->getTemplateVariables(), []) + $this->params, 'include')->renderToContentType('html') /* line 527 */;
		} else /* line 528 */ {
			if ($this->hasBlock($col)) /* line 529 */ {
				$this->renderBlock($col, ['item' => $item] + [], 'html') /* line 530 */;
			} else /* line 531 */ {
				if ($column->isTemplateEscaped()) /* line 532 */ {
					echo '				';
					echo LR\Filters::escapeHtmlText($column->render($row)) /* line 533 */;
					echo "\n";
				} else /* line 534 */ {
					echo '				';
					echo $column->render($row) /* line 535 */;
					echo "\n";
				}
			}
		}
		
	}


	/** {snippet grid} on line 19 */
	public function blockGrid(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("grid", 'static');
		try {
			echo '	';
			$this->renderBlock('gridSnippets', [], null, 'snippet') /* line 20 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippetArea gridSnippets} on line 20 */
	public function blockGridSnippets(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter('gridSnippets', 'area');
		try {
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $this->global->formsStack[] = $this->global->uiControl["filter"], ['class' => 'ajax']) /* line 21 */;
			echo "\n";
			if ($control->hasOuterFilterRendering()) /* line 22 */ {
				$this->renderBlock('outer-filters', get_defined_vars()) /* line 23 */;
				echo "\n";
			}
			$this->renderBlock('data', get_defined_vars()) /* line 70 */;
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet table} on line 70 */
	public function blockTable(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("table", 'static');
		try {
			$this->renderBlock('header', get_defined_vars()) /* line 71 */;
			echo "\n";
			$this->renderBlock('tbody', get_defined_vars()) /* line 234 */;
			echo "\n";
			$this->renderBlock('tfoot', get_defined_vars()) /* line 379 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet toolbar} on line 97 */
	public function blockToolbar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("toolbar", 'static');
		try {
			echo '									';
			$iterations = 0;
			foreach ($toolbarButtons as $toolbar_button) /* line 98 */ {
				echo LR\Filters::escapeHtmlText($toolbar_button->renderButton()) /* line 98 */;
				$iterations++;
			}
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet exports} on line 101 */
	public function blockExports1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("exports", 'static');
		try {
			echo '									';
			$iterations = 0;
			foreach ($exports as $export) /* line 102 */ {
				echo LR\Filters::escapeHtmlText($export->render()) /* line 102 */;
				$iterations++;
			}
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet thead-group-action} on line 142 */
	public function blockThead_group_action(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("thead-group-action", 'static');
		try {
			if ($hasGroupActionOnRows) /* line 143 */ {
				echo '							<input name="';
				echo LR\Filters::escapeHtmlAttr(($this->filters->lower)($control->getFullName())) /* line 143 */;
				echo '-toggle-all" type="checkbox" data-check="';
				echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 143 */;
				echo '" data-check-all="';
				echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 143 */;
				echo '"';
				echo ($ʟ_tmp = array_filter([$control->shouldUseHappyComponents() ? 'happy gray-border'  : null, 'primary'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 143 */;
				echo '>
';
			}
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet tbody} on line 235 */
	public function blockTbody1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("tbody", 'static');
		try {
			echo '					';
			$this->renderBlock('items', [], null, 'snippet') /* line 236 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippetArea items} on line 236 */
	public function blockItems(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter('items', 'area');
		try {
			if ($inlineAdd && $inlineAdd->isPositionTop()) /* line 237 */ {
				$this->renderBlock('inlineAddRow', ['columns' => $columns] + get_defined_vars(), 'html') /* line 238 */;
			}
			echo "\n";
			if ($columnsSummary && $columnsSummary->getPositionTop()) /* line 241 */ {
				$this->renderBlock('columnSummary', get_defined_vars(), 'html') /* line 242 */;
			}
			echo "\n";
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($rows, $ʟ_it ?? null) as $row) /* line 245 */ {
				$item = $row->getItem() /* line 246 */;
				echo "\n";
				if (!isset($toggle_detail)) /* line 248 */ {
					if ($inlineEdit && $inlineEdit->getItemId() == $row->getId()) /* line 249 */ {
						$inlineEdit->onSetDefaults($filter['inline_edit'], $item) /* line 250 */;
						echo '
									<tr data-id="';
						echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 252 */;
						echo '"';
						$ʟ_tmp = [$row->getControl()->attrs];
						echo LR\Filters::htmlAttributes(isset($ʟ_tmp[0]) && is_array($ʟ_tmp[0]) ? $ʟ_tmp[0] : $ʟ_tmp) /* line 252 */;
						echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId($ʟ_nm = "item-{$row->getId()}")) . '"';
						echo '>
';
						$this->global->snippetDriver->enter($ʟ_nm, 'dynamic') /* line 252 */;
						try {
							if ($hasGroupActions) /* line 253 */ {
								echo '										<td class="col-checkbox"></td>
';
							}
							echo "\n";
							$iterations = 0;
							foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 255 */ {
								$col = 'col-' . $key /* line 256 */;
								echo "\n";
								$td = $column->getElementForRender('td', $key, $row) /* line 258 */;
								$td->class[] = 'datagrid-inline-edit' /* line 259 */;
								echo '											';
								echo $td->startTag() /* line 260 */;
								echo "\n";
								if (isset($filter['inline_edit'][$key])) /* line 261 */ {
									if ($filter['inline_edit'][$key] instanceof \Nette\Forms\Container) /* line 262 */ {
										$iterations = 0;
										foreach ($filter['inline_edit'][$key]->getControls() as $inlineEditControl) /* line 263 */ {
											echo '															';
											$ʟ_input = $_input = is_object($inlineEditControl) ? $inlineEditControl : end($this->global->formsStack)[$inlineEditControl];
											echo $ʟ_input->getControl() /* line 264 */;
											echo "\n";
											$iterations++;
										}
									} else /* line 266 */ {
										echo '														';
										$ʟ_input = $_input = is_object($filter['inline_edit'][$key]) ? $filter['inline_edit'][$key] : end($this->global->formsStack)[$filter['inline_edit'][$key]];
										echo $ʟ_input->getControl() /* line 267 */;
										echo "\n";
									}
								} elseif ($inlineEdit->showNonEditingColumns()) /* line 269 */ {
									$this->renderBlock('column-value', ['column' => $column, 'row' => $row, 'key' => $key] + get_defined_vars(), 'html') /* line 270 */;
								}
								echo '											';
								echo $td->endTag() /* line 272 */;
								echo "\n";
								$iterations++;
							}
							$iterator = $ʟ_it = $ʟ_it->getParent();
							echo '
										<td class="col-action col-action-inline-edit">
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['cancel']) ? $filter['inline_edit']['cancel'] : end($this->global->formsStack)[$filter['inline_edit']['cancel']];
							echo $ʟ_input->getControl()->addAttributes(['class' => 'btn btn-xs btn-danger']) /* line 276 */;
							echo '
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['submit']) ? $filter['inline_edit']['submit'] : end($this->global->formsStack)[$filter['inline_edit']['submit']];
							echo $ʟ_input->getControl()->addAttributes(['class' => 'btn btn-xs btn-primary']) /* line 277 */;
							echo '
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['_id']) ? $filter['inline_edit']['_id'] : end($this->global->formsStack)[$filter['inline_edit']['_id']];
							echo $ʟ_input->getControl() /* line 278 */;
							echo '
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['_primary_where_column']) ? $filter['inline_edit']['_primary_where_column'] : end($this->global->formsStack)[$filter['inline_edit']['_primary_where_column']];
							echo $ʟ_input->getControl() /* line 279 */;
							echo '
										</td>
';
						} finally {
							$this->global->snippetDriver->leave();
						}
						echo '									</tr>
';
					} else /* line 282 */ {
						echo '									<tr data-id="';
						echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 283 */;
						echo '"';
						$ʟ_tmp = [$row->getControl()->attrs];
						echo LR\Filters::htmlAttributes(isset($ʟ_tmp[0]) && is_array($ʟ_tmp[0]) ? $ʟ_tmp[0] : $ʟ_tmp) /* line 283 */;
						echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId($ʟ_nm = "item-{$row->getId()}")) . '"';
						echo '>
';
						$this->global->snippetDriver->enter($ʟ_nm, 'dynamic') /* line 283 */;
						try {
							if ($hasGroupActions) /* line 284 */ {
								echo '										<td class="col-checkbox">
											';
								if ($row->hasGroupAction()) /* line 285 */ {
									echo '
												<input type="checkbox" data-check="';
									echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 286 */;
									echo '" data-check-all-';
									echo $control->getFullName() /* line 286 */;
									echo ' name="';
									echo LR\Filters::escapeHtmlAttr(($this->filters->lower)($control->getFullName())) /* line 286 */;
									echo '_group_action_item[';
									echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 286 */;
									echo ']"';
									echo ($ʟ_tmp = array_filter([$control->shouldUseHappyComponents() ? 'happy gray-border'  : null, 'primary'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 286 */;
									echo '>
';
								}
								echo '										</td>
';
							}
							$iterations = 0;
							foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 289 */ {
								$column = $row->applyColumnCallback($key, clone $column) /* line 290 */;
								echo "\n";
								$td = $column->getElementForRender('td', $key, $row) /* line 292 */;
								$td->class[] = "px-4" /* line 293 */;
								echo '											';
								echo $td->startTag() /* line 294 */;
								echo "\n";
								$this->renderBlock('column-value', ['column' => $column, 'row' => $row, 'key' => $key] + get_defined_vars(), 'html') /* line 295 */;
								echo '											';
								echo $td->endTag() /* line 296 */;
								echo "\n";
								$iterations++;
							}
							$iterator = $ʟ_it = $ʟ_it->getParent();
							if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 298 */ {
								echo '										<td class="col-action px-4">
											';
								$iterations = 0;
								foreach ($actions as $key => $action) /* line 299 */ {
									echo "\n";
									if ($row->hasAction($key)) /* line 300 */ {
										if ($action->hasTemplate()) /* line 301 */ {
											$this->createTemplate($action->getTemplate(), array_merge(['item' => $item, ], $action->getTemplateVariables(), [ 'row' => $row]) + $this->params, 'include')->renderToContentType('html') /* line 302 */;
										} else /* line 303 */ {
											echo '														';
											echo $action->render($row) /* line 304 */;
											echo "\n";
										}
									}
									$iterations++;
								}
								if ($control->isSortable()) /* line 308 */ {
									echo '											<span class="handle-sort btn btn-xs btn-default btn-secondary">
';
									$this->renderBlock('icon-arrows-v', get_defined_vars()) /* line 309 */;
									echo '											</span>
';
								}
								if ($inlineEdit && $row->hasInlineEdit()) /* line 311 */ {
									echo '												';
									echo $inlineEdit->renderButton($row) /* line 312 */;
									echo "\n";
								}
								if ($itemsDetail && $itemsDetail->shouldBeRendered($row)) /* line 314 */ {
									echo '												';
									echo $itemsDetail->renderButton($row) /* line 315 */;
									echo "\n";
								}
								echo '										</td>
';
							}
						} finally {
							$this->global->snippetDriver->leave();
						}
						echo '									</tr>
';
					}
				}
				echo "\n";
				if ($itemsDetail && $itemsDetail->shouldBeRendered($row)) /* line 325 */ {
					echo '								<tr class="row-item-detail item-detail-';
					echo LR\Filters::escapeHtmlAttr($control->getFullname()) /* line 326 */;
					echo '-id-';
					echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 326 */;
					echo '"';
					echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId($ʟ_nm = "item-{$row->getId()}-detail")) . '"';
					echo '>
';
					$this->global->snippetDriver->enter($ʟ_nm, 'dynamic') /* line 326 */;
					try {
						echo '									';
						if (isset($toggle_detail) && $toggle_detail == $row->getId()) /* line 327 */ {
							echo "\n";
							$item_detail_params = ['item' => $item, '_form' => $filter] + $itemsDetail->getTemplateVariables() /* line 328 */;
							echo "\n";
							if (isset($filter['items_detail_form'])) /* line 330 */ {
								$item_detail_params['items_detail_form'] = $filter['items_detail_form'] /* line 331 */;
							}
							echo "\n";
							if ($this->hasBlock("detail")) /* line 334 */ {
								echo '											<td colspan="';
								echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 335 */;
								echo '">
												<div class="item-detail-content">
';
								$this->renderBlock('detail', array_merge([], $item_detail_params, []) + [], 'html') /* line 337 */;
								echo '												</div>
											</td>
';
							} elseif ($itemsDetail) /* line 340 */ {
								echo '											<td colspan="';
								echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 341 */;
								echo '">
												<div class="item-detail-content">
';
								if ($itemsDetail->getType() == 'template') /* line 343 */ {
									$this->createTemplate($itemsDetail->getTemplate(), array_merge([], $item_detail_params, []) + $this->params, 'include')->renderToContentType('html') /* line 344 */;
								} else /* line 345 */ {
									echo '														';
									echo $itemsDetail->render($item) /* line 346 */;
									echo "\n";
								}
								echo '												</div>
											</td>
';
							}
						}
					} finally {
						$this->global->snippetDriver->leave();
					}
					echo '								</tr>
								<tr class="row-item-detail-helper"></tr>
';
				}
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo "\n";
			if ($inlineAdd && $inlineAdd->isPositionBottom()) /* line 357 */ {
				$this->renderBlock('inlineAddRow', ['columns' => $columns] + get_defined_vars(), 'html') /* line 358 */;
			}
			echo "\n";
			if (($columnsSummary && !$columnsSummary->getPositionTop()) || $control->hasSomeAggregationFunction()) /* line 361 */ {
				$this->renderBlock('columnSummary', get_defined_vars(), 'html') /* line 362 */;
			}
			echo "\n";
			$this->renderBlock('noItems', get_defined_vars()) /* line 365 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet pagination} on line 380 */
	public function blockPagination1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("pagination", 'static');
		try {
			echo '						';
			if ($control->isPaginated() || $filter_active) /* line 381 */ {
				echo "\n";
				$this->renderBlock('pagination', get_defined_vars()) /* line 382 */;
			}
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet summary} on line 456 */
	public function blockSummary(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("summary", 'static');
		try {
			if ($hasGroupActions) /* line 457 */ {
				echo '		<td class="col-checkbox"></td>
';
			}
			echo "\n";
			if ($columnsSummary && $columnsSummary->someColumnsExist($columns)) /* line 459 */ {
				$this->renderBlock('columnsSummary', ['columns' => $columns] + get_defined_vars(), 'html') /* line 460 */;
			}
			echo "\n";
			if ($control->hasSomeAggregationFunction()) /* line 463 */ {
				$this->renderBlock('aggregationFunctions', ['columns' => $columns] + get_defined_vars(), 'html') /* line 464 */;
			}
			echo "\n";
			if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 467 */ {
				echo '		<td class="col-action"></td>
';
			}
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}

}
