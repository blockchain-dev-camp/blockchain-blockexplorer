<?php
require_once ('autoload.php');
$template = new \Core\Template();
$dataGatherService = new \BlockExplorer\Services\DataGatherService();
$homeHandler = new \BlockExplorer\Http\HomeHttpHandler($template, $dataGatherService);
$homeHandler->index();