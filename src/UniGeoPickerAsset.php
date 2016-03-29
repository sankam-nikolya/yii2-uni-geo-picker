<?php
/**
 * Created by PhpStorm.
 * User: Jakeroid
 * Date: 16-Mar-16
 * Time: 16:44
 */

namespace jakeroid\unigeopicker;

use Yii;
use yii\web\AssetBundle;

class UniGeoPickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jakeroid/yii2-uni-geo-picker/src/assets';
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

    public function init()
    {
        $this->css[] = 'css/uni-geo-picker.css';

        $this->js[] = 'https://api-maps.yandex.ru/2.1/?lang=' . Yii::$app->language;
        
        //TODO: Make min version of js and css
        //$this->js[] = YII_DEBUG ? 'js/uni-geo-picker.js' : 'js/uni-geo-picker.min.js';
        $this->js[] = 'js/uni-geo-picker.js';

        parent::init();
    }
}