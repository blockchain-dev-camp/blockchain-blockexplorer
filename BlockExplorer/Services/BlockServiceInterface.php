<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 19:59
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\BlockDTO;

interface BlockServiceInterface
{

    public function getBlocksData(): array;

    public function getBlockByIndex(int $index): BlockDTO;

}