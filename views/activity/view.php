<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
$employee=\app\models\EmpDetails::findone(['id'=>$model['fk_employee']]);
$this->title = $employee->name;
$this->params['breadcrumbs'][] = ['label' => 'IN/OUT', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="activity-view">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
