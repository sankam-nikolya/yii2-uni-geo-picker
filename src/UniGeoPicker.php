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
    public $form;
    public $attribute;

    public function init()
    {
        if (!$this->form && !$this->attribute) {
            throw new ErrorException(Yii::t('uni-geo-picker', 'Form and attribute did not set.'));
        }
        parent::init();
    }

    public function run()
    {
        return $this->render('uni-geo-picker', [
            'form' => $this->form,
            'attribute' => $this->attribute,
        ]);
    }
}