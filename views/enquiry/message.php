<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label'=>'Follow Up','url'=>['enquiry/follow']];
$this->params['breadcrumbs'][] = ['label'=>'Send Message'];
?>

<div class="follow-mail">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-2">
                <h3>
                    Data
                </h3>
                <hr style="border:1px solid gray;border-bottom:0px;">
                <p>[{customer_name}]</p>
            </div>
            <div class="col-sm-10">
            <?= $form->field($model, 'message')->textarea(['rows' => 20]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-success',
                    'data'=>[
                        'confirm'=>'Are you sure want to send message ?',
                        'method'=>'post',
                    ]    
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <= $form->field($model, 'message')->textarea(['rows' => 6]) ?> -->
    

    

    <?php ActiveForm::end(); ?>

</div>
