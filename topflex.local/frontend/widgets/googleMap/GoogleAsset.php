<?php
/**
 * Created by PhpStorm.
 * User: Serhii Zub
 * Date: 19.05.17
 * Time: 16:22
 */

namespace frontend\widgets\googleMap;



//class GoogleAsset extends AssetBundle
use yii\web\AssetBundle;

class GoogleAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/googleMap/assets';
    public $css = [
        'css/google.maps.css'
    ];

    public $js = [
        'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}