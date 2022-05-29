<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */

$this->title = 'Update Enquiry: ' . $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enquiry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
    ]) ?>

</div>
