<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnquirySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Follow Up';
$this->params['breadcrumbs'][] = $this->title;
$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
$color = ArrayHelper::map(\app\models\Color::find()->asArray()->all(), 'id', 'color');
$model = ArrayHelper::map(app\models\VehicleModel::find()->asArray()->all(), 'id', 'model');
?>
<div class="enquiry-index">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?=Html::button(Html::img('images/email1.png',['width'=>'25px','height'=>'25px']).' Send Message', ['class' => 'btn btn-success','style'=>'float:right;','onclick'=>'message()']) ?>
    </p>
    <p>
        <?=Html::button(Html::img('images/gmail.png',['width'=>'25px','height'=>'25px']).' Send Mail', ['class' => 'btn btn-danger','style'=>'float:right;','onclick'=>'mail()']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id'=>'mytable',
        'rowOptions'=>function($data){
            if($data['status']==1){
                return ['style' => 'background-color:#55AD58;color:white;'];
            }else if($data['status']==0){
                return ['style' => 'background-color:#800080;color:white;'];
            }else if($data['status']==2){
                return ['style' => 'background-color:#E94542;color:white;'];
            }else{
                return ['style' => 'background-color:#55AD58;color:white;'];
            }

            
        },
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
            ['attribute'=>'status',
            'label'=>'Follow Up Status',
            'filter'=>['1'=>'Success','2'=>'Cancel','0'=>'Running','3'=>'Submitted'],
            'value'=>function($data){
                if($data['status']==1){
                    return 'Success';
                }
                if($data['status']==2){
                    return 'Cancel';
                }
                else if($data['status']==0){
                    return 'Running';
                }else{
                    return 'Submitted';
                }
            }
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                // you may configure additional properties here
            ],
            ['class' => 'yii\grid\ActionColumn','template'=>'{View}{Form}',
            'options'=>['style'=>'width:20%;'],
            'buttons'=>[
                'View'=>function($url){
                    return Html::a('View',$url,['class'=>'btn btn-primary']);
                },
                'Form'=>function($url,$model){
                    if($model['status']==1){
                    return Html::a('Form',$url,['class'=>'btn btn-danger','style'=>'margin-left:.5em;']);
                    }
                    else if($model['status']==3){
                        return Html::a('Submitted',[''],['class'=>'btn btn-success','style'=>'margin-left:.5em;']); 
                    }
                }
            ],
            'urlCreator'=>function($action,$model){
                // if($action=='Add'){
                //     $url='index.php?r=follow/create&e_id='.$model->id;
                //     return $url;                
                // }
                if($action=='View'){
                    $url='index.php?r=follow/index&e_id='.$model->id;
                    return $url;                
                }
                if($action=='Form'){
                    $url='index.php?r=saleform/buyform&e_id='.$model->id;
                    return $url;                
                }
            }
            ],
        ],
    ]);
    ?>


</div>
<script>
    function message(){
        var keys = $('#mytable').yiiGridView('getSelectedRows');
        if(keys.length==0){
            alert('Please select at least one customer');
        }else{
            console.log(keys);
            window.open('index.php?r=enquiry/message&customer='+keys,"_self");
        }
    }
    function mail(){
        var keys = $('#mytable').yiiGridView('getSelectedRows');
        if(keys.length==0){
            alert('Please select at least one customer');
        }else{
            console.log(keys);
            window.open('index.php?r=enquiry/mail&customer='+keys,"_self");
        }
    }
</script>