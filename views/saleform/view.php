<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Saleform */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Saleforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$p_province=\app\models\Province::findone(['id'=>$model['p_province']]);
$p_district=\app\models\District::findone(['id'=>$model['p_district']]);
$p_municipal=\app\models\Municipals::findone(['id'=>$model['p_municipal']]);
$p_ward=\app\models\Ward::findone(['id'=>$model['p_ward']]);

$t_province=\app\models\Province::findone(['id'=>$model['t_province']]);
$t_district=\app\models\District::findone(['id'=>$model['t_district']]);
$t_municipal=\app\models\Municipals::findone(['id'=>$model['t_municipal']]);
$t_ward=\app\models\Ward::findone(['id'=>$model['t_ward']]);

$company=\app\models\Brand::findone(['id'=>$model['brand']]);
$vehicle_model=\app\models\VehicleModel::findone(['id'=>$model['model']]);
$color=\app\models\Color::findone(['id'=>$model['color']]);

if($model['fk_enquiry']!=null){
$enquiry=\app\models\Enquiry::findone(['id'=>$model['fk_enquiry']]);
}else{
    $enquiry=null;
}
?>
<style>
    #table-wrapper {
  position:relative;
}
#table-scroll {
  overflow:auto;  
  /* margin-top:20px; */
}
#table-wrapper table {
  width:100%;

}
th,td{
    text-align:center;
}
#right {
    width:10%;
    height:10%;
    border: 5px solid black;
    padding: 40px 65px 40px 40px;
    margin-left:22%;
   
}
#left {
    width:10%;
    height:10%;
    border: 5px solid black;
    padding: 40px 65px 40px 40px;
    margin-left:5%;
}
#stamp1{
    width:40%;
    border: 5px solid black;
    padding: 40px 50px 50px;
    margin-left:42%;
}
#stamp2{
    width:40%;
    border: 5px solid black;
    padding: 40px 50px 50px;
    margin-left:46%;
   
}
#thumb_right{
    margin-left:27%;
}
#thumb-left{
    margin-left:5%;
}
#inception_report{
    margin-left:15.7%;
    display:block;
}
#inception_img{
    width:850px;
    height:700px;
    border:1px solid black;
}
#citizen_img,#vat_img,#owner_citizen_img,#certificate_img,#map_canvas{
    width:850px;
    height:700px;
    border:1px solid black;
    margin-top:5%;
}
</style>
<button class="btn btn-success" style="float:right;" onclick="printDoc()">Print</button>
<!-- <h1><= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
   
    <?php if($model->finance==1){?>
 
        <?= Html::a('Finance Details', ['finance', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>
    <?php } ?>
<div  id="printdiv">
<div class="saleform-view">

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'p_province',
            'p_district',
            'p_municipal',
            'p_ward',
            't_province',
            't_district',
            't_municipal',
            't_ward',
            'total_amt',
            'paid_amt',
            'due_amt',
            'completion_date',
            'brand',
            'model',
            'color',
            'displacement',
            'frame_no',
            'engine_no',
            'reg_no',
            'vehicle_type',
            'thumb_left',
            'left_iso_template',
            'left_ansi_template',
            'thumb_right',
            'right_iso_template',
            'right_ansi_template',
            'citizenship_number',
            'jaari_date',
            'mobile_no',
            'inspection_report',
            'citizenship_no',
            'vat_doc',
            'owner_citizenship',
            'certificate',
            'fk_branch',
            'fk_user',
            'fk_organization',
            'status',
            'created_date',
        ],
    ]) ?> -->

    <div class="table">
        <h3 style="text-align:center;">विषय :- <span style="text-decoration:underline;">सवारी साधन खरिद बिक्री सम्झौता पत्र </span></h3>
        <!-- <hr style="border:1px solid black;border-bottom:0px;"> -->
        <br>
        <tr>
            <td>
                <div class="row" style="margin-left:15%;">
                    <div class="col-sm-10">
                        <h6>
                            लिखितम <span style="color:blue;font-weight:bold;"><?=$p_province['province_nepali'] ?></span> प्रदेश <span style="color:blue;font-weight:bold;"><?=$p_district['district_nepali'] ?></span> जिल्ला <span style="color:blue;font-weight:bold;"><?=$p_municipal['municipal_nepali'] ?></span> न.पा/गा.पा. वडा न. <span style="color:blue;font-weight:bold;"><?=$helper->get_nep($p_ward['ward']) ?></span> स्थाई ठेगाना भै हाल 
                            <span style="color:blue;font-weight:bold;"><?=$t_province['province_nepali'] ?></span> प्रदेश <span style="color:blue;font-weight:bold;"><?=$t_district['district_nepali'] ?></span> जिल्ला <span style="color:blue;font-weight:bold;"><?=$p_municipal['municipal_nepali'] ?></span> न.पा/गा.पा. वडा न. <span style="color:blue;font-weight:bold;"><?= $helper->get_nep($t_ward['ward']) ?></span> बस्ने म <span style="color:blue;font-weight:bold;"><?php if($enquiry!=null){echo $enquiry['customer_name'];}else{echo $model['name'];} ?></span> (क्रेता) ले देहायमा उल्लेखित शर्त अनुसार निम्न विवरणको सवारी साधन श्री श्रीनाथ सप्लायर्स (बिक्रेता) बाट खरिद गरी लिन मञ्जुर भै यो सम्झौता पत्रमा सही छाप गरिदिएको छु |  
                        </h6>
                    </div>
                    <div class="col-sm-10">
                        <h6 style="font-weight:bold;text-decoration:underline;">
                            शर्तः
                        </h6>
                    </div>
                    <div class="col-sm-10">
                        <h6>
                            क. क्रेताले सवारीसाधनको पूरा मूल्य रू. <span style="color:blue;font-weight:bold;"><?= $helper->money_format_nep($model['total_amt']) ?></span> (अक्षरूपी <span style="color:blue;font-weight:bold;"><?= $helper->numbersToNepali($model['total_amt']) ?></span>) मध्ये रू. <span style="color:blue;font-weight:bold;"><?= $helper->money_format_nep($model['paid_amt']) ?></span> (अक्षरूपी <span style="color:blue;font-weight:bold;"><?= $helper->numbersToNepali($model['paid_amt']) ?></span>) भुक्तानी गरी खरिद-बिक्री कार्य गरिएकोमा बाँकी रकम रू.
                            <span style="color:blue;font-weight:bold;"><?=$helper->money_format_nep($model['due_amt']) ?></span> (अक्षरूपी <span style="color:blue;font-weight:bold;"><?=$helper->numbersToNepali($model['due_amt']) ?></span>) मिति <span style="color:blue;font-weight:bold;"><?=$helper->get_nep($model['completion_date']) ?></span> सम्ममा नगद वा फाइनान्स प्रकृया मार्फत भुक्तानी गरिसक्नु पर्नेछ । अन्यथा बिक्रेताले बैंक सरह ब्याज लगाउन सक्नेछ वा बिक्रेताले सवारी
                            साधन आफ्नो नियन्त्रणमा लिई अन्यत्र बिक्री वितरण गरी बक्यौता रकम असुल उपर गर्न सक्नेछ ।
                            <br>
                            <br>
                            ख. भुक्तानी पूरा भएपछी मात्र सवारी साधन नामसारी गरिनेछ । 
                            <br>
                            <br>
                            ग. सवारी साधन बिक्री गरिएको मिति देखि उप्रान्त लाग्ने प्रचलित सवारी कर तथा बिमा सम्बन्धी सबै खर्च क्रेता स्वंयले भुक्तानी गर्नुपर्नेछ । 
                            <br>
                            <br>
                            घ. सरवारी साधन बिक्री गरिएको मिति देखि उप्रान्त सवारी साधनबाट कुनै दुर्घटना घट्न गएमा वा सवारी साधन कुनै घटनामा पर्न गएमा वा सवारी साधन कुनै प्रकारको गैरकानुनी कार्यमा संलग्न भएको खण्डमा सोको पूर्ण जिम्मेवार स्वयम क्रेता हुनुपर्नेछ । 
                            <br>
                            <br>
                            ङ. विक्री भएको सवारी साधन कुनैपनी हालतमा फिर्ता तथा परिवर्तन गरिने छैन ।
                            <br>
                            <br>
                            च. अन्य व्यहोरा भए खुलाउने:
                        </h6>
                    </div>
                </div>
            </td>
        </tr>
    </div>

    <div id="table-wrapper" style="margin-left:15%;">
        <div id="table-scroll" class="col-sm-10">
            <br>
            <h5 style="text-align:center;text-decoration:underline;font-weight:bold;">निम्न</h5>
    <table class="table table-bordered">
        <tr>
            <th colspan="2">
                Owner:
            </th>
        </tr>
        <tr>
            <td style="font-size:12px;">
                Company:<span style="color:blue;font-weight:bold;"><?=$company['brand'] ?></span>
            </td>
            <td style="font-size:12px;">
                Frame No:<span style="color:blue;font-weight:bold;"><?=$model['frame_no'] ?></span>
            </td>
        </tr>
        <tr>
            <td style="font-size:12px;">
                Model:<span style="color:blue;font-weight:bold;"><?=$vehicle_model['model'] ?></span>
            </td>
            <td style="font-size:12px;">
                Engine No:<span style="color:blue;font-weight:bold;"><?=$model['engine_no'] ?></span>
            </td>
        </tr>
        <tr>
            <td style="font-size:12px;">
                Color:<span style="color:blue;font-weight:bold;"><?=$color['color'] ?></span>
            </td>
            <td style="font-size:12px;">
                Reg. No:<span style="color:blue;font-weight:bold;"><?=$model['reg_no'] ?></span>
            </td>
        </tr>
        <tr>
            <td style="font-size:12px;">
                Displacement:<span style="color:blue;font-weight:bold;"><?=$model['displacement'] ?></span>
            </td>
            <td style="font-size:12px;">
                Vehicle Type:<span style="color:blue;font-weight:bold;"><?=$model['vehicle_type'] ?></span>
            </td>
        </tr>
    </table>
    </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-8" style="display:flex;">
    
        <?php if($model['thumb_right']){ ?>
            <div id="thumb_right">
           <?= Html::img($model['thumb_right'],['width'=>'100','height'=>'100']) ?>
           </div>
        <?php } else { ?>
            <div id="right">
            दाँया
            </div>
        <?php } ?>
        <?php if($model['thumb_left']){ ?>
            <div id="thumb-left">
           <?= Html::img($model['thumb_left'],['width'=>'100','height'=>'100']) ?>
           </div>
        <?php } else { ?>
            <div id="left">
            दाँया
            </div>
        <?php } ?>
    
        <?php if($model['thumb_left'] && $model['thumb_right']){ ?>
    <div id="stamp2">
        बिक्रेताको छाप
    </div>
    <?php } else{ ?>
        <div id="stamp1" >
        बिक्रेताको छाप
    </div>
    <?php } ?>
    </div>
    </div>
    
    <br>
    <div class="col-sm-12" style="margin-left:20%;">
        <div class="row" style="display:flex;">       
        <div class="col-sm-2">
        <h6>.................................................</h6>
        <h6 style="text-align:center;">क्रेताको हस्ताक्षर</h6>
        </div>
        <div class="col-sm-9" style="text-align:center;" id="bikreta">
            <h6>...........................................</h6>
            <h6 >बिक्रेताको हस्ताक्षर</h6>
        </div>
    </div>
        <div class="col-sm-5">
        <h6>ना. प्र. प. नं.: ......................</h6>
        <h6>कार्यालय / जारी मिति: <span style="color:blue;font-weight:bold;"><?=$model['jaari_date'] ?></span></h6>
        <h6>मो. नं.: <span style="color:blue;font-weight:bold;"><?=$model['mobile_no'] ?></span></h6>
        </div>
        
    </div>
    <br>
    <br>
    <div id="table-wrapper" style="margin-left:15%;">
        <div id="table-scroll" class="col-sm-10">
    <table class="table table-bordered" style="text-align:center;">
        <tr>
            <th colspan="4" style="text-align:center;">
                लागत विवरण
            </th>
        </tr>
        <tr>
            <th>
                सी. न.
            </th>
            <th>
                शिर्षक
            </th>
            <th>
                रकम
            </th>
            <th>
                कैफियत
            </th>
        </tr>
        <?php  
            $payment_details=\app\models\PaymentDetails::find()->where(['fk_sale'=>$model['id']])->all();
            $count=1;
            foreach($payment_details as $pay) {
        ?>
        <tr>
            <td>
                <?= $count++ ?>
            </td>
            <td>
                <?= $pay['title'] ?>
            </td>
            <td>
            <?= $pay['amount'] ?>
            </td>
            <td>
            <?= $pay['remarks'] ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
    </div>
    <br>
    <div id="table-wrapper" style="margin-left:15%;">
        <div id="table-scroll" class="col-sm-10">
    <table class="table table-bordered" style="text-align:center;">
        <tr>
            <th colspan="5" style="text-align:center;">
                FOC DETAIL
            </th>
        </tr>
        <tr>
            <th>
                सी. न.
            </th>
            <th>
                सामानको नाम
            </th>
            <th>
                परिमाण
            </th>
            <th>
                लिएको मिति
            </th>
            <th>
                दस्तखत
            </th>
        </tr>
        <?php  
            $foc_details=\app\models\FocDetail::find()->where(['fk_sale'=>$model['id']])->all();
            $count=1;
            foreach($foc_details as $foc) {
        ?>
        <tr>
            <td>
                <?= $count++ ?>
            </td>
            <td>
                <?= $foc['product_name'] ?>
            </td>
            <td>
            <?= $foc['quantity'] ?>
            </td>
            <td>
            <?= $foc['received_date'] ?>
            </td>
            <td>

            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
    </div>
    <br>
    <div class="row" style="float:left;">
        <div class="col-sm-6" id="inception_report">
            <div class="inception">
        <?= Html::img($model->inspection_report,['id'=>'inception_img']) ?>
            </div>
            <div class="citizen">
        <?php if($model->citizenship_no){ ?>
            </div>
        <?= Html::img($model->citizenship_no,['id'=>'citizen_img']) ?>
       
        <?php } ?>
        <?php if($model->vat_doc){ ?>
       
        <?= Html::img($model->vat_doc,['id'=>'vat_img']) ?>
     
        <?php } ?>
        <?php if($model->owner_citizenship){ ?>
        
        <?= Html::img($model->owner_citizenship,['id'=>'owner_citizen_img']) ?>
   
        <?php } ?>
        <?php if($model->certificate){ ?>
        
        <?= Html::img($model->certificate,['id'=>'certificate_img']) ?>
        
        <?php } ?>
        <div class="map">
    <?php $form= Activeform::begin(); ?>
    <?= $form->field($model, 'latitude')->hiddenInput(['maxlength' => true,'id'=>'latitude','value'=>$model->lat])->label(false) ?>
    <?= $form->field($model, 'longitude')->hiddenInput(['maxlength' => true,'id'=>'longitude','value'=>$model->lng])->label(false) ?>
    
    <div id="map_canvas">
    </div>
    <?php Activeform::end(); ?>
    </div>
    </div>
</div>
            </div>
            <script>
        var latitude=document.getElementById('latitude').value;
        var longitude=document.getElementById('longitude').value;
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(latitude, longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude, longitude),
                draggable: true
            });

            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#lat").val(evt.latLng.lat().toFixed(6));
                $("#lng").val(evt.latLng.lng().toFixed(6));
                console(evt.latlng)
                map.panTo(evt.latLng);
            });

            map.setCenter(vMarker.position);

            vMarker.setMap(map);
