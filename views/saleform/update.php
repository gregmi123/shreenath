<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saleform */

$this->title = 'Update Saleform: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Saleforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="saleform-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
        'user_details'=>$user_details,
        'modelsAddress' => $modelsAddress,
        'modelsAddressFoc' =>$modelsAddressFoc,
    ]) ?>

</div>
