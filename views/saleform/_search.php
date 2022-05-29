<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaleformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saleform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'p_province') ?>

    <?= $form->field($model, 'p_district') ?>

    <?= $form->field($model, 'p_municipal') ?>

    <?php // echo $form->field($model, 'p_ward') ?>

    <?php // echo $form->field($model, 't_province') ?>

    <?php // echo $form->field($model, 't_district') ?>

    <?php // echo $form->field($model, 't_municipal') ?>

    <?php // echo $form->field($model, 't_ward') ?>

    <?php // echo $form->field($model, 'total_amt') ?>

    <?php // echo $form->field($model, 'paid_amt') ?>

    <?php // echo $form->field($model, 'due_amt') ?>

    <?php // echo $form->field($model, 'completion_date') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'displacement') ?>

    <?php // echo $form->field($model, 'frame_no') ?>

    <?php // echo $form->field($model, 'engine_no') ?>

    <?php // echo $form->field($model, 'reg_no') ?>

    <?php // echo $form->field($model, 'vehicle_type') ?>

    <?php // echo $form->field($model, 'thumb_left') ?>

    <?php // echo $form->field($model, 'left_iso_template') ?>

    <?php // echo $form->field($model, 'left_ansi_template') ?>

    <?php // echo $form->field($model, 'thumb_right') ?>

    <?php // echo $form->field($model, 'right_iso_template') ?>

    <?php // echo $form->field($model, 'right_ansi_template') ?>

    <?php // echo $form->field($model, 'citizenship_number') ?>

    <?php // echo $form->field($model, 'jaari_date') ?>

    <?php // echo $form->field($model, 'mobile_no') ?>

    <?php // echo $form->field($model, 'inspection_report') ?>

    <?php // echo $form->field($model, 'citizenship_no') ?>

    <?php // echo $form->field($model, 'vat_doc') ?>

    <?php // echo $form->field($model, 'owner_citizenship') ?>

    <?php // echo $form->field($model, 'certificate') ?>

    <?php // echo $form->field($model, 'fk_branch') ?>

    <?php // echo $form->field($model, 'fk_user') ?>

    <?php // echo $form->field($model, 'fk_organization') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
