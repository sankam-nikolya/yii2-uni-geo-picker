<?php
/**
 * Created by PhpStorm.
 * User: Jakeroid
 * Date: 16-Mar-16
 * Time: 16:41
 */

use jakeroid\liqugallerywidget\UniGeoPickerAsset;

/* @var $this yii\web\View */
/* @var $form \yii\widgets\ActiveForm */
/* @var $model \yii\base\Model */
/* @var $attribute string */

UniGeoPickerAsset::register($this);
?>

<div
    id="uni-geo-picker-widget"
    class="panel panel-default"
>
    <div class="panel-heading">
        <button type="button" class="btn btn-default no-focus spoiler-trigger" data-toggle="collapse"><?= Yii::t('app', 'Geo Picker') ?></button>
    </div>
    <div class="panel-collapse collapse out">
        <div class="panel-body">
        </div>
    </div>
    <?= $form->field($model, $attribute)->hiddenInput(['id' => 'uni-geo-picker-input']) ?>
</div>
