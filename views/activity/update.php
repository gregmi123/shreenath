<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
$employee=\app\models\EmpDetails::findone(['id'=>$model['fk_employee']]);
$this->title = 'Update: '.$employee->name;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $employee->name, 'url' => ['view', 'id' => $model->id]];
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_details'=>$user_details,
    ]) ?>

</div>
