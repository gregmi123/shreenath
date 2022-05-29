<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EmpDetails */
/* @var $form yii\widgets\ActiveForm */
Yii::$app->params['bsDependencyEnabled'] = false;
$ward = ArrayHelper::map(app\models\Ward::find()->asArray()->all(), 'id', 'ward');
$province = ArrayHelper::map(\app\models\Province::find()->all(), 'id', 'province_nepali');
$message = Yii::$app->session->getFlash('message');

?>

<div class="emp-details-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <table class="table table-bordered">
        <tr>
            <td>
                <?php 
                if($message){
                    echo '<h3 style="color:red;">'.$message.'</h3>';
                }
                ?>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                     <div class="col-md-4 col-sm-6">
                        <?= $form->field($model, 'gender')->dropDownList(['1'=>'Male','2'=>'Female','3'=>'Other'],['promt'=>'Choose']) ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <?= $form->field($model, 'blood_group')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-3">
                        <?=
                        $form->field($model, 'fk_province')->widget(Select2::className(), [
                            'data' => $province,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'province'],
                        ])
                        ?>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-3">
                        <?=
                        $form->field($model, 'fk_district')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'district'],
                            'pluginOptions' => [
                                'depends' => ['province'],
                                //  'initialize' => $model->isNewRecord ? false : true,
                                'placeholder' => 'छान्नुहोस्',
                                'initialize'=>true,
                                'url' => Url::to('index.php?r=organizations/district'),
                            ]
                        ])
                        ?>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-3">
                        <?=
                        $form->field($model, 'fk_municipal')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'farm-municipal'],
                            'pluginOptions' => [
                                'depends' => ['district'],
                                'placeholder' => 'छान्नुहोस्',
                                'initialize'=>true,
                                'url' => Url::to('index.php?r=organizations/municipal'),
                            ]
                        ])
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <?= $form->field($model, 'fk_ward')->widget(Select2::className(),[
                            'data'=>$ward,
                            'options'=>['placeholder'=>'choose ward'],
                        ]) ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?= $form->field($model, 'tol')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <?= $form->field($model, 'image')->fileInput() ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <?= $form->field($model, 'contract')->fileInput() ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <?= $form->field($model, 'emp_code')->textInput(['maxlength' => true]) ?>
                    </div>

                </div>
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </td>
        </tr>
    </table>
    <?php ActiveForm::end(); ?>

</div>
