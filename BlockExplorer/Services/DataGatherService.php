<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:51
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\BlockDTO;
use BlockExplorer\DTO\ServerInfoDTO;

class DataGatherService implements DataGatherServiceInterface
{
    const API_SERVER_URL = "http://localhost:5555";

    public function getServerInfo(): ServerInfoDTO
    {
        $rawData = $this->getRawData("/info");
        $serverInfo = $jsonArray = json_decode($rawData);
        $serverInfoDTO = new ServerInfoDTO($serverInfo);
        return $serverInfoDTO;
    }


    public function getBlocksData(): array
    {
       $rawData = $this->getRawData("/blocks");
       $blocksDataArray = json_decode($rawData);
       $blocksArray = [];
       foreach($blocksDataArray as $value){
           $blocksArray[] = new BlockDTO($value);
       }
        return $blocksArray;
    }


    private function getRawData(string $urlPath): string
    {
        $rawData = file_get_contents(self::API_SERVER_URL . $urlPath);
        return $rawData;
    }
}