<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:51
 */

namespace Core;


use BlockExplorer\DTO\BlockDTO;
use BlockExplorer\DTO\ServerInfoDTO;

class DataGatherer implements DataGathererInterface
{
    const API_SERVER_URL = "http://178.75.234.192:5555";

    /**
     * Takes an URL path that is added to the main host and extracts the raw json data.
     * @param string $urlPath
     * @return string
     */
    public function getRawData(string $urlPath): ?string
    {
        $rawData = @file_get_contents(self::API_SERVER_URL . $urlPath);
        if ($rawData === false){
           return null;
        }
        return $rawData;
    }
}