<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'username',
            'password',
            // 'auth_key',
            // 'fk_organization_id',
            // 'fk_branch_id',
            ['attribute'=>'status',
            'value'=>function($data){
                if($data['status']==1){
                    return 'Active';
                }else{
                    return 'Inactive';
                }
            }
            ],
            'created_date',
            ['attribute'=>'type',
            'value'=>function($data){
                if($data['type']==2){
                    return 'Admin';
                }else{
                    return 'Employee';
                }
            }
            ],
            // 'type',
        ],
    ]) ?>

</div>
