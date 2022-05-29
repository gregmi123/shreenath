<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
$color = ArrayHelper::map(\app\models\Color::find()->asArray()->all(), 'id', 'color');
$model = ArrayHelper::map(app\models\VehicleModel::find()->asArray()->all(), 'id', 'model');
/* @var $this yii\web\View */
/* @var $searchModel app\models\SaleformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sale Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleform-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?=Html::a(Html::img('images/page.png',['width'=>'25px','height'=>'25px']).' Create',['create'] ,['class' => 'btn btn-primary']) ?>
    </p>
    <p>
        <?=Html::button(Html::img('images/email1.png',['width'=>'25px','height'=>'25px']).' Send Message', ['class' => 'btn btn-success','style'=>'float:right;','onclick'=>'message()']) ?>
    </p>
    <p>
        <?=Html::button(Html::img('images/gmail.png',['width'=>'25px','height'=>'25px']).' Send Mail', ['class' => 'btn btn-danger','style'=>'float:right;','onclick'=>'mail()']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id'=>'mytable',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'p_province',
            // 'p_district',
            // 'p_municipal',
            //'p_ward',
            //'t_province',
            //'t_district',
            //'t_municipal',
            //'t_ward',
            //'total_amt',
            //'paid_amt',
            //'due_amt',
            //'completion_date',
            ['attribute'=>'brand',
            'value'=>function($data){
                $brand=\app\models\Brand::findone(['id'=>$data['brand']]);
                return $brand['brand'];
            },
            'filter'=>$brand,
            ],
            ['attribute'=>'model',
            'value'=>function($data){
                $model=\app\models\VehicleModel::findone(['id'=>$data['model']]);
                return $model['model'];
            },
            'filter'=>$model,
            ],
            ['attribute'=>'color',
            'value'=>function($data){
                $color=\app\models\Color::findone(['id'=>$data['color']]);
                return $color['color'];
            },
            'filter'=>$color,
            ],
            //'displacement',
            //'frame_no',
            //'engine_no',
            //'reg_no',
            //'vehicle_type',
            //'thumb_left',
            //'left_iso_template',
            //'left_ansi_template',
            //'thumb_right',
            //'right_iso_template',
            //'right_ansi_template',
            //'citizenship_number',
            [
                'class' => 'yii\grid\CheckboxColumn',
                // you may configure additional properties here
            ],
            'jaari_date',
            
            //'mobile_no',
            //'inspection_report',
            //'citizenship_no',
            //'vat_doc',
            //'owner_citizenship',
            //'certificate',
            //'fk_branch',
            //'fk_user',
            //'fk_organization',
            //'status',
            //'created_date',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{update}'
            ],
        ],
    ]); ?>


</div>
<script>
    function message(){
        var keys = $('#mytable').yiiGridView('getSelectedRows');
        if(keys.length==0){
            alert('Please select at least one customer');
        }else{
            console.log(keys);
            window.open('index.php?r=saleform/message&customer='+keys,"_self");
        }
    }
    function mail(){
        var keys = $('#mytable').yiiGridView('getSelectedRows');
        if(keys.length==0){
            alert('Please select at least one customer');
        }else{
            console.log(keys);
            window.open('index.php?r=saleform/mail&customer='+keys,"_self");
        }
    }
</script>