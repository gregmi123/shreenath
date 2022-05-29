<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saleform */

$this->title = 'Create Saleform';
$this->params['breadcrumbs'][] = ['label' => 'Saleforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_details'=>$user_details,
        'modelsAddress' => (empty($modelsAddress)) ? [new PaymentDetails] : $modelsAddress,
        'modelsAddressFoc' => (empty($modelsAddressFoc)) ? [new FocDetail] : $modelsAddressFoc,
    ]) ?>

</div>
