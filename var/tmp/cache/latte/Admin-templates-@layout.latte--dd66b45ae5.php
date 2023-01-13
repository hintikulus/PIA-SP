<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/templates/@layout.latte */
final class Templatedd66b45ae5 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['head' => 'blockHead', 'main' => 'blockMain'],
	];


	public function main(): array
	{
		extract($this->params);
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('head', get_defined_vars()) /* line 3 */;
		echo '

';
		$this->renderBlock('main', get_defined_vars()) /* line 22 */;
		echo "\n";
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		$this->parentName = '../../Base/templates/@layout.latte';
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block #head} on line 3 */
	public function blockHead(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Nucleo Icons -->
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/assets/css/nucleo-icons.css" rel="stylesheet">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */;
		echo '/assets/css/nucleo-svg.css" rel="stylesheet">
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous" defer></script>
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */;
		echo '/assets/css/nucleo-svg.css" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */;
		echo '/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet">

	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */;
		echo '/assets/css/datagrid.css">

	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */;
		echo '/assets/css/datagrid-spinners.css">

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */;
		echo '/assets/admin.js" defer></script>
';
	}


	/** {block #main} on line 22 */
	public function blockMain(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
		   id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
			   aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html "
			   target="_blank">
				<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 30 */;
		echo '/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold">';
		
		$ᴛ_contributteTranslationMessage = "admin.appName";

		if (is_string($ᴛ_contributteTranslationMessage)) {
			$ᴛ_contributteTranslationMessage = isset($ᴛ_contributteTranslationPrefix) && !\Contributte\Translation\Helpers::isAbsoluteMessage("admin.appName") ? implode(".", $ᴛ_contributteTranslationPrefix) . "." . "admin.appName" : "admin.appName";
		}

		echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, $ᴛ_contributteTranslationMessage));
		echo '</span>
			</a>
		</div>
		<hr class="horizontal dark mt-0">
		<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Home:")) /* line 38 */;
		echo '"';
		echo ($ʟ_tmp = array_filter([$presenter->isLinkCurrent('Home:') ? 'active' : null, 'nav-link'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 38 */;
		echo '>
						<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
							<svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<title>shop </title>
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
									   fill-rule="nonzero">
										<g transform="translate(1716.000000, 291.000000)">
											<g transform="translate(0.000000, 148.000000)">
												<path class="color-background opacity-6"
													  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
												<path class="color-background"
													  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
											</g>
										</g>
									</g>
								</g>
							</svg>
						</div>
						<span class="nav-link-text ms-1">Domů</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Sekretariát</h6>
				</li>
';
		if ($presenter->user->isAllowed('Admin:Project:list')) /* line 64 */ {
			echo '				<li class="nav-item">
					<a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Project:list")) /* line 65 */;
			echo '"';
			echo ($ʟ_tmp = array_filter([$presenter->isLinkCurrent('Project:list') ? 'active' : null, 'nav-link'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 65 */;
			echo '>
						<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
							<svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<title>shop </title>
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
									   fill-rule="nonzero">
										<g transform="translate(1716.000000, 291.000000)">
											<g transform="translate(0.000000, 148.000000)">
												<path class="color-background opacity-6"
													  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
												<path class="color-background"
													  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
											</g>
										</g>
									</g>
								</g>
							</svg>
						</div>
						<span class="nav-link-text ms-1">Projekty</span>
					</a>
				</li>
';
		}
		if ($presenter->user->isAllowed('Admin:User:list')) /* line 88 */ {
			echo '				<li class="nav-item">
					<a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("User:list")) /* line 89 */;
			echo '"';
			echo ($ʟ_tmp = array_filter([$presenter->isLinkCurrent('User:list') ? 'active' : null, 'nav-link'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 89 */;
			echo '>
						<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
							<svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<title>shop </title>
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
									   fill-rule="nonzero">
										<g transform="translate(1716.000000, 291.000000)">
											<g transform="translate(0.000000, 148.000000)">
												<path class="color-background opacity-6"
													  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
												<path class="color-background"
													  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
											</g>
										</g>
									</g>
								</g>
							</svg>
						</div>
						<span class="nav-link-text ms-1">Lidé</span>
					</a>
				</li>
';
		}
		if ($presenter->user->isAllowed('Admin:Workspace:list')) /* line 112 */ {
			echo '				<li class="nav-item">
					<a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Workspace:list")) /* line 113 */;
			echo '"';
			echo ($ʟ_tmp = array_filter([$presenter->isLinkCurrent('Workspace:list') ? 'active' : null, 'nav-link'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 113 */;
			echo '>
						<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
							<svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<title>shop </title>
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
									   fill-rule="nonzero">
										<g transform="translate(1716.000000, 291.000000)">
											<g transform="translate(0.000000, 148.000000)">
												<path class="color-background opacity-6"
													  d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
												<path class="color-background"
													  d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
											</g>
										</g>
									</g>
								</g>
							</svg>
						</div>
						<span class="nav-link-text ms-1">Oddělení</span>
					</a>
				</li>
';
		}
		echo '			</ul>
		</div>
		<div class="sidenav-footer mx-3 ">
		</div>
	</aside>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
			 navbar-scroll="true">
			<div class="container-fluid py-1 px-3">
				<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
					<ul class="ms-md-auto pe-md-3 d-flex align-items-center navbar-nav  justify-content-end">
						<li class="nav-item d-flex align-items-center">
';
		if (!$presenter->user->isLoggedIn()) /* line 149 */ {
			echo '							<a class="nav-link text-body font-weight-bold px-0" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) /* line 150 */;
			echo '">
								<i class="fa fa-user me-sm-1"></i>
								<span class="d-sm-inline d-none">Sign In</span>
							</a>
';
		} else /* line 154 */ {
			echo '							<a href="#" class="nav-link text-body font-weight-bold px-0">
								<i class="fa fa-user me-sm-1"></i>
								<span class="d-sm-inline d-none">';
			echo LR\Filters::escapeHtmlText($presenter->user->getIdentity()->getData()['firstname']) /* line 157 */;
			echo ' ';
			echo LR\Filters::escapeHtmlText($presenter->user->getIdentity()->getData()['lastname']) /* line 157 */;
			echo '</span>
							</a>
';
		}
		echo '						</li>
						<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</a>
						</li>
						<li class="nav-item px-3 d-flex align-items-center">
							<a class="nav-link text-body p-0" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("UserSettings:")) /* line 171 */;
		echo '">
								<i class="fa fa-cog cursor-pointer"></i>
							</a>
						</li>
						<li class="nav-item dropdown pe-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
							   data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-bell cursor-pointer"></i>
							</a>
							<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
								aria-labelledby="dropdownMenuButton">
								<li class="mb-2">
									<a class="dropdown-item border-radius-md" href="javascript:;">
										<div class="d-flex py-1">
											<div class="my-auto">
												<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 186 */;
		echo '/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
											</div>
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">New message</span> from Laur
												</h6>
												<p class="text-xs text-secondary mb-0 ">
													<i class="fa fa-clock me-1"></i>
													13 minutes ago
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="mb-2">
									<a class="dropdown-item border-radius-md" href="javascript:;">
										<div class="d-flex py-1">
											<div class="my-auto">
												<img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 204 */;
		echo '/assets/img/small-logos/logo-spotify.svg"
													 class="avatar avatar-sm bg-gradient-dark  me-3 ">
											</div>
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">New album</span> by Travis Scott
												</h6>
												<p class="text-xs text-secondary mb-0 ">
													<i class="fa fa-clock me-1"></i>
													1 day
												</p>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a class="dropdown-item border-radius-md" href="javascript:;">
										<div class="d-flex py-1">
											<div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
												<svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
													 xmlns="http://www.w3.org/2000/svg"
													 xmlns:xlink="http://www.w3.org/1999/xlink">
													<title>credit-card</title>
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g transform="translate(-2169.000000, -745.000000)"
														   fill="#FFFFFF" fill-rule="nonzero">
															<g transform="translate(1716.000000, 291.000000)">
																<g transform="translate(453.000000, 454.000000)">
																	<path class="color-background"
																		  d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
																		  opacity="0.593633743"></path>
																	<path class="color-background"
																		  d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
																</g>
															</g>
														</g>
													</g>
												</svg>
											</div>
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													Payment successfully completed
												</h6>
												<p class="text-xs text-secondary mb-0 ">
													<i class="fa fa-clock me-1"></i>
													2 days
												</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown pe-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
							   data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-globe cursor-pointer"></i>
							</a>
							<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
								aria-labelledby="dropdownMenuButton">
								<li class="mb-2">
									<a class="dropdown-item border-radius-md" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":changeLocale!", ['locale' => 'cs'])) /* line 265 */;
		echo '">
										<div class="d-flex py-1">
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">Čeština</h6>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a class="dropdown-item border-radius-md" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":changeLocale!", ['locale' => 'en'])) /* line 274 */;
		echo '">
										<div class="d-flex py-1">
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">English</h6>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
';
		if ($presenter->user->isLoggedIn()) /* line 284 */ {
			echo '						<li class="nav-item d-flex align-items-center">
							<a class="nav-link text-body p-0" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) /* line 285 */;
			echo '">
								<i class="fas fa-sign-out-alt fixed-plugin-button-nav cursor-pointer"></i>
							</a>
						</li>
';
		}
		echo '					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
';
		$this->renderBlock('content', [], 'html') /* line 295 */;
		echo '			<footer class="footer pt-3  ">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								©
								<script>
									document.write(new Date().getFullYear())
								</script>,
								<a href="https://www.hintik.cz" class="font-weight-bold" target="_blank">Jan Hinterholzinger</a>

							</div>
						</div>
						<div class="col-lg-6">
							<ul class="nav nav-footer justify-content-center justify-content-lg-end">
								<li class="nav-item">
									<a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
										Tim</a>
								</li>
								<li class="nav-item">
									<a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
									   target="_blank">About Us</a>
								</li>
								<li class="nav-item">
									<a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
									   target="_blank">Blog</a>
								</li>
								<li class="nav-item">
									<a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
									   target="_blank">License</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>
	<div class="fixed-plugin">
		<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
			<i class="fa fa-cog py-2"> </i>
		</a>
		<div class="card shadow-lg ">
			<div class="card-header pb-0 pt-3 ">
				<div class="float-start">
					<h5 class="mt-3 mb-0">Soft UI Configurator</h5>
					<p>See our dashboard options.</p>
				</div>
				<div class="float-end mt-4">
					<button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
						<i class="fa fa-close"></i>
					</button>
				</div>
				<!-- End Toggle Button -->
			</div>
			<hr class="horizontal dark my-1">
			<div class="card-body pt-sm-3 pt-0">
				<!-- Sidebar Backgrounds -->
				<div>
					<h6 class="mb-0">Sidebar Colors</h6>
				</div>
				<a href="javascript:void(0)" class="switch-trigger background-color">
					<div class="badge-colors my-2 text-start">
						<span class="badge filter bg-gradient-primary active" data-color="primary"
							  onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-dark" data-color="dark"
							  onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-info" data-color="info"
							  onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-success" data-color="success"
							  onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-warning" data-color="warning"
							  onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-danger" data-color="danger"
							  onclick="sidebarColor(this)"></span>
					</div>
				</a>
				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">Sidenav Type</h6>
					<p class="text-sm">Choose between 2 different sidenav types.</p>
				</div>
				<div class="d-flex">
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
							onclick="sidebarType(this)">Transparent
					</button>
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
							onclick="sidebarType(this)">White
					</button>
				</div>
				<p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
				<!-- Navbar Fixed -->
				<div class="mt-3">
					<h6 class="mb-0">Navbar Fixed</h6>
				</div>
				<div class="form-check form-switch ps-0">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
						   onclick="navbarFixed(this)">
				</div>
				<hr class="horizontal dark my-sm-4">
				<a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free
					Download</a>
				<a class="btn btn-outline-dark w-100"
				   href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View
					documentation</a>
				<div class="w-100 text-center">
					<a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
					   data-icon="octicon-star" data-size="large" data-show-count="true"
					   aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
					<h6 class="mt-3">Thank you for sharing!</h6>
					<a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
					   class="btn btn-dark mb-0 me-2" target="_blank">
						<i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
					</a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
					   class="btn btn-dark mb-0 me-2" target="_blank">
						<i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 419 */;
		echo '/assets/js/core/jquery.min.js"></script>
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 420 */;
		echo '/assets/js/core/popper.min.js"></script>
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 421 */;
		echo '/assets/js/core/bootstrap.min.js"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 423 */;
		echo '/assets/js/netteForms.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/nette.ajax.js@2.3.0/nette.ajax.js"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 426 */;
		echo '/assets/js/datagrid.js"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 428 */;
		echo '/assets/js/datagrid-instant-url-refresh.js"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 430 */;
		echo '/assets/js/datagrid-spinners.js"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 432 */;
		echo '/assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 433 */;
		echo '/assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 434 */;
		echo '/assets/js/plugins/chartjs.min.js"></script>
	<script>
		var ctx = document.getElementById("chart-bars").getContext("2d");

		new Chart(ctx, {
			type: "bar",
			data: {
				labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Sales",
					tension: 0.4,
					borderWidth: 0,
					borderRadius: 4,
					borderSkipped: false,
					backgroundColor: "#fff",
					data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
					maxBarThickness: 6
				},],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: \'index\',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
						},
						ticks: {
							suggestedMin: 0,
							suggestedMax: 500,
							beginAtZero: true,
							padding: 15,
							font: {
								size: 14,
								family: "Open Sans",
								style: \'normal\',
								lineHeight: 2
							},
							color: "#fff"
						},
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false
						},
						ticks: {
							display: false
						},
					},
				},
			},
		});


		var ctx2 = document.getElementById("chart-line").getContext("2d");

		var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

		gradientStroke1.addColorStop(1, \'rgba(203,12,159,0.2)\');
		gradientStroke1.addColorStop(0.2, \'rgba(72,72,176,0.0)\');
		gradientStroke1.addColorStop(0, \'rgba(203,12,159,0)\'); //purple colors

		var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

		gradientStroke2.addColorStop(1, \'rgba(20,23,39,0.2)\');
		gradientStroke2.addColorStop(0.2, \'rgba(72,72,176,0.0)\');
		gradientStroke2.addColorStop(0, \'rgba(20,23,39,0)\'); //purple colors

		new Chart(ctx2, {
			type: "line",
			data: {
				labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Mobile apps",
					tension: 0.4,
					borderWidth: 0,
					pointRadius: 0,
					borderColor: "#cb0c9f",
					borderWidth: 3,
					backgroundColor: gradientStroke1,
					fill: true,
					data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
					maxBarThickness: 6

				},
					{
						label: "Websites",
						tension: 0.4,
						borderWidth: 0,
						pointRadius: 0,
						borderColor: "#3A416F",
						borderWidth: 3,
						backgroundColor: gradientStroke2,
						fill: true,
						data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
						maxBarThickness: 6
					},
				],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: \'index\',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							padding: 10,
							color: \'#b2b9bf\',
							font: {
								size: 11,
								family: "Open Sans",
								style: \'normal\',
								lineHeight: 2
							},
						}
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							color: \'#b2b9bf\',
							padding: 20,
							font: {
								size: 11,
								family: "Open Sans",
								style: \'normal\',
								lineHeight: 2
							},
						}
					},
				},
			},
		});
	</script>
	<script>
		var win = navigator.platform.indexOf(\'Win\') > -1;
		if (win && document.querySelector(\'#sidenav-scrollbar\')) {
			var options = {
				damping: \'0.5\'
			}
			Scrollbar.init(document.querySelector(\'#sidenav-scrollbar\'), options);
		}
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 617 */;
		echo '/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
';
	}

}
