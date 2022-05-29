<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnquirySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enquiries';
$this->params['breadcrumbs'][] = $this->title;
$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
$color = ArrayHelper::map(\app\models\Color::find()->asArray()->all(), 'id', 'color');
$model = ArrayHelper::map(app\models\VehicleModel::find()->asArray()->all(), 'id', 'model');
?>
<div class="enquiry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Enquiry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'customer_name',
            //'address',
            'contact_no',
            //'email:email',
            'target_time',
            //'finance_type',
            //'urgency',
            //'remarks:ntext',
            [
                'attribute' => 'fk_brand',
                'value' => 'brand.brand',
                'filter' => $brand,
            ],
            [
                'attribute' => 'fk_model',
                'value' => 'model.model',
                'filter' => $model,
            ],
            [
                'attribute' => 'fk_color',
                'value' => 'color.color',
                'filter' => $color
            ],
            //'fk_user_id',
            //'fk_organization_id',
            //'fk_branch_id',
            // 'created_date',
            ['class' => 'yii\grid\ActionColumn','template'=>'{update}{view}'],
        ],
    ]);
    ?>


</div>
