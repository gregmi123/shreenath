<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'contract_letter') ?>

    <?php // echo $form->field($model, 'fk_branch_id') ?>

    <?php // echo $form->field($model, 'fk_organization_id') ?>

    <?php // echo $form->field($model, 'fk_user_id') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'fk_province') ?>

    <?php // echo $form->field($model, 'fk_district') ?>

    <?php // echo $form->field($model, 'fk_municipal') ?>

    <?php // echo $form->field($model, 'fk_ward') ?>

    <?php // echo $form->field($model, 'tol') ?>

    <?php // echo $form->field($model, 'emp_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
