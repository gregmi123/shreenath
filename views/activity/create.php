<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Add IN/OUT';
$this->params['breadcrumbs'][] = ['label' => 'IN/OUT', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_details'=>$user_details,
    ]) ?>

</div>
