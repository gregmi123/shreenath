  <?php 
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use kartik\widgets\Select2;
  use kartik\depdrop\DepDrop;
  use yii\helpers\ArrayHelper;
  use yii\helpers\Url;
  Yii::$app->params['bsDependencyEnabled'] = false;
  $ward = ArrayHelper::map(app\models\Ward::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']])->all(), 'id', 'ward');
  $province = ArrayHelper::map(\app\models\Province::find()->all(), 'id', 'province_nepali');
  $pro=\app\models\Province::find()->where(['id'=>1])->one();
  ?>
  <?php $form=ActiveForm::begin(['id'=>'dynamic-form']) ?>
  <?= $form->field($model, 'thumb_left')->textInput(['maxlength' => true,'value'=>$pro['id']]) ?>
                    <div class="col-md-3">
                        <?=
                        $form->field($model, 't_province')->widget(Select2::className(), [
                            'data' => $province,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'province1'],
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                            $form->field($model, 't_district')->widget(DepDrop::className(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'options' => ['id' => 'district1'],
                                'pluginOptions' => [
                                    'depends' => ['province1'],
                                    //  'initialize' => $model->isNewRecord ? false : true,
                                    'placeholder' => 'छान्नुहोस्',
                                    'url' => Url::to('index.php?r=organizations/district'),
                                ]
                            ])
                            ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 't_municipal')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'farm-municipal1'],
                            'pluginOptions' => [
                                'depends' => ['district1'],
                                'placeholder' => 'छान्नुहोस्',
                                'url' => Url::to('index.php?r=organizations/municipal'),
                            ]
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 't_ward')->widget(Select2::className(),[
                            'data'=>$ward,
                            'options'=>['placeholder'=>'choose ward'],
                        ]) ?>
                        </div>

        <?php Activeform::end() ?>