<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Models';
$this->params['breadcrumbs'][] = $this->title;
$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
?>
<div class="model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            [
                'attribute' => 'fk_brand',
                'value' => 'brand.brand',
                'filter' => $brand,
            ],
            'model',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]);
    ?>


</div>
