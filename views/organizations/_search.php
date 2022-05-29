<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_nepali') ?>

    <?= $form->field($model, 'name_english') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'fk_province') ?>

    <?php // echo $form->field($model, 'fk_district') ?>

    <?php // echo $form->field($model, 'fk_municipal') ?>

    <?php // echo $form->field($model, 'fk_ward') ?>

    <?php // echo $form->field($model, 'tol') ?>

    <?php // echo $form->field($model, 'org_code') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'last_updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
