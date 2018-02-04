<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 19:53
 */
namespace BlockExplorer\Services;
use BlockExplorer\DTO\ServerInfoDTO;

interface HomeServiceInterface
{

    public function getServerInfo(): ?ServerInfoDTO;
}