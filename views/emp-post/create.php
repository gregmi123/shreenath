<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpPost */

$this->title = 'Create Emp Post';
$this->params['breadcrumbs'][] = ['label' => 'Emp Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
