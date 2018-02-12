<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:29
 */

require_once ('autoload.php');
$blockService = new \BlockExplorer\Services\BlockService($dataGatherer);
$transactionService = new \BlockExplorer\Services\TransactionService($dataGatherer, $blockService);
$transactionHandler = new \BlockExplorer\Http\TransactionHttpHandler($template, $transactionService);
$transactionHandler->view($_GET);