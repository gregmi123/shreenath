<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="follow-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class="col-sm-4">
    <?= $form->field($model, 'updated_date',['inputOptions' => ['id' => 'nepali-datepicker1', 'class' => 'form-control']])->label('Upcoming Date'); ?>
    </div>
    <div class="col-sm-12">
    <?= $form->field($model, 'reamarks')->textarea(['rows' => 4]) ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = "$('#nepali-datepicker1').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});";
$this->registerJs($js, 5);
