<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 9.2.2018 г.
 * Time: 15:55
 */

require_once ('autoload.php');
$blockService = new \BlockExplorer\Services\BlockService($dataGatherer);
$addressService = new \BlockExplorer\Services\AddressService($dataGatherer, $blockService);
$addressHistoryHandler = new \BlockExplorer\Http\AddressHistoryHttpHandler($template, $addressService);
$addressHistoryHandler->show($_GET);