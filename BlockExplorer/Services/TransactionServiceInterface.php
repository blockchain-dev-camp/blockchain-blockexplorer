<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:30
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\BlockDTO;
use BlockExplorer\DTO\TransactionDTO;

interface TransactionServiceInterface
{
    public function viewAllInBlockIndex(int $index): BlockDTO;

    public function viewSingleTransactionByHash(string $transHash): TransactionDTO;
}