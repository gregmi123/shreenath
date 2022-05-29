<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

Icon::map($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\FollowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Follow Up';
$this->params['breadcrumbs'][] = ['label'=>'Follow Up','url'=>['enquiry/follow']];
$this->params['breadcrumbs'][] = ['label'=>'View'];
?>
<style>
    th,td{
        text-align:center;
    }
    #table-wrapper {
  position:relative;
}
#table-scroll {
  height:515px;
  overflow:auto;  
  /* margin-top:20px; */
}
#table-wrapper table {
  width:100%;

}
/* #table-wrapper table {
  background:skyblue;
  color:black;
  
} */
/* table * {
  background:skyblue;
  color:black;
  
} */
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid red;
}
</style>
<div class="follow-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reamarks',
            'previous_date',
            'updated_date',
            'fk_enquiry',
            //'fk_user',
            //'fk_branch',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->
<div class="row">
<div class="col-sm-5">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="2" style="text-align:center;background-color:skyblue;">Enquiry Details</th>
        </tr>
        </thead>
        <tbody style="background-color:#ededed;">        <tr>
            <td style="font-weight:bold;">
                Name
            </td>
            <td >
                <?= $enquiry['customer_name'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Address
            </td>
            <td>
                <?= $enquiry['address'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Contact No.
            </td>
            <td>
                <?= $enquiry['contact_no'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Email
            </td>
            <td>
                <?= $enquiry['email'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Target Date
            </td>
            <td>
                <?= $enquiry['target_time'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Payment Type
            </td>
            <td>
                <?php if($enquiry['finance_type']==1){ 
                    echo 'Finance';
                }else{
                    echo 'Cash';
                }
                 ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Urgency
            </td>
            <td>
                <?php if($enquiry['urgency']==1){ 
                    echo 'Hot';
                }else if($enquiry['urgency']==2){
                    echo 'Medium';
                }else{
                    echo 'Cold';
                }
                 ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Remarks
            </td>
            <td>
                <?= $enquiry['remarks'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Brand
            </td>
            <td>
                <?= $brand['brand'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Model
            </td>
            <td>
                <?= $model['model'] ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                Color
            </td>
            <td>
                <?= $color['color'] ?>
            </td>
        </tr>
        </tbody>


    </table>
    </div>

    <div class="col-sm-7">
        <?php if($enquiry['status']==0){ ?>
        <?= Html::a('Add Follow Up',['follow/create','e_id'=>$enquiry['id']],['class'=>'btn','id'=>'follow','name'=>'follow','style'=>'background-color:yellow']); ?>
        <?= Html::a('<i class="fa fa-envelope"></i> Mail',['follow/mail','e_id'=>$enquiry['id']],['class'=>'btn btn-danger','id'=>'mail','name'=>'mail']); ?>
        <?= Html::a('<i class="fa fa-phone" aria-hidden="true"></i>Message',['follow/message','e_id'=>$enquiry['id']],['class'=>'btn btn-success','id'=>'message','name'=>'message']); ?>
        <?= Html::a('<i class="fa fa-check" aria-hidden="true"></i>Success',['follow/success','e_id'=>$enquiry['id']],['class'=>'btn btn-primary','id'=>'success','name'=>'success']); ?>
        <hr style="border:1px solid black;border-bottom:0px;">
        <?php } ?>
        <div id="table-wrapper">
        <div id="table-scroll">
        <table class="table table-bordered">
        <thead style="background-color:skyblue;">        
        <tr>
            <th colspan="6" style="text-align:center;">Follow Up Details</th>
        </tr>
        <tr>
            <th style="font-size:12px;">
                Remarks
            </th>
            <th style="font-size:12px;">
                Previous Date
            </th>
            <th style="font-size:12px;">
                Upcoming Date
            </th>
            <th style="font-size:12px;">
                Followed By
            </th>
            <th style="font-size:12px;">
                Branch
            </th>
            <?php if($enquiry['status']==0){?>
            <th style="font-size:12px;">
                Action
            </th>
            <?php } ?>
        </tr>
        </thead>
        <tbody style="background-color:#ededed;">
        <?php  foreach($follow as $fup){ 
            $user=\app\models\Users::findone(['id'=>$fup['fk_user']]);
            $branch=\app\models\Branch::findone(['id'=>$fup['fk_branch']]);  
            ?>
            <tr >
                <td style="width:40%;font-size:12px;">
                    <?= $fup['reamarks'] ?>
                </td>
                <td style="font-size:12px;">
                    <?= $fup['previous_date'] ?>
                </td>
                <td  style="font-size:12px;">
                    <?= $fup['updated_date'] ?>
                </td>
                <td  style="font-size:12px;">
                    <?= $user['username'] ?>
                </td>
                <td  style="font-size:12px;">
                    <?= $branch['tol'] ?>
                </td>
                <?php if($enquiry['status']==0){?>
                    <?php if($fup['status']==1){?>
                <td style="font-size:12px;">
                    <?= Html::a(Icon::show('fa fa-eye'),['follow/view','id'=>$fup['id']]).
                     Html::a(Icon::show('fa fa-pen'),['follow/update','id'=>$fup['id']]); ?>
                </td>
                <?php }else{ ?>
                    <td>
                    </td>
                <?php } } ?>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
