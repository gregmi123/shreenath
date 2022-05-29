<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'IN/OUT';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add IN/OUT', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute'=>'fk_employee',
            'value'=>function($data){
                $employee=\app\models\EmpDetails::findone(['id'=>$data['fk_employee']]);
                return $employee['name'];
            }    
            ],
            'remarks',
            // 'fk_user_id',
            // 'fk_branch_id',
            //'fk_organization_id',
            ['attribute'=>'in_date',
            'value'=>function($data){
                if($data['in_date']==null){
                    return '-';
                }else{
                    return $data['in_date'];
                }
            }
            ],
            ['attribute'=>'out_date',
            'value'=>function($data){
                if($data['out_date']==null){
                    return '-';
                }else{
                    return $data['out_date'];
                }
            }
            ],
            ['attribute'=>'status',
            'format'=>'html',
            'value'=>function($data){
                if($data['status']==1){
                    return Html::a('IN',[''],['class'=>'btn btn-success']);
                }else{
                    return Html::a('OUT',[''],['class'=>'btn btn-danger']);
                }
            }
            ],
            ['attribute'=>'created_date',
            'label'=>'Date',
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}{update}',
            ],
        ],
    ]); ?>


</div>
