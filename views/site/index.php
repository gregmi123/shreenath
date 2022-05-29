<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'श्रीनाथ सप्लायर्स';
?>
<style>
 #districts{
    padding:2em;
    width:50%;
    display: inline-block;
    color:blue;
 }
#logo{
    width:80px;
    margin-left:-1em;
    margin-bottom:-6em;
    margin-top:-6em;
    
}
#name{
    font-size:13px;
    text-decoration:none;
    
}

/* .site-index{
    border: 2px solid black;
    border-radius:5px;
    
} */

</style>
<div class="site-index">

    <div class="col-sm-12">
        <div class="col-sm-3" style="border:1px solid black;margin-left:3em;width:22.5%;height:120px;border-radius:4px;background-color:#4CAF4F;color:white;">
            <h3 style="text-align:center"><?= Html::img('images/customer-feedback.png',['width'=>'40px','height'=>'40px']) ?> Customer</h3>
            <div class="count" style="text-align:center">
            <h2 style="overflow-wrap: break-word;font-weight:bold;font-size:30px;"><?= $customer_count ?></h2>
            </div>
        </div>
        <div class="col-sm-3" style="border:1px solid black;margin-left:1em;width:22.5%;height:120px;border-radius:4px;background-color:#FF9800;color:white;">
            <h3 style="text-align:center"><?= Html::img('images/customer-support.png',['width'=>'40px','height'=>'40px']) ?> Enquiry</h3>
            <div class="count" style="text-align:center">
            <h2 style="overflow-wrap: break-word;font-weight:bold;font-size:30px;"><?= $enquiry_count ?></h2>
            </div>
        </div>
        <div class="col-sm-3" style="border:1px solid black;margin-left:1em;width:22.5%;height:120px;border-radius:4px;background-color:#DC3545;color:white;">
            <h3 style="text-align:center"><?= Html::img('images/delete.png',['width'=>'40px','height'=>'40px']) ?>  Cancellation</h3>
            <div class="count" style="text-align:center">
            <h2 style="overflow-wrap: break-word;font-weight:bold;font-size:30px;"><?= $cancel_count ?></h2>
            </div>
        </div>
        <div class="col-sm-3" style="border:1px solid black;width:22.5%;height:120px;margin-left:1em;border-radius:4px;background-color:#17A2B8;color:white;">
            <h3 style="text-align:center"><?= Html::img('images/profile.png',['width'=>'40px','height'=>'40px']) ?> Employee</h3>
            <div class="count" style="text-align:center">
            <h2 style="overflow-wrap: break-word;font-weight:bold;font-size:30px;"><?= $employee_count ?></h2>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <hr style="border:1px solid black;border-bottom:0px;">
    <h2 style="margin-left:2.1em;margin-top:1em;font-weight:bold;color:black;font-size:30px;text-align:center;">Branches</h2>
    
    <?php if($enquiries!=null){ ?>
    <div class="col-sm-12">
    <div id="curve_chart" style="width: 990px; height: 450px;margin-left:4%;margin-top:1em;"></div>
    </div>
    <?php } else{ 
        $logoimg = Html::img('images/showroom.png', ['id'=>'logo','alt'=>'Image']);
        foreach($branch as $value){ 
            ?>
         <div class="col-sm-3" style="text-align:center;color:blue;">
         <?= Html::a($logoimg,['site/district','dis_id'=>$value['id']],['id'=>'districts','class'=>'btn btn-default btn-lg']) ?>
         <br>
         <?= Html::a($value['tol'],['site/district','dis_id'=>$value['id']],['id'=>'name']) ?>
         </div>
     <?php } } ?>
</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?= $enquiries ?>);

        var options = {
          title: 'Enquiry Details',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>