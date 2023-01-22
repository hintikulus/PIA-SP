<?php

namespace App\UI\Components\UserAllocation;
use App\UI\Components\UserAllocation\UserAllocationGrid;

interface UserAllocationGridFactory
{
	/**
	 * Vytvoření komponenty tabulky alokací uživatele
	 * @param int|null $id identifikátor uživatele (pokud null, tak jsou zobrazena data přihlášeného uživatele)
	 * @return \App\UI\Components\UserAllocation\UserAllocationGrid
	 */
	public function create(?int $id = null): UserAllocationGrid;
}
