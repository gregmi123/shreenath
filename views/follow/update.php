<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */
$this->params['breadcrumbs'][] = ['label' => 'Follow Up', 'url' => ['enquiry/follow']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['follow/index','e_id'=>$model->fk_enquiry]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="follow-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
