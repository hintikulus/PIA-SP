<?php

use Latte\Runtime as LR;

/** source: /__app__/vendor/ublaboo/datagrid/src/Components/DataGridPaginator/templates/data_grid_paginator.latte */
final class Template996ae390a4 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['icon-arrow-left' => 'blockIcon_arrow_left', 'icon-arrow-right' => 'blockIcon_arrow_right'],
	];


	public function main(): array
	{
		extract($this->params);
		$link = [$control->getParent(), 'link'] /* line 7 */;
		echo "\n";
		if ($paginator->pageCount > 1) /* line 9 */ {
			echo '<div>
	';
			if ($paginator->isFirst()) /* line 10 */ {
				echo '
		<a class="first btn btn-sm btn-default btn-secondary disabled">
';
			} else /* line 12 */ {
				echo '		<a class="btn btn-sm btn-default btn-secondary ajax" href="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($link('page!', ['page' => $paginator->page - 1]))) /* line 13 */;
				echo '" rel="prev">
';
			}
			$this->renderBlock('icon-arrow-left', get_defined_vars()) /* line 15 */;
			echo ' ';
			echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.previous')) /* line 15 */;
			echo '</a>

';
			$iterations = 0;
			foreach ($iterator = $ʟ_it = new LR\CachingIterator($steps, $ʟ_it ?? null) as $step) /* line 17 */ {
				if ($step == $paginator->page) /* line 18 */ {
					echo '			<a class="first btn btn-sm btn-primary active">';
					echo LR\Filters::escapeHtmlText($step) /* line 19 */;
					echo '</a>
';
				} else /* line 20 */ {
					echo '			<a class="btn btn-sm btn-default btn-secondary ajax" href="';
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($link('page!', ['page' => $step]))) /* line 21 */;
					echo '">';
					echo LR\Filters::escapeHtmlText($step) /* line 21 */;
					echo '</a>
';
				}
				echo '
		';
				if ($iterator->nextValue > $step + 1) /* line 24 */ {
					echo '<span>…</span>';
				}
				echo "\n";
				$iterations++;
			}
			$iterator = $ʟ_it = $ʟ_it->getParent();
			echo "\n";
			if ($paginator->isLast()) /* line 27 */ {
				echo '		<a class="first btn btn-sm btn-default btn-secondary disabled">';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.next')) /* line 28 */;
				echo "\n";
			} else /* line 29 */ {
				echo '		<a class="btn btn-sm btn-default btn-secondary ajax" href="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($link('page!', ['page' => $paginator->page + 1]))) /* line 30 */;
				echo '" rel="next">';
				echo LR\Filters::escapeHtmlText(($this->filters->translate)('ublaboo_datagrid.next')) /* line 30 */;
				echo "\n";
			}
			$this->renderBlock('icon-arrow-right', get_defined_vars()) /* line 32 */;
			echo '</a>
</div>
';
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['step' => '17'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block icon-arrow-left} on line 15 */
	public function blockIcon_arrow_left(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 15 */;
		echo 'arrow-left"></i>';
	}


	/** {block icon-arrow-right} on line 32 */
	public function blockIcon_arrow_right(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<i class="';
		echo LR\Filters::escapeHtmlAttr($iconPrefix) /* line 32 */;
		echo 'arrow-right"></i>';
	}

}
