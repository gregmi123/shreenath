<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnquirySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enquiry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'contact_no') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'target_time') ?>

    <?php // echo $form->field($model, 'finance_type') ?>

    <?php // echo $form->field($model, 'urgency') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'fk_brand') ?>

    <?php // echo $form->field($model, 'fk_model') ?>

    <?php // echo $form->field($model, 'fk_color') ?>

    <?php // echo $form->field($model, 'fk_user_id') ?>

    <?php // echo $form->field($model, 'fk_organization_id') ?>

    <?php // echo $form->field($model, 'fk_branch_id') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
