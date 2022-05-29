<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FollowSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="follow-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reamarks') ?>

    <?= $form->field($model, 'previous_date') ?>

    <?= $form->field($model, 'updated_date') ?>

    <?= $form->field($model, 'fk_enquiry') ?>

    <?php // echo $form->field($model, 'fk_user') ?>

    <?php // echo $form->field($model, 'fk_branch') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
