<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Interest */

$this->title = $model->rate;
$this->params['breadcrumbs'][] = ['label' => 'Interest Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="interest-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'rate',
            // 'fk_branch',
            // 'fk_user_id',
            // 'status',
            // 'created_date',
            // 'fk_organization',
        ],
    ]) ?>

</div>
