<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:29
 */

require_once ('autoload.php');
$transactionService = new \BlockExplorer\Services\TransactionService($dataGatherer);
$transactionHandler = new \BlockExplorer\Http\TransactionHttpHandler($template, $transactionService);
$transactionHandler->view($_GET);