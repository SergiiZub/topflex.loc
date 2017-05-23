<?php
/**
 * Created by PhpStorm.
 * User: Serhii Zub
 * Date: 19.05.17
 * Time: 16:24
 */

namespace frontend\widgets\googleMap;

use frontend\widgets\googleMap\GoogleAsset;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;
use Yii;

class GoogleMap extends Widget
//class GoogleMap extends \yii\bootstrap\Widget
{
    public $model;
    public $attribute = 'google-map-input';
    public $location = [
        'lat' => '50.4501',
        'lng' => '30.5234',
    ];
    public function init() {
        parent::init();
        $view = Yii::$app->getView();
        $this->registerAssets();
        $view->registerJs($this->getJs());
    }
    public function run() {
        $content = Html::label('Google maps location');
        $text = isset($this->model) ? $this->model->{$this->attribute} : '';
        $content .= Html::input('text', $this->attribute, htmlspecialchars_decode($text),['id' => 'pac-input', 'class'=>'controls', 'placeholder' => "Enter a location"]);
        $content .= Html::tag('div', null, ['id'=>'map-canvas']);
        $output = Html::tag('div', $content,['id' => 'google_maps_div', 'style' => 'margin-bottom: 10px;']);
        return $output;
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        GoogleAsset::register($view);
    }

    private function getJs() {
//        echo 'hello google maps';
        //Ваш js код должен быть здесь.
        //Это ваше домашнее задание.))
    }
}