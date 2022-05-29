<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Saleform */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Saleform', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view','id'=>$model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Finance Details'];
\yii\web\YiiAsset::register($this);
$municipal=\app\models\Municipals::findone(['id'=>$model->t_municipal]);
$ward=\app\models\Ward::findone(['id'=>$model->t_ward]);
$district=\app\models\District::findone(['id'=>$model->t_district]);
$rate=\app\models\Interest::find()->where(['fk_user_id'=>$user_details['id']])->one();

$diff_date=abs(strtotime($model->completion_date)-strtotime($model->jaari_date));
$year=($diff_date/86400)/365;
$month=$year*12;

?>

<div class="saleform-finance">
    <div class="table">
        <tr>
            <td>
                <h2 style="text-align:center;font-weight:bold;">Installment Sheets</h2>
                <div class="row">
                    <div class="col-sm-6" style="border:1px solid black;">
                        <h4 style="text-align:center;font-weight:bold;">Enter Values</h4>
                        <hr style="border:1px solid black;border-bottom:0px;">
                        <div class="col-sm-8">
                        <h6 style="margin-left:40%;">Loan Amount</h6 >
                        <h6 style="margin-left:40%;">Annual Interest Rate</h6>
                        <h6 style="margin-left:40%;">Loan Period Years</h6>
                        <h6 style="margin-left:40%;">Number of Payments per year</h6>
                        <h6 style="margin-left:40%;">Start Date of Loan</h6>
                        <h6 style="margin-left:40%;">Optional Extra Payments</h6>
                        </div>
                      
                        <div class="col-sm-4">
                        <h6><?= $model->due_amt ?></h6>
                        <h6><?= $rate['rate'] ?> %</h6>
                        <h6><?= $year ?></h6>
                        <h6><?= $month ?></h6>
                        <h6><?= $model->jaari_date ?></h6>
                        <h6>..............</h6>
                        </div>
                        <div class="col-sm-8">
                        <h6 style="margin-left:40%;">Customer Name</h6>
                        <h6 style="margin-left:40%;">Father's Name</h6>
                        <h6 style="margin-left:40%;">Citizenship No.</h6>
                        <h6 style="margin-left:40%;">Address</h6>
                        <h6 style="margin-left:40%;">Company</h6>
                        </div>
                        
                        <div class="col-sm-4">
                        <h6><?= $model->name ?></h6>
                        <h6><?= $model->father_name ?></h6>
                        <h6><?= $model->citizenship_number ?></h6>
                        <h6><?= $municipal['municipal_nepali'].' '.$ward['ward'].' '.$district['district_nepali'] ?></h6>
                        <h6>..............</h6>
                        </div>
                    </div>
                    
                    <div class="col-sm-6" style="border:1px solid black;">
                        <h4 style="text-align:center;font-weight:bold;">Loan Summary</h4>
                        <hr style="border:1px solid black;border-bottom:0px;">
                        <div class="col-sm-8">
                        <h6 style="margin-left:40%;">Scheduled Payment</h6 >
                        <h6 style="margin-left:40%;">Scheduled Number of Payments</h6>
                        <h6 style="margin-left:40%;">Actual Number of Payments</h6>
                        <h6 style="margin-left:40%;">Total Early Payments</h6>
                        <h6 style="margin-left:40%;">Total Interest</h6>
                      
                        </div>
                        <div class="col-sm-4">
                        <h6 style=><?= $model->due_amt ?></h6>
                        <h6><?= $model->due_amt ?></h6>
                        <h6><?= $model->due_amt ?></h6>
                        <h6><?= $model->due_amt ?></h6>
                        <h6><?= $model->due_amt ?></h6>
                        <h6><?= $model->due_amt ?></h6>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </div>
</div>