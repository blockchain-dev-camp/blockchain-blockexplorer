<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:00
 */

namespace BlockExplorer\Services;


use BlockExplorer\DTO\BlockDTO;
use Core\DataGathererInterface;

class BlockService extends ServiceAbstract implements BlockServiceInterface
{
    public function __construct(DataGathererInterface $dataGatherer)
    {
        parent::__construct($dataGatherer);
    }

    public function getBlocksData(): array
    {
        $rawData = $this->dataGatherer->getRawData("/blocks");
        $blocksDataArray = json_decode($rawData);
        $blocksArray = [];
        foreach($blocksDataArray as $value){
            $blocksArray[] = new BlockDTO($value);
        }
        return $blocksArray;
    }

    public function getBlockByIndex(int $index): BlockDTO
    {
       $rawData = $this->dataGatherer->getRawData('/blocks/' . $index);
       $block = new BlockDTO(json_decode($rawData));
       return $block;
    }
}