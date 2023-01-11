<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('cs', array (
  'admin' => 
  array (
    'appName' => 'Název aplikace',
    'role.secretariat' => 'Sekretariát',
    'role.department_manager' => 'Vedoucí oddělení',
    'role.user' => 'Zaměstnanec',
  ),
));


return $catalogue;
