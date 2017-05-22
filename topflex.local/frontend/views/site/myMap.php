<?php
/**
 * Created by PhpStorm.
 * User: Serhii Zub
 * Date: 19.05.17
 * Time: 17:56
 */

use frontend\widgets\map\Map;

echo Map::widget([
    'zoom' => 16,
//    'center' => 'Red Square',
    'width' => 700,
    'height' => 400,
    'mapType' => Map::MAP_TYPE_ROADMAP,
    'sensor' => true,
//    'markerFitBounds' => true,
//    'mapType' => Map::MAP_TYPE_SATELLITE,
]);

