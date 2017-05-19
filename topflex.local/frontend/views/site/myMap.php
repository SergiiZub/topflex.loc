<?php
/**
 * Created by PhpStorm.
 * User: Serhii Zub
 * Date: 19.05.17
 * Time: 17:56
 */

?>

<?php
use frontend\widgets\map\Map;

?>

how to use widget:

```php

<?=

Map::widget([
    'zoom' => 16,
    'center' => 'Red Square',
    'width' => 700,
    'height' => 400,
    'mapType' => Map::MAP_TYPE_SATELLITE,
]);
?>
