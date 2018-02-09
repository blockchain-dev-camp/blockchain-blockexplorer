<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:57
 */

namespace BlockExplorer\DTO;


class TransactionDTO
{
    private $from;
    private $to;
    private $value;
    private $senderPubKey;
    private $senderSignature;
    private $transactionHash;
    private $paid;
    private $dateReceived;
    private $minedInBlockIndex;
    private $isReceiver = false;


    public function __construct(object $data)
    {
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }
        }
    }

    public function getPaidStatus(): string
    {
        if ($this->getPaid()){
            return "Successful";
        } else {
            return "Failed";
        }
    }

    public function setIsReceiver()
    {
        $this->isReceiver = true;
    }
    public function isReceiver()
    {
        return $this->isReceiver;
    }
    public function getFormattedDateReceived()
    {
        $date = strtotime($this->getDateReceived());
        return date('d/m/Y H:i:s', $date);
    }
    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getSenderPubKey()
    {
        return $this->senderPubKey;
    }

    /**
     * @return mixed
     */
    public function getSenderSignature()
    {
        return $this->senderSignature;
    }

    /**
     * @return mixed
     */
    public function getTransactionHash()
    {
        return $this->transactionHash;
    }

    /**
     * @return mixed
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @return mixed
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * @return mixed
     */
    public function getMinedInBlockIndex()
    {
        return $this->minedInBlockIndex;
    }


}