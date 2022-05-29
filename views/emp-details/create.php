<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpDetails */

$this->title = 'Create Emp Details';
$this->params['breadcrumbs'][] = ['label' => 'Emp Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_details'=>$user_details,
    ]) ?>

</div>
