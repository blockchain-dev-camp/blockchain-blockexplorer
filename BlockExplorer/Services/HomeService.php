<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 19:54
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\ServerInfoDTO;
use Core\DataGathererInterface;

class HomeService extends ServiceAbstract implements HomeServiceInterface
{
    public function __construct(DataGathererInterface $dataGatherer)
    {
        parent::__construct($dataGatherer);
    }

    public function getServerInfo()
    {
        $rawData = $this->dataGatherer->getRawData("/info");
        $serverInfo = $jsonArray = json_decode($rawData);
        $serverInfoDTO = new ServerInfoDTO($serverInfo);
        return $serverInfoDTO;

    }
}