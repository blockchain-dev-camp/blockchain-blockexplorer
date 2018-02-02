<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:50
 */

namespace BlockExplorer\Services;


interface DataGatherServiceInterface
{
    public function getServerInfo();
    public function getBlocksData();

}