</script>
            <script>
    function printDoc()
    {

        var divToPrint = document.getElementById('printdiv');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open()

        newWin.document.write('<html><head><style>#map_canvas{height:700px;width:800px;border:2px solid black;margin-top:35%;}#citizen_img,#vat_img,#owner_citizen_img,#certificate_img,#inception_img{height:1000px;width:800px;border:2px solid black;margin-top:3%;}#inception_report{margin-left:10%;height:700px;}#thumb-left{margin-left:5%;margin-top:4%;}#thumb_right{margin-left:15%;margin-top:4%;}.saleform-view{margin-right:5%;}#bikreta{margin-left:53%;}#right{border: 5px solid black;padding:30px 55px 30px 30px;margin-left:15%;margin-top:2%;}#left{border: 5px solid black;padding: 30px 55px 30px 30px;margin-left:2%;margin-top:2%;}#stamp1{width:10%;border: 5px solid black;padding: 30px 45px 30px 30px;margin-left:25%;margin-top:2%;}#stamp2{width:10%;border: 5px solid black;padding: 30px 45px 30px 30px;margin-left:32.5%;margin-top:2%;}table{ border-collapse: collapse;width: 100%;border: none;background-color: none;margin-left:0px;background-color:transparent;}th,td{border:1px solid black;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function () {
            newWin.close();
        }, 1000);
//         var html="<html><head><style>table{width:100%;text-align:center;background-color:none;margin-left:0px;background-color:transparent;border:1px solid black;}</style></head>";
//    html+= document.getElementById('printdiv').innerHTML;

//    html+="</html>";

//    var printWin = window.open('','','left=0,top=0,width=auto,height=auto,toolbar=0,scrollbars=0,status =0');
//    printWin.document.write(html);
//    printWin.document.close();
//    printWin.print();
//    printWin.close();

    }

</script>