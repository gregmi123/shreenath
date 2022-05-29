<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="enquiry-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'customer_name',
            'address',
            'contact_no',
            'email:email',
            'target_time',
            ['attribute'=>'finance_type',
            'value'=>function($data){
                if($data['finance_type']==1){
                    return 'FINANCE';
                }else{
                    return 'CASH';
                }
            }
            ],
            ['attribute'=>'urgency',
            'value'=>function($data){
                if($data['urgency']==1){
                    return 'HOT';
                }else if($data['urgency']==2){
                    return 'MEDIUM';
                }else{
                    return 'COLD';
                }
            }
            ],
            'remarks:ntext',
            [
                'attribute' =>'fk_brand',
                'value' =>function($data){
                    $brand=\app\models\Brand::findone(['id'=>$data['fk_brand']]);
                    return $brand['brand'];
                }
            ],
            [
                'attribute' =>'fk_model',
                'value' =>function($data){
                    $model=\app\models\VehicleModel::findone(['id'=>$data['fk_model']]);
                    return $model['model'];
                }
            ],
            [
                'attribute' =>'fk_color',
                'value' =>function($data){
                    $color=\app\models\Color::findone(['id'=>$data['fk_color']]);
                    return $color['color'];
                }
            ],
            // 'fk_user_id',
            // 'fk_organization_id',
            // 'fk_branch_id',
            'created_date',
        ],
    ]) ?>

</div>
