<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:35
 */

namespace BlockExplorer\DTO;

class ServerInfoDTO
{
    private $about;
    private $name;
    private $peers;
    private $blocks;
    private $confimedTransactions;
    private $pendingTransactions;
    private $addresses;
    private $coins;

    public function __construct(object $data)
    {
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPeers()
    {
        return $this->peers;
    }

    /**
     * @return mixed
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @return mixed
     */
    public function getConfimedTransactions()
    {
        return $this->confimedTransactions;
    }

    /**
     * @return mixed
     */
    public function getPendingTransactions()
    {
        return $this->pendingTransactions;
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @return mixed
     */
    public function getCoins()
    {
        return $this->coins;
    }


}