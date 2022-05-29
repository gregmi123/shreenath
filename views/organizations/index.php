<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganizationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organizations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Organizations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //  'id',
            'name_nepali',
            'name_english',
            'phone',
            'email:email',
            //'fax',
            //'fk_province',
            //'fk_district',
            //'fk_municipal',
            //'fk_ward',
            //'tol',
            'org_code',
            //'created_date',
            //'last_updated_date',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]);
    ?>


</div>
