<?php

use Latte\Runtime as LR;

/** source: /__app__/vendor/ublaboo/datagrid/src/templates/datagrid.latte */
final class Template20bd96c7b7 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		0 => ['datagrid-class' => 'blockDatagrid_class', 'outer-filters' => 'blockOuter_filters', 'icon-filter' => 'blockIcon_filter', 'table-class' => 'blockTable_class', 'data' => 'blockData', 'header' => 'blockHeader', 'group-actions' => 'blockGroup_actions', 'group_actions' => 'blockGroup_actions1', 'exports' => 'blockExports', 'settings' => 'blockSettings', 'icon-gear' => 'blockIcon_gear', 'icon-checked' => 'blockIcon_checked', 'icon-unchecked' => 'blockIcon_unchecked', 'icon-eye' => 'blockIcon_eye', 'icon-repeat' => 'blockIcon_repeat', 'header-column-row' => 'blockHeader_column_row', 'icon-sort-up' => 'blockIcon_sort_up', 'icon-sort-down' => 'blockIcon_sort_down', 'icon-sort' => 'blockIcon_sort', 'icon-caret-down' => 'blockIcon_caret_down', 'icon-eye-slash' => 'blockIcon_eye_slash', 'icon-remove' => 'blockIcon_remove', 'header-filters' => 'blockHeader_filters', 'tbody' => 'blockTbody', 'icon-arrows-v' => 'blockIcon_arrows_v', 'noItems' => 'blockNoItems', 'tfoot' => 'blockTfoot', 'pagination' => 'blockPagination', 'inlineAddRow' => 'blockInlineAddRow', 'columnSummary' => 'blockColumnSummary', 'columnsSummary' => 'blockColumnsSummary', 'aggregationFunctions' => 'blockAggregationFunctions', 'column-header' => 'blockColumn_header', 'column-value' => 'blockColumn_value'],
		'snippet' => ['grid' => 'blockGrid', 'gridSnippets' => 'blockGridSnippets', 'table' => 'blockTable', 'toolbar' => 'blockToolbar', 'exports' => 'blockExports1', 'thead-group-action' => 'blockThead_group_action', 'tbody' => 'blockTbody1', 'items' => 'blockItems', 'pagination' => 'blockPagination1', 'summary' => 'blockSummary'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<div class="';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('datagrid-class', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'htmlAttr', $s);
		}) /* line 17 */;
		echo '" data-refresh-state="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("refreshState!")) /* line 17 */;
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
			foreach (array_intersect_key(['f' => '42', 'form_control' => '78', 'toolbar_button' => '97', 'export' => '101', 'v_key' => '114', 'visibility' => '114', 'key' => '144, 200, 252, 286, 295, 421, 469, 482', 'column' => '144, 200, 252, 286, 421, 469, 482', 'inlineEditControl' => '260', 'action' => '295', 'row' => '242', 'inlineAddControl' => '429'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block datagrid-class} on line 17 */
	public function blockDatagrid_class(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo 'datagrid datagrid-';
		echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 17 */;
		
	}


	/** {block outer-filters} on line 22 */
	public function blockOuter_filters(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($control->hasCollapsibleOuterFilters()) /* line 23 */ {
			echo '					<div class="row text-right datagrid-collapse-filters-button-row">
						<div class="col-sm-12">
							<button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#datagrid-';
			echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 25 */;
			echo '-row-filters">
';
			$this->renderBlock('icon-filter', get_defined_vars()) /* line 26 */;
			echo ' ';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.show_filter')) /* line 26 */;
			echo '
							</button>
						</div>
					</div>
';
		}
		echo "\n";
		if ($control->hasCollapsibleOuterFilters() && !$filter_active) /* line 31 */ {
			$filter_row_class = 'row-filters collapse' /* line 32 */;
		} elseif ($filter_active) /* line 33 */ {
			$filter_row_class = 'row-filters collapse in show' /* line 34 */;
		} else /* line 35 */ {
			$filter_row_class = 'row-filters' /* line 36 */;
		}
		echo '					<div class="';
		echo LR\Filters::escapeHtmlAttr($filter_row_class) /* line 38 */;
		echo '" id="datagrid-';
		echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 38 */;
		echo '-row-filters">
						<div class="row">
';
		$i = 0 /* line 40 */;
		$filterColumnsClass = 'col-sm-' . (12 / $control->getOuterFilterColumnsCount()) /* line 41 */;
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($filters, $ʟ_it ?? null) as $f) /* line 42 */ {
			echo '							<div class="datagrid-row-outer-filters-group ';
			echo LR\Filters::escapeHtmlAttr($filterColumnsClass) /* line 42 */;
			echo '">
								
';
			$filter_block = 'filter-' . $f->getKey() /* line 46 */;
			$filter_type_block = 'filtertype-' . $f->getType() /* line 47 */;
			echo "\n";
			if ($this->hasBlock($filter_block)) /* line 49 */ {
				$this->renderBlock($filter_block, ['filter' => $f, 'input' => $form['filter'][$f->getKey()], 'outer' => TRUE] + [], 'html') /* line 50 */;
			} else /* line 51 */ {
				if ($this->hasBlock($filter_type_block)) /* line 52 */ {
					$this->renderBlock($filter_type_block, ['filter' => $f, 'input' => $form['filter'][$f->getKey()], 'outer' => TRUE] + [], 'html') /* line 53 */;
				} else /* line 54 */ {
					$this->createTemplate($f->getTemplate(), ['filter' => $f, 'input' => $form['filter'][$f->getKey()], 'outer' => TRUE] + $this->params, 'include')->renderToContentType('html') /* line 55 */;
				}
			}
			$i = $i+1 /* line 58 */;
			echo '							</div>
';
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		if (!$control->hasAutoSubmit()) /* line 60 */ {
			echo '							<div class="col-sm-12">
								<div class="text-right datagrid-manual-submit">
									';
			$ʟ_input = $_input = is_object($filter['filter']['submit']) ? $filter['filter']['submit'] : end($this->global->formsStack)[$filter['filter']['submit']];
			echo $ʟ_input->getControl() /* line 62 */;
			echo '
								</div>
							</div>
';
		}
		echo '						</div>
					</div>
';
	}


	/** {block icon-filter} on line 26 */
	public function blockIcon_filter(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '								<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 26 */;
		echo 'filter"></i>';
	}


	/** {block table-class} on line 69 */
	public function blockTable_class(array $ʟ_args): void
	{
		echo 'table table-hover table-striped table-bordered table-sm';
	}


	/** {block data} on line 69 */
	public function blockData(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '			<table class="';
		$this->renderBlock('table-class', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'htmlAttr', $s);
		}) /* line 69 */;
		echo '"';
		echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('table')) . '"';
		echo '>
