<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpPost */

$this->title = 'Update Emp Post: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emp Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
