<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$helper = new app\controllers\Helper();
$branch = ArrayHelper::map(app\models\Branch::find()->where(['fk_organization_id' => $helper->getOrganization()])->asArray()->all(), 'id', 'tol');
Yii::$app->params['bsDependencyEnabled'] = false;
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'fk_branch_id')->widget(\kartik\select2\Select2::className(), [
        'data' => $branch,
        'options'=>['placeholder'=>'Choose branch'],
    ])
    ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'Superadmin','2'=>'Admin','3'=>'Employee'],['prompt' =>'Select User Type....']) ?>

    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
