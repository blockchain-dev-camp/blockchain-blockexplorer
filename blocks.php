<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 18:42
 */

require_once ('autoload.php');
$template = new \Core\Template();
$dataGatherService = new \BlockExplorer\Services\DataGatherService();
$homeHandler = new \BlockExplorer\Http\HomeHttpHandler($template, $dataGatherService);
$homeHandler->getAllBlocks();