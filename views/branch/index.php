<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Branch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            // 'fk_organization_id',
            [
                'attribute' => 'fk_province',
                'value' => 'province.province_nepali',
            ],
             [
                'attribute' => 'fk_district',
                'value' => 'district.district_nepali',
            ],
             [
                'attribute' => 'fk_municipal',
                'value' => 'municipal.municipal_nepali',
            ],
         
            'fk_ward',
            'tol',
            'phone',
            //'email:email',
            //'fax',
            //'created_date',
            //'updated_date',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]);
    ?>


</div>
