<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 9.2.2018 г.
 * Time: 16:00
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\AddressInfoDTO;
use BlockExplorer\DTO\BlockDTO;
use BlockExplorer\DTO\TransactionDTO;
use Core\DataGathererInterface;

class AddressService extends ServiceAbstract implements AddressServiceInterface
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

    public function getHistory(string $addressHash): AddressInfoDTO
    {
        $addressInfoDTO = new AddressInfoDTO($addressHash);
        /**
         * @var BlockDTO[] $allBlocks
         */
        $allBlocks = $this->blockService->getBlocksData();
        foreach ($allBlocks as $block)
        {
            foreach($block->getTransactions() as $transaction)
            {
                /**
                 * @var TransactionDTO $transaction
                 */
                if ($addressHash === $transaction->getToAddress()){
                    $transaction->setIsReceiver();
                    if ($transaction->getPaid()){
                     $addressInfoDTO->increaseBalance($transaction->getValue());
                    }
                    $addressInfoDTO->addTransactionToHistory($transaction);
                } else if ($addressHash === $transaction->getFromAddress()) {
                    if ($transaction->getPaid()){
                        $addressInfoDTO->decreaseBalance($transaction->getValue());
                    }
                    $addressInfoDTO->addTransactionToHistory($transaction);
                }
            }
        }
        $addressInfoDTO->sortTransactionsByDate();
        return $addressInfoDTO;

    }
}