';
		$this->renderBlock('table', [], null, 'snippet');
		echo '			</table>
';
		
	}


	/** {block header} on line 70 */
	public function blockHeader(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '				<thead>
';
		$this->renderBlock('group-actions', get_defined_vars()) /* line 71 */;
		$this->renderBlock('header-column-row', get_defined_vars()) /* line 140 */;
		$this->renderBlock('header-filters', get_defined_vars()) /* line 199 */;
		echo '				</thead>
';
	}


	/** {block group-actions} on line 71 */
	public function blockGroup_actions(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($hasGroupActions || $exports || $toolbarButtons || $control->canHideColumns() || $inlineAdd) /* line 71 */ {
			echo '					<tr class="row-group-actions">
						<th colspan="';
			echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 72 */;
			echo '" class="ublaboo-datagrid-th-form-inline">
';
			if ($hasGroupActions) /* line 73 */ {
				$this->renderBlock('group_actions', get_defined_vars()) /* line 74 */;
				echo "\n";
			}
			echo "\n";
			if ($control->canHideColumns() || $inlineAdd || $exports || $toolbarButtons) /* line 95 */ {
				echo '							<div class="datagrid-toolbar">
';
				if ($toolbarButtons) /* line 96 */ {
					echo '								<span';
					echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('toolbar')) . '"';
					echo '>
';
					$this->renderBlock('toolbar', [], null, 'snippet');
					echo '								</span>
';
				}
				echo "\n";
				$this->renderBlock('exports', get_defined_vars()) /* line 100 */;
				echo "\n";
				$this->renderBlock('settings', get_defined_vars()) /* line 104 */;
				echo '							</div>
';
			}
			echo '						</th>
					</tr>
';
		}
		
	}


	/** {block group_actions} on line 74 */
	public function blockGroup_actions1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '									<span class="datagrid-group-action-title">
										';
		echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.group_actions')) /* line 76 */;
		echo ':
									</span>
