<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */
/* @var $form yii\widgets\ActiveForm */
$helper = new app\controllers\Helper();
//$models = ArrayHelper::map(app\models\VehicleModel::find()->asArray()->all(), 'id', 'model');
$colors = ArrayHelper::map(\app\models\Color::find()->asArray()->all(), 'id', 'color');
$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
Yii::$app->params['bsDependencyEnabled'] = false
?>

<div class="enquiry-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered">
        <tr>
            <td>
                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <?=
                        $form->field($model, 'fk_brand')->widget(Select2::className(), [
                            'data' => $brand,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'brand'],
                        ])
                        ?>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <?=
                        $form->field($model, 'fk_model')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'model'],
                            'pluginOptions' => [
                                'depends' => ['brand'],
                                //  'initialize' => $model->isNewRecord ? false : true,
                                'placeholder' => 'छान्नुहोस्',
                                'url' => Url::to('index.php?r=enquiry/model'),
                            ]
                        ])
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 'fk_color')->widget(\kartik\select2\Select2::className(), [
                            'data' => $colors,
                            'options' => ['placeholder' => 'choose'],
                        ])
                        ?>
                    </div>
                    <div class="col-md-3">
                         <?= $form->field($model, 'target_time', ['inputOptions' => ['id' => 'nepali-datepicker1', 'class' => 'form-control']]); ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'finance_type')->widget(Select2::className(), [
                            'data' => \app\models\Enquiry::getFinanceType(),
                            'options' => ['placeholder' => 'Choose']
                        ])
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'urgency')->widget(Select2::className(), [
                            'data' => \app\models\Enquiry::getType(),
                            'options' => ['placeholder' => 'Choose']
                        ])
                        ?>
                    </div>
                    <div class="col-md-4">


                        <?= $form->field($model, 'remarks')->textarea(['rows' => 4]) ?>
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
<?php
$js = "$('#nepali-datepicker1').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});";
$this->registerJs($js, 5);
