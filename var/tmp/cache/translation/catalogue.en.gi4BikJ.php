<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en', array (
  'admin' => 
  array (
    'appName' => 'App Name',
  ),
));

$catalogueCs = new MessageCatalogue('cs', array (
  'admin' => 
  array (
    'appName' => 'Název aplikace',
  ),
));
$catalogue->addFallbackCatalogue($catalogueCs);

return $catalogue;
