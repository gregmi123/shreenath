<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label'=>'Follow Up','url'=>['follow/index','e_id'=>$e_id]];
$this->params['breadcrumbs'][] = ['label'=>'Mail'];
?>

<div class="follow-mail">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mail')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
