<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:31
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\BlockDTO;
use BlockExplorer\DTO\TransactionDTO;
use Core\DataGathererInterface;

class TransactionService extends ServiceAbstract implements TransactionServiceInterface
{

    public function __construct(DataGathererInterface $dataGatherer)
    {
        parent::__construct($dataGatherer);
    }

    public function viewAllInBlockIndex(int $index): ?BlockDTO
    {
        $rawData = $this->dataGatherer->getRawData("/blocks/" . $index);
        if (null === $rawData){
            return null;
        }
        $block = new BlockDTO(json_decode($rawData));
        return $block;
    }

    public function viewSingleTransactionByHash(string $transHash): ?TransactionDTO
    {
        $rawData = $this->dataGatherer->getRawData("/transaction/" . $transHash . "info");
        if (null === $rawData){
            return null;
        }
        $transactionDTO = new TransactionDTO(json_decode($rawData));
        return $transactionDTO;
    }
}