';
		$iterations = 0;
		foreach ($filter['group_action']->getControls() as $form_control) /* line 78 */ {
			if ($form_control instanceof \Nette\Forms\Controls\SubmitButton && $form_control->getName() === 'submit') /* line 79 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl()->addAttributes(['class' => 'btn btn-primary btn-sm', 'disabled' => TRUE]) /* line 80 */;
				echo "\n";
			} elseif ($form_control instanceof \Nette\Forms\Controls\SubmitButton) /* line 81 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl()->addAttributes(['disabled' => TRUE]) /* line 82 */;
				echo "\n";
			} elseif ($form_control->getName() == 'group_action') /* line 83 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl()->addAttributes(['class' => 'form-control input-sm form-control-sm', 'disabled' => TRUE]) /* line 84 */;
				echo "\n";
			} else /* line 85 */ {
				echo '											';
				$ʟ_input = $_input = is_object($form_control) ? $form_control : end($this->global->formsStack)[$form_control];
				echo $ʟ_input->getControl() /* line 86 */;
				echo "\n";
			}
			$iterations++;
		}
		if ($control->shouldShowSelectedRowsCount()) /* line 89 */ {
			echo '										<span class="datagrid-selected-rows-count"></span>
';
		}
		
	}


	/** {block exports} on line 100 */
	public function blockExports(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($exports) /* line 100 */ {
			echo '								<span class="datagrid-exports"';
			echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('exports')) . '"';
			echo '>
';
			$this->renderBlock('exports', [], null, 'snippet');
			echo '								</span>
';
		}
		
	}


	/** {block settings} on line 104 */
	public function blockSettings(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($control->canHideColumns() || $inlineAdd) /* line 104 */ {
			echo '								<div class="datagrid-settings">
									';
			if ($inlineAdd) /* line 105 */ {
				echo '
										';
				echo LR\Filters::escapeHtmlText($inlineAdd->renderButtonAdd()) /* line 106 */;
				echo "\n";
			}
			echo '
									<div class="btn-group">
';
			if ($control->canHideColumns()) /* line 110 */ {
				echo '										<button type="button" class="btn btn-xs btn-default btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
';
				$this->renderBlock('icon-gear', get_defined_vars()) /* line 111 */;
				echo '										</button>
';
			}
			echo '										<ul class="dropdown-menu dropdown-menu-right dropdown-menu--grid">
';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($columnsVisibility, $ʟ_it ?? null) as $v_key => $visibility) /* line 114 */ {
				echo '											<li>
												';
				if ($visibility['visible']) /* line 115 */ {
					echo '
													<a class="ajax dropdown-item" href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("hideColumn!", ['column' => $v_key])) /* line 116 */;
					echo '">
';
					$this->renderBlock('icon-checked', get_defined_vars()) /* line 117 */;
					$this->renderBlock('column-header', ['column' => $visibility['column']] + get_defined_vars(), 'html') /* line 118 */;
					echo '													</a>
';
				} else /* line 120 */ {
					echo '													<a class="ajax dropdown-item" href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("showColumn!", ['column' => $v_key])) /* line 121 */;
					echo '">
';
					$this->renderBlock('icon-unchecked', get_defined_vars()) /* line 122 */;
					$this->renderBlock('column-header', ['column' => $visibility['column']] + get_defined_vars(), 'html') /* line 123 */;
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
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("showAllColumns!")) /* line 129 */;
			echo '">';
			$this->renderBlock('icon-eye', get_defined_vars()) /* line 129 */;
			echo ' ';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.show_all_columns')) /* line 129 */;
			echo '</a>
											</li>
';
			if ($control->hasSomeColumnDefaultHide()) /* line 131 */ {
				echo '											<li>
												<a class="ajax dropdown-item" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("showDefaultColumns!")) /* line 132 */;
				echo '">';
				$this->renderBlock('icon-repeat', get_defined_vars()) /* line 132 */;
				echo ' ';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.show_default_columns')) /* line 132 */;
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


	/** {block icon-gear} on line 111 */
	public function blockIcon_gear(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '											<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 111 */;
		echo 'cog"></i>
';
	}


	/** {block icon-checked} on line 117 */
	public function blockIcon_checked(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '														<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 117 */;
		echo 'check-square"></i>
';
	}


	/** {block icon-unchecked} on line 122 */
	public function blockIcon_unchecked(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '														<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 122 */;
		echo 'square"></i>
';
	}


	/** {block icon-eye} on line 129 */
	public function blockIcon_eye(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 129 */;
		echo 'eye"></i>';
	}


	/** {block icon-repeat} on line 132 */
	public function blockIcon_repeat(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 132 */;
		echo 'repeat"></i>';
	}


	/** {block header-column-row} on line 140 */
	public function blockHeader_column_row(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '					<tr>
';
		if ($hasGroupActions) /* line 141 */ {
			echo '						<th class="col-checkbox"';
			$ʟ_tmp = ['rowspan=2' => !empty($filters) && !$control->hasOuterFilterRendering()];
			echo LR\Filters::htmlAttributes(isset($ʟ_tmp[0]) && is_array($ʟ_tmp[0]) ? $ʟ_tmp[0] : $ʟ_tmp) /* line 141 */;
			echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('thead-group-action')) . '"';
			echo '>
';
			$this->renderBlock('thead-group-action', [], null, 'snippet');
			echo '						</th>
';
		}
		$iterations = 0;
		foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 144 */ {
			$th = $column->getElementForRender('th', $key) /* line 145 */;
			echo '							';
			echo $th->startTag() /* line 146 */;
			echo "\n";
			$col_header = 'col-' . $key . '-header' /* line 147 */;
			echo "\n";
			if ($this->hasBlock($col_header)) /* line 152 */ {
				$this->renderBlock($col_header, ['column' => $column] + [], 'html') /* line 153 */;
			} else /* line 154 */ {
				if ($column->isSortable()) /* line 155 */ {
					echo '										<a href="';
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['sort' => $control->getSortNext($column)])) /* line 156 */;
					echo '" id="datagrid-sort-';
					echo LR\Filters::escapeHtmlAttr($key) /* line 156 */;
					echo '"';
					echo ($ʟ_tmp = array_filter([$column->isSortedBy() ? 'sort' : '', 'ajax'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 156 */;
					echo '>
';
					$this->renderBlock('column-header', ['column' => $column] + get_defined_vars(), 'html') /* line 157 */;
					echo "\n";
					if ($column->isSortedBy()) /* line 159 */ {
						if ($column->isSortAsc()) /* line 160 */ {
							$this->renderBlock('icon-sort-up', get_defined_vars()) /* line 161 */;
						} else /* line 162 */ {
							$this->renderBlock('icon-sort-down', get_defined_vars()) /* line 163 */;
						}
					} else /* line 165 */ {
						$this->renderBlock('icon-sort', get_defined_vars()) /* line 166 */;
					}
					echo '										</a>
';
				} else /* line 169 */ {
					$this->renderBlock('column-header', ['column' => $column] + get_defined_vars(), 'html') /* line 170 */;
				}
			}
			echo '
								<div class="datagrid-column-header-additions">
';
			if ($control->canHideColumns()) /* line 175 */ {
				echo '									<div class="btn-group column-settings-menu">
										<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
';
				$this->renderBlock('icon-caret-down', get_defined_vars()) /* line 177 */;
				echo '										</a>
										<ul class="dropdown-menu dropdown-menu--grid">
											<li>
												<a class="ajax dropdown-item" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("hideColumn!", ['column' => $key])) /* line 181 */;
				echo '">
';
				$this->renderBlock('icon-eye-slash', get_defined_vars()) /* line 182 */;
				echo ' ';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.hide_column')) /* line 182 */;
				echo '</a>
											</li>
										</ul>
									</div>
';
			}
			echo "\n";
			if ($control->hasColumnReset()) /* line 187 */ {
				echo '										<a data-datagrid-reset-filter-by-column="';
				echo LR\Filters::escapeHtmlAttr($key) /* line 188 */;
				echo '" title="';
				echo LR\Filters::escapeHtmlAttr(($this->filters->translate)('ublaboo_datagrid.reset_filter')) /* line 188 */;
				echo '" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("resetColumnFilter!", ['key' => $key])) /* line 188 */;
				echo '"';
				echo ($ʟ_tmp = array_filter([isset($filters[$key]) && $filters[$key]->isValueSet() ? '' : 'hidden', 'ajax'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 188 */;
				echo '>
';
				$this->renderBlock('icon-remove', get_defined_vars()) /* line 189 */;
				echo '										</a>
';
			}
			echo '								</div>
							';
			echo $th->endTag() /* line 193 */;
			echo "\n";
			$iterations++;
		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
		if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 195 */ {
			echo '						<th class="col-action text-center">
							';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.action')) /* line 196 */;
			echo '
						</th>
';
		}
		echo '					</tr>
';
	}


	/** {block icon-sort-up} on line 161 */
	public function blockIcon_sort_up(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '													<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 161 */;
		echo 'caret-up"></i>
';
	}


	/** {block icon-sort-down} on line 163 */
	public function blockIcon_sort_down(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '													<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 163 */;
		echo 'caret-down"></i>
';
	}


	/** {block icon-sort} on line 166 */
	public function blockIcon_sort(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '												<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 166 */;
		echo 'sort"></i>
';
	}


	/** {block icon-caret-down} on line 177 */
	public function blockIcon_caret_down(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '											<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 177 */;
		echo 'caret-down"></i>
';
	}


	/** {block icon-eye-slash} on line 182 */
	public function blockIcon_eye_slash(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '													<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 182 */;
		echo 'eye-slash"></i>';
	}


	/** {block icon-remove} on line 189 */
	public function blockIcon_remove(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '											<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 189 */;
		echo 'remove"></i>
';
	}


	/** {block header-filters} on line 199 */
	public function blockHeader_filters(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (!empty($filters) && !$control->hasOuterFilterRendering()) /* line 199 */ {
			echo '					<tr>
						';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 200 */ {
				echo "\n";
				$th = $column->getElementForRender('th', $key) /* line 201 */;
				echo '							';
				echo $th->startTag() /* line 202 */;
				echo "\n";
				$col_header = 'col-filter-' . $key . '-header' /* line 203 */;
				if (!$control->hasOuterFilterRendering() && isset($filters[$key])) /* line 204 */ {
					$i = $filter['filter'][$key] /* line 205 */;
					echo "\n";
					$filter_block = 'filter-' . $filters[$key]->getKey() /* line 207 */;
					$filter_type_block = 'filtertype-' . $filters[$key]->getType() /* line 208 */;
					echo "\n";
					if ($this->hasBlock($filter_block)) /* line 210 */ {
						$this->renderBlock($filter_block, ['filter' => $filters[$key], 'input' => $i, 'outer' => FALSE] + [], 'html') /* line 211 */;
					} else /* line 212 */ {
						if ($this->hasBlock($filter_type_block)) /* line 213 */ {
							$this->renderBlock($filter_type_block, ['filter' => $filters[$key], 'input' => $i, 'outer' => FALSE] + [], 'html') /* line 214 */;
						} else /* line 215 */ {
							$this->createTemplate($filters[$key]->getTemplate(), ['filter' => $filters[$key], 'input' => $i, 'outer' => FALSE] + $this->params, 'include')->renderToContentType('html') /* line 216 */;
						}
					}
					echo "\n";
				}
				echo '							';
				echo $th->endTag() /* line 221 */;
				echo "\n";
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 223 */ {
				echo '						<th class="col-action text-center">
							';
				if (!$control->hasAutoSubmit() && !$control->hasOuterFilterRendering()) /* line 224 */ {
					echo '
								';
					$ʟ_input = $_input = is_object($filter['filter']['submit']) ? $filter['filter']['submit'] : end($this->global->formsStack)[$filter['filter']['submit']];
					echo $ʟ_input->getControl() /* line 225 */;
					echo "\n";
				}
				echo '						</th>
';
			}
			echo '					</tr>
';
		}
		
	}


	/** {block tbody} on line 231 */
	public function blockTbody(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '				<tbody ';
		if ($control->isSortable()) /* line 232 */ {
			echo 'data-sortable data-sortable-url="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link($control->getSortableHandler())) /* line 232 */;
			echo '" data-sortable-parent-path="';
			echo LR\Filters::escapeHtmlAttr($control->getSortableParentPath()) /* line 232 */;
			echo '"';
		}
		echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId('tbody')) . '"';
		echo '>
';
		$this->renderBlock('tbody', [], null, 'snippet');
		echo '				</tbody>
';
		
	}


	/** {block icon-arrows-v} on line 305 */
	public function blockIcon_arrows_v(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '												<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 305 */;
		echo 'arrows-v ';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 305 */;
		echo 'arrows-alt-v"></i>
';
	}


	/** {block noItems} on line 361 */
	public function blockNoItems(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (!$rows) /* line 362 */ {
			echo '							<tr>
								<td colspan="';
			echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 363 */;
			echo '">
';
			if ($filter_active) /* line 364 */ {
				echo '										';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.no_item_found_reset')) /* line 365 */;
				echo ' <a class="link ajax" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("resetFilter!")) /* line 365 */;
				echo '">';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.here')) /* line 365 */;
				echo '</a>.
';
			} else /* line 366 */ {
				echo '										';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.no_item_found')) /* line 367 */;
				echo "\n";
			}
			echo '								</td>
							</tr>
';
		}
		
	}


	/** {block tfoot} on line 375 */
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


	/** {block pagination} on line 378 */
	public function blockPagination(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '							<tr>
';
		if (!$control->isTreeView()) /* line 379 */ {
			echo '								<td colspan="';
			echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 379 */;
			echo '" class="row-grid-bottom">
									<div class="col-items">
';
			if ($control->isPaginated()) /* line 381 */ {
				echo '										<small class="text-muted">
											(';
				$paginator = $control['paginator']->getPaginator() /* line 382 */;
				echo '

';
				if ($control->getPerPage() === 'all') /* line 384 */ {
					echo '												';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.items')) /* line 385 */;
					echo ': ';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.all')) /* line 385 */;
					echo "\n";
				} else /* line 386 */ {
					echo '												';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.items')) /* line 387 */;
					echo ': ';
					echo LR\Filters::escapeHtmlText($paginator->getOffset() > 0 ? $paginator->getOffset() + 1 : ($paginator->getItemCount() > 0 ? 1 : 0)) /* line 387 */;
					echo ' - ';
					echo LR\Filters::escapeHtmlText(sizeof($rows) + $paginator->getOffset()) /* line 387 */;
					echo '
												';
					echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.from')) /* line 388 */;
					echo ' ';
					echo LR\Filters::escapeHtmlText($paginator->getItemCount()) /* line 388 */;
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
			/* line 393 */ $_tmp = $this->global->uiControl->getComponent("paginator");
			if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
			$_tmp->render();
			echo '									</div>
									<div class="col-per-page text-right">
';
			if ($filter_active) /* line 396 */ {
				echo '										<a class="ajax btn btn-danger btn-sm reset-filter" href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("resetFilter!")) /* line 396 */;
				echo '">';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.reset_filter')) /* line 396 */;
				echo '</a>
';
			}
			if ($control->isPaginated()) /* line 397 */ {
				echo '											';
				$ʟ_input = $_input = is_object($filter['perPage']) ? $filter['perPage'] : end($this->global->formsStack)[$filter['perPage']];
				echo $ʟ_input->getControl()->addAttributes(['data-autosubmit-per-page' => TRUE, 'class' => 'form-control input-sm form-control-sm']) /* line 398 */;
				echo '
											';
				$ʟ_input = $_input = is_object($filter['perPage_submit']) ? $filter['perPage_submit'] : end($this->global->formsStack)[$filter['perPage_submit']];
				echo $ʟ_input->getControl()->addAttributes(['class' => 'datagrid-per-page-submit']) /* line 399 */;
				echo "\n";
			}
			echo '									</div>
								</td>
';
		}
		echo '							</tr>
';
	}


	/** {define inlineAddRow} on line 414 */
	public function blockInlineAddRow(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if ($inlineAdd->shouldBeRendered()) /* line 415 */ {
			$inlineAdd->onSetDefaults($filter['inline_add']) /* line 416 */;
			echo '
		<tr class="datagrid-row-inline-add datagrid-row-inline-add-hidden">
';
			if ($hasGroupActions) /* line 419 */ {
				echo '			<td class="col-checkbox"></td>
';
			}
			echo "\n";
			$iterations = 0;
			foreach ($columns as $key => $column) /* line 421 */ {
				$col = 'col-' . $key /* line 422 */;
				echo "\n";
				$td = clone $column->getElementForRender('td', $key) /* line 424 */;
				$td->class[] = 'datagrid-inline-edit' /* line 425 */;
				echo '				';
				echo $td->startTag() /* line 426 */;
				echo "\n";
				if (isset($filter['inline_add'][$key])) /* line 427 */ {
					if ($filter['inline_add'][$key] instanceof \Nette\Forms\Container) /* line 428 */ {
						$iterations = 0;
						foreach ($filter['inline_add'][$key]->getControls() as $inlineAddControl) /* line 429 */ {
							echo '								';
							$ʟ_input = $_input = is_object($inlineAddControl) ? $inlineAddControl : end($this->global->formsStack)[$inlineAddControl];
							echo $ʟ_input->getControl() /* line 430 */;
							echo "\n";
							$iterations++;
						}
					} else /* line 432 */ {
						echo '							';
						$ʟ_input = $_input = is_object($filter['inline_add'][$key]) ? $filter['inline_add'][$key] : end($this->global->formsStack)[$filter['inline_add'][$key]];
						echo $ʟ_input->getControl() /* line 433 */;
						echo "\n";
					}
				}
				echo '				';
				echo $td->endTag() /* line 436 */;
				echo "\n";
				$iterations++;
			}
			echo '
			<td class="col-action col-action-inline-edit">
				';
			$ʟ_input = $_input = is_object($filter['inline_add']['cancel']) ? $filter['inline_add']['cancel'] : end($this->global->formsStack)[$filter['inline_add']['cancel']];
			echo $ʟ_input->getControl() /* line 440 */;
			echo '
				';
			$ʟ_input = $_input = is_object($filter['inline_add']['submit']) ? $filter['inline_add']['submit'] : end($this->global->formsStack)[$filter['inline_add']['submit']];
			echo $ʟ_input->getControl() /* line 441 */;
			echo '
			</td>
		</tr>
';
		}
		
	}


	/** {define columnSummary} on line 448 */
	public function blockColumnSummary(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo "\n";
		if (!empty($rows) && ($columnsSummary || $control->hasSomeAggregationFunction())) /* line 450 */ {
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


	/** {define columnsSummary} on line 467 */
	public function blockColumnsSummary(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo "\n";
		$iterations = 0;
		foreach ($columns as $key => $column) /* line 469 */ {
			$td = $column->getElementForRender('td', $key) /* line 470 */;
			echo '
		';
			echo $td->startTag() /* line 472 */;
			echo '
			';
			echo LR\Filters::escapeHtmlText($columnsSummary->render($key)) /* line 473 */;
			echo '
		';
			echo $td->endTag() /* line 474 */;
			echo "\n";
			$iterations++;
		}
		echo "\n";
	}


	/** {define aggregationFunctions} on line 480 */
	public function blockAggregationFunctions(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo "\n";
		$iterations = 0;
		foreach ($columns as $key => $column) /* line 482 */ {
			$td = $column->getElementForRender('td', $key) /* line 483 */;
			echo '
		';
			echo $td->startTag() /* line 485 */;
			echo "\n";
			if ($aggregationFunctions) /* line 486 */ {
				if (isset($aggregationFunctions[$key])) /* line 487 */ {
					echo '					';
					echo $aggregationFunctions[$key]->renderResult() /* line 488 */;
					echo "\n";
				}
			} else /* line 490 */ {
				echo '				';
				echo $multipleAggregationFunction->renderResult($key) /* line 491 */;
				echo "\n";
			}
			echo '		';
			echo $td->endTag() /* line 493 */;
			echo "\n";
			$iterations++;
		}
		echo "\n";
	}


	/** {define column-header} on line 499 */
	public function blockColumn_header(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		if (!$column->isHeaderEscaped()) /* line 500 */ {
			if ($column instanceof \Nette\Utils\Html || !$column->isTranslatableHeader()) /* line 501 */ {
				echo '			';
				echo $column->getName() /* line 502 */;
				echo "\n";
			} else /* line 503 */ {
				echo '			';
				echo ($this->filters->translate)($column->getName()) /* line 504 */;
				echo "\n";
			}
		} else /* line 506 */ {
			if ($column instanceof \Nette\Utils\Html || !$column->isTranslatableHeader()) /* line 507 */ {
				echo '			';
				echo LR\Filters::escapeHtmlText($column->getName()) /* line 508 */;
				echo "\n";
			} else /* line 509 */ {
				echo '			';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)($column->getName())) /* line 510 */;
				echo "\n";
			}
		}
		
	}


	/** {define column-value} on line 516 */
	public function blockColumn_value(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$col = 'col-' . $key /* line 517 */;
		$item = $row->getItem() /* line 518 */;
		echo "\n";
		if ($column->hasTemplate()) /* line 520 */ {
			$this->createTemplate($column->getTemplate(), array_merge(['row' => $row, 'item' => $item, ], $column->getTemplateVariables(), []) + $this->params, 'include')->renderToContentType('html') /* line 521 */;
		} else /* line 522 */ {
			if ($this->hasBlock($col)) /* line 523 */ {
				$this->renderBlock($col, ['item' => $item] + [], 'html') /* line 524 */;
			} else /* line 525 */ {
				if ($column->isTemplateEscaped()) /* line 526 */ {
					echo '				';
					echo LR\Filters::escapeHtmlText($column->render($row)) /* line 527 */;
					echo "\n";
				} else /* line 528 */ {
					echo '				';
					echo $column->render($row) /* line 529 */;
					echo "\n";
				}
			}
		}
		
	}


	/** {snippet grid} on line 18 */
	public function blockGrid(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("grid", 'static');
		try {
			echo '	';
			$this->renderBlock('gridSnippets', [], null, 'snippet') /* line 19 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippetArea gridSnippets} on line 19 */
	public function blockGridSnippets(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter('gridSnippets', 'area');
		try {
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $this->global->formsStack[] = $this->global->uiControl["filter"], ['class' => 'ajax']) /* line 20 */;
			echo "\n";
			if ($control->hasOuterFilterRendering()) /* line 21 */ {
				$this->renderBlock('outer-filters', get_defined_vars()) /* line 22 */;
				echo "\n";
			}
			$this->renderBlock('data', get_defined_vars()) /* line 69 */;
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet table} on line 69 */
	public function blockTable(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("table", 'static');
		try {
			$this->renderBlock('header', get_defined_vars()) /* line 70 */;
			echo "\n";
			$this->renderBlock('tbody', get_defined_vars()) /* line 231 */;
			echo "\n";
			$this->renderBlock('tfoot', get_defined_vars()) /* line 375 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet toolbar} on line 96 */
	public function blockToolbar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("toolbar", 'static');
		try {
			echo '									';
			$iterations = 0;
			foreach ($toolbarButtons as $toolbar_button) /* line 97 */ {
				echo LR\Filters::escapeHtmlText($toolbar_button->renderButton()) /* line 97 */;
				$iterations++;
			}
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet exports} on line 100 */
	public function blockExports1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("exports", 'static');
		try {
			echo '									';
			$iterations = 0;
			foreach ($exports as $export) /* line 101 */ {
				echo LR\Filters::escapeHtmlText($export->render()) /* line 101 */;
				$iterations++;
			}
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet thead-group-action} on line 141 */
	public function blockThead_group_action(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("thead-group-action", 'static');
		try {
			if ($hasGroupActionOnRows) /* line 142 */ {
				echo '							<input name="';
				echo LR\Filters::escapeHtmlAttr(($this->filters->lower)($control->getFullName())) /* line 142 */;
				echo '-toggle-all" type="checkbox" data-check="';
				echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 142 */;
				echo '" data-check-all="';
				echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 142 */;
				echo '"';
				echo ($ʟ_tmp = array_filter([$control->shouldUseHappyComponents() ? 'happy gray-border'  : null, 'primary'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 142 */;
				echo '>
';
			}
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet tbody} on line 232 */
	public function blockTbody1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("tbody", 'static');
		try {
			echo '					';
			$this->renderBlock('items', [], null, 'snippet') /* line 233 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippetArea items} on line 233 */
	public function blockItems(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter('items', 'area');
		try {
			if ($inlineAdd && $inlineAdd->isPositionTop()) /* line 234 */ {
				$this->renderBlock('inlineAddRow', ['columns' => $columns] + get_defined_vars(), 'html') /* line 235 */;
			}
			echo "\n";
			if ($columnsSummary && $columnsSummary->getPositionTop()) /* line 238 */ {
				$this->renderBlock('columnSummary', get_defined_vars(), 'html') /* line 239 */;
			}
			echo "\n";
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($rows, $ʟ_it ?? null) as $row) /* line 242 */ {
				$item = $row->getItem() /* line 243 */;
				echo "\n";
				if (!isset($toggle_detail)) /* line 245 */ {
					if ($inlineEdit && $inlineEdit->getItemId() == $row->getId()) /* line 246 */ {
						$inlineEdit->onSetDefaults($filter['inline_edit'], $item) /* line 247 */;
						echo '
									<tr data-id="';
						echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 249 */;
						echo '"';
						$ʟ_tmp = [$row->getControl()->attrs];
						echo LR\Filters::htmlAttributes(isset($ʟ_tmp[0]) && is_array($ʟ_tmp[0]) ? $ʟ_tmp[0] : $ʟ_tmp) /* line 249 */;
						echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId($ʟ_nm = "item-{$row->getId()}")) . '"';
						echo '>
';
						$this->global->snippetDriver->enter($ʟ_nm, 'dynamic') /* line 249 */;
						try {
							if ($hasGroupActions) /* line 250 */ {
								echo '										<td class="col-checkbox"></td>
';
							}
							echo "\n";
							$iterations = 0;
							foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 252 */ {
								$col = 'col-' . $key /* line 253 */;
								echo "\n";
								$td = $column->getElementForRender('td', $key, $row) /* line 255 */;
								$td->class[] = 'datagrid-inline-edit' /* line 256 */;
								echo '											';
								echo $td->startTag() /* line 257 */;
								echo "\n";
								if (isset($filter['inline_edit'][$key])) /* line 258 */ {
									if ($filter['inline_edit'][$key] instanceof \Nette\Forms\Container) /* line 259 */ {
										$iterations = 0;
										foreach ($filter['inline_edit'][$key]->getControls() as $inlineEditControl) /* line 260 */ {
											echo '															';
											$ʟ_input = $_input = is_object($inlineEditControl) ? $inlineEditControl : end($this->global->formsStack)[$inlineEditControl];
											echo $ʟ_input->getControl() /* line 261 */;
											echo "\n";
											$iterations++;
										}
									} else /* line 263 */ {
										echo '														';
										$ʟ_input = $_input = is_object($filter['inline_edit'][$key]) ? $filter['inline_edit'][$key] : end($this->global->formsStack)[$filter['inline_edit'][$key]];
										echo $ʟ_input->getControl() /* line 264 */;
										echo "\n";
									}
								} elseif ($inlineEdit->showNonEditingColumns()) /* line 266 */ {
									$this->renderBlock('column-value', ['column' => $column, 'row' => $row, 'key' => $key] + get_defined_vars(), 'html') /* line 267 */;
								}
								echo '											';
								echo $td->endTag() /* line 269 */;
								echo "\n";
								$iterations++;
							}
							$iterator = $ʟ_it = $ʟ_it->getParent();
							echo '
										<td class="col-action col-action-inline-edit">
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['cancel']) ? $filter['inline_edit']['cancel'] : end($this->global->formsStack)[$filter['inline_edit']['cancel']];
							echo $ʟ_input->getControl()->addAttributes(['class' => 'btn btn-xs btn-danger']) /* line 273 */;
							echo '
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['submit']) ? $filter['inline_edit']['submit'] : end($this->global->formsStack)[$filter['inline_edit']['submit']];
							echo $ʟ_input->getControl()->addAttributes(['class' => 'btn btn-xs btn-primary']) /* line 274 */;
							echo '
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['_id']) ? $filter['inline_edit']['_id'] : end($this->global->formsStack)[$filter['inline_edit']['_id']];
							echo $ʟ_input->getControl() /* line 275 */;
							echo '
											';
							$ʟ_input = $_input = is_object($filter['inline_edit']['_primary_where_column']) ? $filter['inline_edit']['_primary_where_column'] : end($this->global->formsStack)[$filter['inline_edit']['_primary_where_column']];
							echo $ʟ_input->getControl() /* line 276 */;
							echo '
										</td>
';
						} finally {
							$this->global->snippetDriver->leave();
						}
						echo '									</tr>
';
					} else /* line 279 */ {
						echo '									<tr data-id="';
						echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 280 */;
						echo '"';
						$ʟ_tmp = [$row->getControl()->attrs];
						echo LR\Filters::htmlAttributes(isset($ʟ_tmp[0]) && is_array($ʟ_tmp[0]) ? $ʟ_tmp[0] : $ʟ_tmp) /* line 280 */;
						echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId($ʟ_nm = "item-{$row->getId()}")) . '"';
						echo '>
';
						$this->global->snippetDriver->enter($ʟ_nm, 'dynamic') /* line 280 */;
						try {
							if ($hasGroupActions) /* line 281 */ {
								echo '										<td class="col-checkbox">
											';
								if ($row->hasGroupAction()) /* line 282 */ {
									echo '
												<input type="checkbox" data-check="';
									echo LR\Filters::escapeHtmlAttr($control->getFullName()) /* line 283 */;
									echo '" data-check-all-';
									echo $control->getFullName() /* line 283 */;
									echo ' name="';
									echo LR\Filters::escapeHtmlAttr(($this->filters->lower)($control->getFullName())) /* line 283 */;
									echo '_group_action_item[';
									echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 283 */;
									echo ']"';
									echo ($ʟ_tmp = array_filter([$control->shouldUseHappyComponents() ? 'happy gray-border'  : null, 'primary'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 283 */;
									echo '>
';
								}
								echo '										</td>
';
							}
							$iterations = 0;
							foreach ($iterator = $ʟ_it = new LR\CachingIterator($columns, $ʟ_it ?? null) as $key => $column) /* line 286 */ {
								$column = $row->applyColumnCallback($key, clone $column) /* line 287 */;
								echo "\n";
								$td = $column->getElementForRender('td', $key, $row) /* line 289 */;
								echo '											';
								echo $td->startTag() /* line 290 */;
								echo "\n";
								$this->renderBlock('column-value', ['column' => $column, 'row' => $row, 'key' => $key] + get_defined_vars(), 'html') /* line 291 */;
								echo '											';
								echo $td->endTag() /* line 292 */;
								echo "\n";
								$iterations++;
							}
							$iterator = $ʟ_it = $ʟ_it->getParent();
							if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 294 */ {
								echo '										<td class="col-action">
											';
								$iterations = 0;
								foreach ($actions as $key => $action) /* line 295 */ {
									echo "\n";
									if ($row->hasAction($key)) /* line 296 */ {
										if ($action->hasTemplate()) /* line 297 */ {
											$this->createTemplate($action->getTemplate(), array_merge(['item' => $item, ], $action->getTemplateVariables(), [ 'row' => $row]) + $this->params, 'include')->renderToContentType('html') /* line 298 */;
										} else /* line 299 */ {
											echo '														';
											echo $action->render($row) /* line 300 */;
											echo "\n";
										}
									}
									$iterations++;
								}
								if ($control->isSortable()) /* line 304 */ {
									echo '											<span class="handle-sort btn btn-xs btn-default btn-secondary">
';
									$this->renderBlock('icon-arrows-v', get_defined_vars()) /* line 305 */;
									echo '											</span>
';
								}
								if ($inlineEdit && $row->hasInlineEdit()) /* line 307 */ {
									echo '												';
									echo $inlineEdit->renderButton($row) /* line 308 */;
									echo "\n";
								}
								if ($itemsDetail && $itemsDetail->shouldBeRendered($row)) /* line 310 */ {
									echo '												';
									echo $itemsDetail->renderButton($row) /* line 311 */;
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
				if ($itemsDetail && $itemsDetail->shouldBeRendered($row)) /* line 321 */ {
					echo '								<tr class="row-item-detail item-detail-';
					echo LR\Filters::escapeHtmlAttr($control->getFullname()) /* line 322 */;
					echo '-id-';
					echo LR\Filters::escapeHtmlAttr($row->getId()) /* line 322 */;
					echo '"';
					echo ' id="' . htmlspecialchars($this->global->snippetDriver->getHtmlId($ʟ_nm = "item-{$row->getId()}-detail")) . '"';
					echo '>
';
					$this->global->snippetDriver->enter($ʟ_nm, 'dynamic') /* line 322 */;
					try {
						echo '									';
						if (isset($toggle_detail) && $toggle_detail == $row->getId()) /* line 323 */ {
							echo "\n";
							$item_detail_params = ['item' => $item, '_form' => $filter] + $itemsDetail->getTemplateVariables() /* line 324 */;
							echo "\n";
							if (isset($filter['items_detail_form'])) /* line 326 */ {
								$item_detail_params['items_detail_form'] = $filter['items_detail_form'] /* line 327 */;
							}
							echo "\n";
							if ($this->hasBlock("detail")) /* line 330 */ {
								echo '											<td colspan="';
								echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 331 */;
								echo '">
												<div class="item-detail-content">
';
								$this->renderBlock('detail', array_merge([], $item_detail_params, []) + [], 'html') /* line 333 */;
								echo '												</div>
											</td>
';
							} elseif ($itemsDetail) /* line 336 */ {
								echo '											<td colspan="';
								echo LR\Filters::escapeHtmlAttr($control->getColumnsCount()) /* line 337 */;
								echo '">
												<div class="item-detail-content">
';
								if ($itemsDetail->getType() == 'template') /* line 339 */ {
									$this->createTemplate($itemsDetail->getTemplate(), array_merge([], $item_detail_params, []) + $this->params, 'include')->renderToContentType('html') /* line 340 */;
								} else /* line 341 */ {
									echo '														';
									echo $itemsDetail->render($item) /* line 342 */;
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
			if ($inlineAdd && $inlineAdd->isPositionBottom()) /* line 353 */ {
				$this->renderBlock('inlineAddRow', ['columns' => $columns] + get_defined_vars(), 'html') /* line 354 */;
			}
			echo "\n";
			if (($columnsSummary && !$columnsSummary->getPositionTop()) || $control->hasSomeAggregationFunction()) /* line 357 */ {
				$this->renderBlock('columnSummary', get_defined_vars(), 'html') /* line 358 */;
			}
			echo "\n";
			$this->renderBlock('noItems', get_defined_vars()) /* line 361 */;
			echo "\n";
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet pagination} on line 376 */
	public function blockPagination1(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("pagination", 'static');
		try {
			echo '						';
			if ($control->isPaginated() || $filter_active) /* line 377 */ {
				echo "\n";
				$this->renderBlock('pagination', get_defined_vars()) /* line 378 */;
			}
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}


	/** {snippet summary} on line 450 */
	public function blockSummary(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("summary", 'static');
		try {
			if ($hasGroupActions) /* line 451 */ {
				echo '		<td class="col-checkbox"></td>
';
			}
			echo "\n";
			if ($columnsSummary && $columnsSummary->someColumnsExist($columns)) /* line 453 */ {
				$this->renderBlock('columnsSummary', ['columns' => $columns] + get_defined_vars(), 'html') /* line 454 */;
			}
			echo "\n";
			if ($control->hasSomeAggregationFunction()) /* line 457 */ {
				$this->renderBlock('aggregationFunctions', ['columns' => $columns] + get_defined_vars(), 'html') /* line 458 */;
			}
			echo "\n";
			if ($actions || $control->isSortable() || $itemsDetail || $inlineEdit || $inlineAdd) /* line 461 */ {
				echo '		<td class="col-action"></td>
';
			}
		} finally {
			$this->global->snippetDriver->leave();
		}
		
	}

}
