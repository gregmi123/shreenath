<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */


$this->params['breadcrumbs'][] = ['label' => 'Follow Up', 'url' => ['enquiry/follow']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['follow/index','e_id'=>$model->fk_enquiry]];
$this->params['breadcrumbs'][] = ['label'=>'Details'];
\yii\web\YiiAsset::register($this);
?>
<div class="follow-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'reamarks',
            'previous_date',
            'updated_date',
            // 'fk_enquiry',
            // 'fk_user',
            // 'fk_branch',
            // 'status',
        ],
    ]) ?>

</div>
