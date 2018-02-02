<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 18:42
 */

require_once ('autoload.php');
$template = new \Core\Template();
$blockService = new \BlockExplorer\Services\BlockService($dataGatherer);
$homeHandler = new \BlockExplorer\Http\BlockHttpHandler($template, $blockService);
$homeHandler->getAllBlocks();