<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Base/templates/@layout.latte */
final class Template06368f847e extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'head' => 'blockHead', 'main' => 'blockMain'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/favicon.ico">

	<!-- Seo -->
	<title>';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('trim', $ʟ_fi, $this->filters->filterContent('striphtml', $ʟ_fi, $s)));
		}) /* line 10 */;
		echo ' | Contributte</title>

	<!-- Meta -->
';
		if ($this->hasBlock("description")) /* line 13 */ {
			echo '	<meta name="description" content="';
			$this->renderBlock('description', [], 'htmlAttr') /* line 13 */;
			echo '">
';
		}
		if ($this->hasBlock("keywords")) /* line 14 */ {
			echo '	<meta name="keywords" content="';
			$this->renderBlock('keywords', [], 'htmlAttr') /* line 14 */;
			echo '">
';
		}
		echo '	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="snippet,archive">
	<meta name="author" content="f3l1x">

	';
		$this->renderBlock('head', get_defined_vars()) /* line 19 */;
		echo '
</head>
<body class="g-sidenav-show  bg-gray-100">
';
		$this->renderBlock('main', get_defined_vars()) /* line 22 */;
		echo '
</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block #title} on line 10 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Webapp Skeleton';
	}


	/** {block #head} on line 19 */
	public function blockHead(array $ʟ_args): void
	{
		
	}


	/** {block #main} on line 22 */
	public function blockMain(array $ʟ_args): void
	{
		
	}

}
