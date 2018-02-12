<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 9.2.2018 г.
 * Time: 15:59
 */

namespace BlockExplorer\DTO;


class AddressInfoDTO
{
    private $addressHash;
    private $balance = 0;
    /**
     * @var TransactionDTO[] $transactionsHistory
     */
    private $transactionsHistory = [];

    public function __construct(string $addressHash)
    {
        $this->addressHash = $addressHash;
    }

    public function increaseBalance(float $amount): void
    {
        $this->balance += $amount;
    }

    public function decreaseBalance(float $amount): void
    {
        $this->balance -= $amount;
    }
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return array
     */
    public function getTransactionsHistory(): array
    {
        return $this->transactionsHistory;
    }

    public function addTransactionToHistory(TransactionDTO $transactionDTO): void
    {
        $this->transactionsHistory[] = $transactionDTO;
    }

    /**
     * @return string
     */
    public function getAddressHash(): string
    {
        return $this->addressHash;
    }


    public function sortTransactionsByDate(): void
    {
       usort($this->transactionsHistory, array($this, "sortingTransactionsFunction"));

    }

    private  function sortingTransactionsFunction($a , $b)
    {
        return $a->getFormattedDateReceived() < $b->getFormattedDateReceived();
    }

}