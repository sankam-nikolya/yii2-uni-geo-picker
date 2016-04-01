<?php
/**
 * Created by PhpStorm.
 * User: Jakeroid
 * Date: 28-Mar-16
 * Time: 18:29
 */

namespace jakeroid\unigeopicker;

use Yii;
use yii\base\ErrorException;
use yii\base\Widget;

class UniGeoPicker extends Widget
{
    public $model;
    public $attribute;
    public $zoom_level;
    public $default_center_coordinates;
    public $button_label;
    public $map_height;

    public function init()
    {
        $i18n = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . DIRECTORY_SEPARATOR . '/messages',
            'forceTranslation' => true,
        ];

        Yii::$app->i18n->translations['uni-geo-picker'] = $i18n;

        if (!$this->model && !$this->attribute) {
            throw new ErrorException(Yii::t('uni-geo-picker', 'MODEL_AND_ATTRIBUTE_DID_NOT_SET'));
        }
        
        if (!$this->button_label) {
            $this->button_label = Yii::t('uni-geo-picker', 'UNI_GEO_PICKER');
        }
        
        if (!$this->map_height) {
            $this->map_height = 500;
        }
        
        parent::init();
    }

    public function run()
    {
        return $this->render('uni-geo-picker', [
            'model' => $this->model,
            'attribute' => $this->attribute,
            'zoom_level' => $this->zoom_level,
            'default_center_coordinates' => $this->default_center_coordinates,
            'button_label' => $this->button_label,
            'map_height' => $this->map_height,
        ]);
    }
}
