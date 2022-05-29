<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Interest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
