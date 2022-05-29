<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Model */
/* @var $form yii\widgets\ActiveForm */
$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
?>

<div class="model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fk_brand')->dropDownList($brand,['prompt'=>'Choose']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
