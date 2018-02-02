<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:31
 */

namespace BlockExplorer\Services;


use Core\DataGathererInterface;

class ServiceAbstract
{
    /**
     * @var DataGathererInterface $dataGatherer
     */
    public $dataGatherer;

    public function __construct(DataGathererInterface $dataGatherer)
    {
        $this->dataGatherer = $dataGatherer;
    }
}