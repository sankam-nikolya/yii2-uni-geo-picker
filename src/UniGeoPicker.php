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

    public function init()
    {
        if (!$this->model && !$this->attribute) {
            throw new ErrorException(Yii::t('uni-geo-picker', 'Model and attribute did not set.'));
        }
        
        if (!$this->button_label) {
            $this->button_label = Yii::t('uni-geo-picker', 'Uni Geo Picker');
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
        ]);
    }
}
