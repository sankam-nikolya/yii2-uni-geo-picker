<?php
/**
 * Created by PhpStorm.
 * User: jakeroid
 * Date: 4/27/16
 * Time: 3:10 PM
 */

namespace jakeroid\unigeopicker;

use Yii;
use yii\web\AssetBundle;

class YandexMapAsset extends AssetBundle
{
    public $depends = [
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

    public function init()
    {
        $this->js[] = 'https://api-maps.yandex.ru/2.1/?lang=' . Yii::$app->language;
        parent::init();
    }
}