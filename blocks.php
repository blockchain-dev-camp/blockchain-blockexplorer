<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 18:42
 */

require_once ('autoload.php');
$blockService = new \BlockExplorer\Services\BlockService($dataGatherer);
$blockHandler = new \BlockExplorer\Http\BlockHttpHandler($template, $blockService);
$blockHandler->getBlockData($_GET);