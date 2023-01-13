<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('cs', array (
  'admin' => 
  array (
    'appName' => 'Název aplikace',
    'base.add' => 'Přidat',
    'base.edit' => 'Upravit',
    'base.deleteConfirm' => 'Opravdu chcete odstranit záznam?',
    'role.secretariat' => 'Sekretariát',
    'role.department_manager' => 'Vedoucí oddělení',
    'role.user' => 'Zaměstnanec',
    'user.menu' => 'Lidé',
    'workspace.menu' => 'Pracovní skupiny',
    'workspace.title' => 'Pracovní skupina',
    'workspace.title_multiple' => 'Pracovní skupiny',
    'workspace.attributes.name' => 'Název',
    'workspace.attributes.shortcut' => 'Zkratka',
    'workspace.form.title_add' => 'Přidat pracovní skupinu',
    'workspace.form.title_edit' => 'Upravit pracovní skupinu',
  ),
));


return $catalogue;
