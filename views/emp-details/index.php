<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emp Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Emp Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'phone',
            'email:email',
           // 'photo',
            //'contract_letter',
            //'fk_branch_id',
            //'fk_organization_id',
            //'fk_user_id',
            //'created_date',
            //'updated_date',
            //'fk_province',
            //'fk_district',
            //'fk_municipal',
            //'fk_ward',
            //'tol',
            'emp_code',
            ['class' => 'yii\grid\ActionColumn','template'=>'{update}{view}'],
        ],
    ]); ?>


</div>
