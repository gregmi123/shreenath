<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Interest */

$this->title = 'Update Interest Rate: ' . $model->rate;
$this->params['breadcrumbs'][] = ['label' => 'Interest Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rate, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="interest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
