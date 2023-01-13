<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en', array (
  'admin' => 
  array (
    'appName' => 'App Name',
    'role.secretariat' => 'Secretariat',
    'role.department_manager' => 'Department manager',
    'role.user' => 'Employee',
  ),
));

$catalogueCs = new MessageCatalogue('cs', array (
  'admin' => 
  array (
    'appName' => 'Název aplikace',
    'role.secretariat' => 'Sekretariát',
    'role.department_manager' => 'Vedoucí oddělení',
    'role.user' => 'Zaměstnanec',
  ),
));
$catalogue->addFallbackCatalogue($catalogueCs);

return $catalogue;
