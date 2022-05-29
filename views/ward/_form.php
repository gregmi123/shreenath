<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ward */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ward-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ward')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'fk_organization_id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
