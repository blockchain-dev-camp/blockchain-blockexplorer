<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 18:36
 */

namespace BlockExplorer\DTO;


class BlockDTO
{
    private $index;
    private $transactions = [];
    private $difficulty;
    private $prevBlockHash;
    private $minedBy;
    private $nounce;
    private $dateCreated;
    private $blockHash;

    public function __construct(object $data)
    {
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
              if ($key === "transactions"){
                 foreach ($val as $transaction){
                     $this->transactions[] = new TransactionDTO($transaction);
                 }
              } else {
                  $this->$key = $val;
              }
            }
        }
    }
    public function getFormattedDateCreated()
    {
        $date = strtotime($this->getDateCreated());
        return date('d/m/Y H:i:s', $date);
    }
    public function getTransactionsCount(): int
    {
        return count($this->transactions);
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return array
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @return mixed
     */
    public function getPrevBlockHash()
    {
        return $this->prevBlockHash;
    }

    /**
     * @return mixed
     */
    public function getMinedBy()
    {
        return $this->minedBy;
    }

    /**
     * @return mixed
     */
    public function getNonce()
    {
        return $this->nounce;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return mixed
     */
    public function getBlockHash()
    {
        return $this->blockHash;
    }
    public function sortTransactionsByDate(): void
    {
        usort($this->transactions, array($this, "sortingTransactionsFunction"));

    }

    private  function sortingTransactionsFunction($a , $b)
    {
        return $a->getFormattedDateReceived() < $b->getFormattedDateReceived();
    }



}