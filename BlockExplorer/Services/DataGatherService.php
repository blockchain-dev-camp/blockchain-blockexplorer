<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:51
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\ServerInfoDTO;

class DataGatherService implements DataGatherServiceInterface
{
    const API_SERVER_URL = "http://localhost:5555";

    public function getServerInfo()
    {
        $serverInfo = file_get_contents(self::API_SERVER_URL . "/info");
        $serverInfoDTO = new ServerInfoDTO($serverInfo);
        return $serverInfoDTO;
    }
}