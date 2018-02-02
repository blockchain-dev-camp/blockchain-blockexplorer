<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:50
 */

namespace Core;


interface DataGathererInterface
{
    public function getRawData(string $urlPath);

}