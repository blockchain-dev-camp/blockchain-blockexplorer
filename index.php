<?php
require_once ('autoload.php');
$homeService = new \BlockExplorer\Services\HomeService($dataGatherer);
$homeHandler = new \BlockExplorer\Http\HomeHttpHandler($template, $homeService);
$homeHandler->index();