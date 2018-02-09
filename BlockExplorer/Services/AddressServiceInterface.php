<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 9.2.2018 г.
 * Time: 16:01
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\AddressInfoDTO;

interface AddressServiceInterface
{
    public function getHistory(string $addressHash): AddressInfoDTO;
}