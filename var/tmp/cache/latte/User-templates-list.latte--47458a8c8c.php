<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/User/templates/list.latte */
final class Template47458a8c8c extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block #content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Uživatelé</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
					<table class="table align-items-center mb-0">
						<thead>
						<tr>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Osoba</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Funkce</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
							<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
							<th class="text-secondary opacity-7"></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div>
										<img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-sm">John Michael</h6>
										<p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs font-weight-bold mb-0">Manager</p>
								<p class="text-xs text-secondary mb-0">Organization</p>
							</td>
							<td class="align-middle text-center text-sm">
								<span class="badge badge-sm bg-gradient-success">Online</span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary text-xs font-weight-bold">23/04/18</span>
							</td>
							<td class="align-middle">
								<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
									Edit
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div>
										<img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-sm">Alexa Liras</h6>
										<p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs font-weight-bold mb-0">Programator</p>
								<p class="text-xs text-secondary mb-0">Developer</p>
							</td>
							<td class="align-middle text-center text-sm">
								<span class="badge badge-sm bg-gradient-secondary">Offline</span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary text-xs font-weight-bold">11/01/19</span>
							</td>
							<td class="align-middle">
								<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
									Edit
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div>
										<img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user3">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-sm">Laurent Perrier</h6>
										<p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs font-weight-bold mb-0">Executive</p>
								<p class="text-xs text-secondary mb-0">Projects</p>
							</td>
							<td class="align-middle text-center text-sm">
								<span class="badge badge-sm bg-gradient-success">Online</span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary text-xs font-weight-bold">19/09/17</span>
							</td>
							<td class="align-middle">
								<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
									Edit
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div>
										<img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user4">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-sm">Michael Levi</h6>
										<p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs font-weight-bold mb-0">Programator</p>
								<p class="text-xs text-secondary mb-0">Developer</p>
							</td>
							<td class="align-middle text-center text-sm">
								<span class="badge badge-sm bg-gradient-success">Online</span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary text-xs font-weight-bold">24/12/08</span>
							</td>
							<td class="align-middle">
								<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
									Edit
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div>
										<img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user5">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-sm">Richard Gran</h6>
										<p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs font-weight-bold mb-0">Manager</p>
								<p class="text-xs text-secondary mb-0">Executive</p>
							</td>
							<td class="align-middle text-center text-sm">
								<span class="badge badge-sm bg-gradient-secondary">Offline</span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary text-xs font-weight-bold">04/10/21</span>
							</td>
							<td class="align-middle">
								<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
									Edit
								</a>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div>
										<img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-sm">Miriam Eric</h6>
										<p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs font-weight-bold mb-0">Programtor</p>
								<p class="text-xs text-secondary mb-0">Developer</p>
							</td>
							<td class="align-middle text-center text-sm">
								<span class="badge badge-sm bg-gradient-secondary">Offline</span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary text-xs font-weight-bold">14/09/20</span>
							</td>
							<td class="align-middle">
								<a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
									Edit
								</a>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Uživatelé</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
';
		/* line 200 */ $_tmp = $this->global->uiControl->getComponent("userListGrid");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '				</div>
			</div>
		</div>
	</div>
</div>
';
	}

}
