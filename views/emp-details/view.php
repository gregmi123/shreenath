<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmpDetails */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Emp Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="emp-details-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12">
        <button class="btn btn-info" onclick="printDiv()">Print</button>
        <div class="col-md-6" id="printable">
            <div class="nepali-card" id="nepali" style="background-image: url('data.png');background-size: cover;background-repeat: no-repeat;width: 428px;height: 274px;position: absolute;top: 1px;font-size: 10px;">
                <img src="<?= $model['photo'] ?>" width="73" height="83" style="margin-left:345px;margin-top: 8px;"/>
                <img src="<?= empty($model['photo']) ? '' : $model['photo'] ?>" width="70" height="70" style="margin-top:-50px;margin-left: 300px;"/>
                <p class="hiramani"><img src="<?= empty($model['photo']) ? '' : $model['photo'] ?>" width="70" height="70" style="margin-top:50px;margin-left: 115px;" id="footer-sign"/></p>

                <div style="margin-left:5px;margin-top: -200px;">

                    <p>

                        <span style="font-size:11px;">प.प.नं. : <strong><?= $model['emp_code'] ?></strong></span><br>
                        <span style="font-size:11px;">नाम थर : <strong><?= $model['name'] ?></strong></span><br>
                        <span style="font-size:11px;">ठेगाना : <strong><?= $province['province_nepali'] ?></strong>&nbsp;&nbsp;जिल्ला : <strong><?= $district['district'] ?></strong>&nbsp;&nbsp;पालिका : <strong><?= $municipal['municipal_nepali'] ?></strong>&nbsp;&nbsp; वडा नं. : <strong><?= $ward['ward']; ?></strong>&nbsp;&nbsp; </span><br>
                        <span style="font-size:11px;"> लिङ्ग : MALE </strong>&nbsp;&nbsp; रक्त समूह: <strong>A+</strong></span><br>
                        <span>Phone : <?=$model['phone']?></span>

                    </p>

                    <div class="kaalin" style="padding:5px 0px;margin-left:0px;font-size:12px;margin-top:-13px;">
                        <div style="width:100%;">
                            <div style="width:30%;float: left;">
                                <p style="">मुकुन्द नाथ योगी</p>
                            </div>
                            <div style="width:20%;float: left;">
                                <p></p>
                            </div>
                            <div style="width:30%;float: left;">
                                <p style="margin-left:10px;">मुकुन्द नाथ योगी</p>
                            </div>
                            <div style="width:20%;float: left;">
                                <p style="margin-left:0px;"><?= date('Y-m-d') ?></p>
                            </div>
                        </div>
                        <div style="width:100%;">
                            <div style="width:25%;float: left;">
                                <p style="margin-top:-25px;">.......................</p>
                            </div>
                            <div style="width:20%;float: left;">
                                <p style="margin-top:-25px;">...................</p>
                            </div>
                            <div style="width:30%;float: left;">
                                <p style="margin-top:-25px;margin-left:25px;">.............................</p>
                            </div>
                            <div style="width:25%;float: left;">
                                <p style="margin-top:-25px;margin-left:20px;">.......................</p>
                            </div>
                        </div>
                        <div style="width:100%;">
                            <div style="width:25%;float: left;">
                                <p style="margin-top:-15px;margin-left:20px;">नाम थर</p>
                            </div>
                            <div style="width:20%;float: left;">
                                <p style="margin-top:-15px;margin-left:15px;">हस्ताक्षर</p>
                            </div>
                            <div style="width:30%;float: left;">
                                <p style="margin-top:-15px; margin-left: 50px;">पद</p>
                            </div>
                            <div style="width:25%;float: left;">
                                <p style="margin-top:-15px;margin-left:25px;">जारी मिति</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv()
    {
        var divToPrint = document.getElementById('printable');

        var newWin = window.open('', 'Print-Window');
        //console.log(id);
        newWin.document.open();

        newWin.document.write('<html><head><style>body{margin:0;padding:0;}input{width: 100%;border: none;background-color: none;margin-left:0px;background-color:transparent;}.col-md-12{width:100%;}.content{margin-top:-15px;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function () {
            newWin.close();
        }, 10);

    }
</script>