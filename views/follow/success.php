<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Model */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Success';
$this->params['breadcrumbs'][] = ['label' => 'Follow Up', 'url' => ['enquiry/follow']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['follow/index','e_id'=>$e_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="model-form">

    <?php $form = ActiveForm::begin(); ?>

    <table class="table table-bordered" style="margin-top:15em;">
        <tr>
            <td style="border:1px solid white;">
                <div class="row">
                    <div class="col-sm-6" style="text-align:center;">
                        <?= Html::a('Ready to buy',['follow/buy','e_id'=>$e_id],['class'=>'btn btn-success','style'=>'width:50%;',
                        'data'=>[
                            'confirm'=>'Are you Sure?',
                            'method'=>'post',
                        ]
                        ]);?>
                    </div>
                    <div class="col-sm-6" style="float:left;">
                        <?= Html::a('Cancel Follow Up',['follow/cancel','e_id'=>$e_id],['class'=>'btn btn-danger','style'=>'width:50%;']);?>
                    </div>
                </div>
            </td>
        </tr>

    </table>

    <?php ActiveForm::end(); ?>

</div>
