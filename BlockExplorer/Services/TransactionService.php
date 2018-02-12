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
    /**
     * @var BlockServiceInterface
     */
    private $blockService;
    public function __construct(DataGathererInterface $dataGatherer,
                                BlockServiceInterface $blockService)
    {
        parent::__construct($dataGatherer);
        $this->blockService = $blockService;
    }

    public function viewAllInBlockIndex(int $index): ?BlockDTO
    {
        $rawData = $this->dataGatherer->getRawData("/blocks/" . $index);
        if (null === $rawData){
            return null;
        }
        $block = new BlockDTO(json_decode($rawData));
        $block->sortTransactionsByDate();
        return $block;
    }

    public function viewSingleTransactionByHash(string $transHash): ?TransactionDTO
    {

        $blocks = $this->blockService->getBlocksData();

        /**
         * @var BlockDTO[] $blocks
         */
        foreach ($blocks as $block)
        {
            /**
             * @var TransactionDTO $transaction
             */
            foreach ($block->getTransactions() as $transaction)
            {
                if ($transaction->getTransactionHash() === $transHash) {
                    return $transaction;
                }
            }
        }

        return null;
    }

    public function viewAllTransactions(): array
    {
        $transactions = [];
        $blocks = $this->blockService->getBlocksData();

        /**
         * @var BlockDTO[] $blocks
         */
        foreach ($blocks as $block)
        {
            /**
             * @var TransactionDTO $transaction
             */
            foreach ($block->getTransactions() as $transaction)
            {
                $transactions[] = $transaction;
            }
        }

        usort($transactions, array($this, "sortingTransactionsByDate"));

        return $transactions;

    }

    private  function sortingTransactionsByDate($a , $b)
    {
        return $a->getFormattedDateReceived() < $b->getFormattedDateReceived();
    }
}