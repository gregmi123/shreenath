<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InterestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interest Rates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Interest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'rate',
            // 'fk_branch',
            // 'fk_user_id',
            // 'status',
            //'created_date',
            //'fk_organization',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
