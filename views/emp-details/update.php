<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpDetails */

$this->title = 'Update Emp Details: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Emp Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
    ]) ?>

</div>
