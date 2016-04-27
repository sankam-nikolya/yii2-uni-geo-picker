<?php
/**
 * Created by PhpStorm.
 * User: Jakeroid
 * Date: 16-Mar-16
 * Time: 16:41
 */

use jakeroid\unigeopicker\UniGeoPickerAsset;
use jakeroid\unigeopicker\YandexMapAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form \yii\widgets\ActiveForm */
/* @var $model \yii\base\Model */
/* @var $attribute string */
/* @var $zoom_level string */
/* @var $default_center_coordinates [] */
/* @var $button_label */
/* @var $map_height */

if (!Yii::$app->request->isPjax) {
    YandexMapAsset::register($this);
    UniGeoPickerAsset::register($this);
}
?>

<div
    id="uni-geo-picker-widget"
    class="panel panel-default"
    data-zoom-level="<?= $zoom_level ?>"
    data-default-center-coordinates="<?= $default_center_coordinates ?>"
>
    <div class="panel-heading">
        <button type="button" class="btn btn-default no-focus spoiler-trigger" data-toggle="collapse"><?= $button_label ?></button>
    </div>
    <div class="panel-collapse collapse out">
        <div class="panel-body">
            <div id="uni-geo-picker-map" style="height: <?= $map_height ?>px;">
                
            </div>
        </div>
    </div>
    <?= Html::activeHiddenInput($model, $attribute, ['id' => 'uni-geo-picker-hidden-input']) ?>
</div>

<?php if (Yii::$app->request->isPjax): ?>
<script>
    uniGeoPickerAttachEvents();
</script>
<? endif; ?>
