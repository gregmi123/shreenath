<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Organizations */
/* @var $form yii\widgets\ActiveForm */
$province = ArrayHelper::map(\app\models\Province::find()->all(), 'id', 'province_nepali');
$ward = ['1' => 1, '2' => 2];
Yii::$app->params['bsDependencyEnabled'] = false
?>
<div class="organizations-form" style="margin-top: 30px;">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered">

        <tr>
            <td>
                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($model, 'name_nepali')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'name_english')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </td>

        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <?=
                        $form->field($model, 'fk_province')->widget(Select2::className(), [
                            'data' => $province,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'province'],
                        ])
                        ?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <?=
                        $form->field($model, 'fk_district')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'district'],
                            'pluginOptions' => [
                                'depends' => ['province'],
                              //  'initialize' => $model->isNewRecord ? false : true,
                                'placeholder' => 'छान्नुहोस्',
                                'url' => Url::to('index.php?r=organizations/district'),
                            ]
                        ])
                        ?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <?=
                        $form->field($model, 'fk_municipal')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'farm-municipal'],
                            'pluginOptions' => [
                                'depends' => ['district'],
                                'placeholder' => 'छान्नुहोस्',
                                'url' => Url::to('index.php?r=organizations/municipal'),
                            ]
                        ])
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?=
                        $form->field($model, 'fk_ward')->widget(Select2::className(), [
                            'data' => $ward,
                            'options' => ['placeholder' => 'Choose district'],
                        ])
                        ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'tol')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </td>
        </tr>
    </table>




<?php ActiveForm::end(); ?>

</div>
