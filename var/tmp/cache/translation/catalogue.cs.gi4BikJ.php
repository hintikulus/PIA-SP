<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('cs', array (
  'admin' => 
  array (
    'appName' => 'Název aplikace',
  ),
));


return $catalogue;
