<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\icons\Icon;

Icon::map($this);

Yii::$app->params['bsDependencyEnabled'] = false;
$ward = ArrayHelper::map(app\models\Ward::find()->where(['fk_user'=>$user_details['id']])->all(), 'id', 'ward');
$province = ArrayHelper::map(\app\models\Province::find()->all(), 'id', 'province_nepali');
$colors = ArrayHelper::map(\app\models\Color::find()->asArray()->all(), 'id', 'color');
$brand = ArrayHelper::map(\app\models\Brand::find()->asArray()->all(), 'id', 'brand');
$brand_enquiry =\app\models\Brand::find()->where(['id'=>$enquiry['fk_brand']])->one();
$colors_enquiry =\app\models\Color::find()->where(['id'=>$enquiry['fk_color']])->one();
$model_enquiry=ArrayHelper::map(\app\models\VehicleModel::find()->where(['id'=>$enquiry['fk_model']])->all(),'id','model');
/* @var $this yii\web\View */
/* @var $model app\models\Saleform */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs($this->render('dynamic.js'),5);

$this->params['breadcrumbs'][] = ['label' => 'Sale Form', 'url' => ['index']];
?>

<div class="saleform-form">

<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="table table-bordered">
        <tr>
        <h5>#Buyer</h5>
            <td>
                <div class="row"  style="padding:0 1em 0 1em;">
                    <div class="col-sm-3">
                    <?=
                        $form->field($model, 'buyer_type')->widget(Select2::className(), [
                            'data' => \app\models\Saleform::getBuyerType(),
                            'options' => ['placeholder' => 'Choose','onchange'=>'Buyer()','id'=>'buyer_type']
                        ])->label('Type');
                        ?>
                    </div>
                </div>
            </td>
        </tr>
        <hr>    
        <tr>
            <h5>#Customer Details</h5>
            <td>
                <div class="row"  style="padding:0 1em 0 1em;">
                    <div class="col-md-3">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true,'value'=>$enquiry['customer_name']]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'mail')->textInput(['maxlength' => true,'value'=>$enquiry['email']]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true,'value'=>$enquiry['contact_no']]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'citizenship_number')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
                        </div>
                </div>
            </td>
        </tr>
        <hr>
        <tr>
            <h5>#Permanent Address</h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;">
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'p_province')->widget(Select2::className(), [
                            'data' => $province,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'province'],
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                            <?=
                            $form->field($model, 'p_district')->widget(DepDrop::className(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'options' => ['id' => 'district'],
                                'pluginOptions' => [
                                    'depends' => ['province'],
                                    //  'initialize' => $model->isNewRecord ? false : true,
                                    'placeholder' => 'छान्नुहोस्',
                                    'url' => Url::to('index.php?r=organizations/district'),
                                ]
                            ])
                            ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'p_municipal')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'farm-municipal'],
                            'pluginOptions' => [
                                'depends' => ['district'],
                                'placeholder' => 'छान्नुहोस्',
                                'url' => Url::to('index.php?r=organizations/municipal'),
                            ]
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'p_ward')->widget(Select2::className(),[
                            'data'=>$ward,
                            'options'=>['placeholder'=>'choose ward','id'=>'ward'],
                        ]) ?>
                        </div>
                    </div>
                </td>
        </tr>
        <hr>
        <tr>
            <h5 style="display:flex;">#Temporary Address<span style="margin-left:1em;"><?= $form->field($model, 'checkbox')->Checkbox(['label'=>'Same as Permanent','onclick'=>'check()','id'=>'checkbox1']) ?></span></h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;" id="temporary">
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 't_province')->widget(Select2::className(), [
                            'data' => $province,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'province1'],
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                            $form->field($model, 't_district')->widget(DepDrop::className(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'options' => ['id' => 'district1'],
                                'pluginOptions' => [
                                    'depends' => ['province1'],
                                    //  'initialize' => $model->isNewRecord ? false : true,
                                    'placeholder' => 'छान्नुहोस्',
                                    'url' => Url::to('index.php?r=organizations/district'),
                                ]
                            ])
                            ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 't_municipal')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'farm-municipal1'],
                            'pluginOptions' => [
                                'depends' => ['district1'],
                                'placeholder' => 'छान्नुहोस्',
                                'url' => Url::to('index.php?r=organizations/municipal'),
                            ]
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 't_ward')->widget(Select2::className(),[
                            'data'=>$ward,
                            'options'=>['placeholder'=>'choose ward'],
                        ]) ?>
                        </div>
                    </div>
                    <div class="row" style="padding:0 1em 0 1em;display:none;" id="temporary1">
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'pro')->textInput(['maxlength'=>true,'id'=>'t_pro','readonly'=>true])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'dis')->textInput(['maxlength'=>true,'id'=>'t_dis','readonly'=>true])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'mun')->textInput(['maxlength'=>true,'id'=>'t_mun','readonly'=>true])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'same_ward')->textInput(['maxlength'=>true,'id'=>'t_ward','readonly'=>true])
                        ?>
                        </div>
                    </div>
                </td>
        </tr>
        <hr>
        <tr>
            <h5>#Payment</h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;">
                    <div class="col-md-3">
                    <?=
                        $form->field($model, 'finance')->widget(Select2::className(), [
                            'data' => \app\models\Enquiry::getFinanceType(),
                            'options' => ['placeholder' => 'Choose','value'=>$enquiry['finance_type']]
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'total_amt')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'paid_amt')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'completion_date', ['inputOptions' => ['id' => 'nepali-datepicker1', 'class' => 'form-control']]); ?>
                        </div>
                    </div>
                </td>
        </tr>
        <hr>
        <tr>
            <h5>#Owner</h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;">
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'brand')->widget(Select2::className(), [
                            'data' => $brand,
                            'options' => ['placeholder' => 'Choose ...', 'id' => 'brand','value'=>$brand_enquiry],
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'model')->widget(DepDrop::className(), [
                            'type' => DepDrop::TYPE_SELECT2,
                            'data'=>$model_enquiry,
                            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                            'options' => ['id' => 'model'],
                            'pluginOptions' => [
                                'depends' => ['brand'],
                                 'initialize' => $model->isNewRecord ? false : true,
                                'url' => Url::to('index.php?r=enquiry/model'),
                            ]
                        ])
                        ?>
                        </div>
                        <div class="col-md-3">
                        <?=
                        $form->field($model, 'color')->widget(\kartik\select2\Select2::className(), [
                            'data' => $colors,
                            'options' => ['placeholder' => 'choose','value'=>$colors_enquiry],
                        ])
                        ?>
                        </div>
                   
                        <div class="col-md-3">
                        <?= $form->field($model, 'displacement')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-3">
                        <?= $form->field($model, 'frame_no')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'engine_no')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                        <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true]) ?>
                        </div>
                   
                        <div class="col-md-3">
                        <?= $form->field($model, 'vehicle_type')->dropDownList(\app\models\Saleform::getVehicleType(),['prompt'=>'Select Type...']) ?>
                        </div>
                        </div>
                </td>
        </tr>
        <hr>
        <tr>
            <h5>#FingerPrint</h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;">
                            <div class="col-md-12">
                                <div id="finger-print">
                                    <div class="col-md-6">
                                        <a id="btnInfo" value="Get Info" class="btn btn-primary btn-100" onclick="return Capture()" >left</a>
                                        <img id="imgFinger" width="100px" height="100px" alt="Finger Image" />
                                        <?= $form->field($model, 'thumbLeft')->hiddenInput(['maxlength' => true, 'id' => 'left-finger-info'])->label(false) ?>

                                        <?= $form->field($model, 'left_iso_template')->hiddenInput(['maxlength' => true, 'id' => 'left-iso-template'])->label(false) ?>
                                        <?= $form->field($model, 'left_ansi_template')->hiddenInput(['maxlength' => true, 'id' => 'left-ansi-template'])->label(false) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <a id="btnInfo" value="Get Info" class="btn btn-primary btn-100" onclick="return CaptureLeft()" >right</a>
                                        <img id="leftFinger" width="100px" height="100px" alt="Finger Image" />
                                        <?= $form->field($model, 'thumbRight')->hiddenInput(['maxlength' => true, 'id' => 'right-finger-info'])->label(false) ?>
                                        <?= $form->field($model, 'right_iso_template')->hiddenInput(['maxlength' => true, 'id' => 'right-iso-template'])->label(false) ?>
                                        <?= $form->field($model, 'right_ansi_template')->hiddenInput(['maxlength' => true, 'id' => 'right-ansi-template'])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </td>
        </tr>
        <hr>
        <tr>
            <h5>#OtherDetails</h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;">
                        <div class="col-md-4">
                        <?= $form->field($model, 'jaari_date', ['inputOptions' => ['id' => 'nepali-datepicker2', 'class' => 'form-control']]); ?>
                        </div>
                       
                    </div>
                </td>
        </tr>
        <hr>
        <tr>
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> #Payment Details</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper2', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items2', // required: css class selector
                'widgetItem' => '.item2', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item2', // css class
                'deleteButton' => '.remove-item2', // css class
                'model' => $modelsAddress[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'title',
                    'amount',
                    'remarks',
                ],
            ]); ?>

            <div class="container-items2"><!-- widgetContainer -->
            <?php foreach ($modelsAddress as $i => $modelAddress): ?>
                <div class="item2 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left"></h3> -->
                        <div class="pull-right" style="margin-left:.5em;">
                            <button type="button" class="add-item2 btn btn-success btn-xs"><i class=""><?= Icon::show('fa fa-plus')?></i></button>
                            <button type="button" class="remove-item2 btn btn-danger btn-xs"><i class=""><?= Icon::show('fa fa-minus')?></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                            }
                        ?>
                        <div class="row" style="padding:0 1em 0 1em;">
                            <div class="col-sm-3">
                                <?= $form->field($modelAddress, "[{$i}]title")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelAddress, "[{$i}]amount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelAddress, "[{$i}]remarks")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
        </tr>
        <hr>
        <tr>
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> #FOC Details</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper1', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items1', // required: css class selector
                'widgetItem' => '.item1', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item1', // css class
                'deleteButton' => '.remove-item1', // css class
                'model' => $modelsAddressFoc[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'product_name',
                    'quantity',
                    'received_date',
                ],
            ]); ?>

            <div class="container-items1"><!-- widgetContainer -->
            <?php foreach ($modelsAddressFoc as $j => $modelAddressf): ?>
                <div class="item1 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left"></h3> -->
                        <div class="pull-right" style="margin-left:.5em;">
                            <button type="button" class="add-item1 btn btn-success btn-xs"><i class=""><?= Icon::show('fa fa-plus')?></i></button>
                            <button type="button" class="remove-item1 btn btn-danger btn-xs"><i class=""><?= Icon::show('fa fa-minus')?></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAddressf->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddressf, "[{$j}]id");
                            }
                        ?>
                        <div class="row" style="padding:0 1em 0 1em;">
                            <div class="col-sm-3">
                                <?= $form->field($modelAddressf, "[{$j}]product_name")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelAddressf, "[{$j}]quantity")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelAddressf, "[{$j}]received_date")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
        </tr>
        <tr>
            <h5>#Predelivery</h5>
                <td>    
                    <div class="row" style="padding:0 1em 0 1em;">
                        <div class="col-md-4">
                        <?= $form->field($model, 'inspection_file')->fileInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </td>
        </tr>
        <hr>
        <tr>
            <td>
                <div class="row" style="padding:0 1em 0 1em;display:none;" id="personal_doc">
                <div class="col-sm-12">
                        <h5>#Company Document</h5>
                        </div>
                   
                    <div class="col-md-4">
                        <?= $form->field($model, 'citizenship_file')->fileInput(['maxlength' => true]) ?>
                        </div>
                </div>
            </td>
        </tr>
        <hr>
        <tr>
        <td>    
            <div class="row" style="padding:0 1em 0 1em;display:none;" id="company_doc">
                <div class="col-sm-12">
                <h5>#Company Document</h5>
                </div>
                <div class="col-md-4">
                <?= $form->field($model, 'Vat_file')->fileInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                <?= $form->field($model, 'owner_citizenship_file')->fileInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'certificate_file')->fileInput(['maxlength' => true]) ?>
                </div>
                
            </div>
        </td>
        </tr>
        <hr>
        <tr>
            <td>
            <h2>
                #Add Location 
            </h2>
             <!-- <input type="text" placeholder="Enter Place Name" id="placeName"/> -->
	        <!-- <button type="button" class="btn btn-primary" id="findLatLngBtnId">Search location</button> -->
            <div class="col-sm-8" style="display:flex;">
            <?= $form->field($model, 'location')->textInput(['maxlength' => true,'id'=>'placeName','style'=>'margin-top:1em;'])->label(false) ?>
            <?= Html::button(Html::img('images/search_icon.png',['width'=>30,'height'=>30]),['class'=>'btn','id'=>'findLatLngBtnId']); ?>
            </div>
            <?= $form->field($model, 'lat')->hiddenInput(['maxlength' => true,'id'=>'lat','value'=>'28.5776'])->label(false) ?>
            <?= $form->field($model, 'lng')->hiddenInput(['maxlength' => true,'id'=>'lng','value'=>'81.6254'])->label(false) ?>
            <div id="map_canvas" style="width: 400px; height: 400px;">
            </div>
            </td>
        </tr>
        <hr>
        <tr>
                <td>    
                    <div class="row" style="padding:0 1em 1em 1em;">
                        <div class="col-sm-12" style="text-align:center;">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success','style'=>'width:100%;']) ?>
                        </div>
                    </div>
                </td>
        </tr>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
            var latitude=document.getElementById('lat').value;
            var longitude=document.getElementById('lng').value;
            var vMarker;
            var marker=[];
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(latitude, longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            $("#findLatLngBtnId").click(function() {
                for (var i = 0, marker; marker = vMarker; i++) {
                    marker.setMap(null);
                }
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    "address" : $("#placeName").val()
                }, function(results, status) {
                    if(status == google.maps.GeocoderStatus.OK) {
                        $("#lat").val(results[0].geometry.location.lat().toFixed(6));
                        $("#lng").val(results[0].geometry.location.lng().toFixed(6));
                        // alert(results[0].geometry.location.lat().toFixed(6));
                        var vMarker = new google.maps.Marker({
                            position: new google.maps.LatLng(results[0].geometry.location.lat().toFixed(6), results[0].geometry.location.lng().toFixed(6)),
                            draggable: true,
                        });
                        google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                            $("#lat").val(evt.latLng.lat().toFixed(6));
                            $("#lng").val(evt.latLng.lng().toFixed(6));
                            map.panTo(evt.latLng);
                        });
                        map.setCenter(vMarker.position);

                        vMarker.setMap(map);

                        
                    } else {
                        alert("Please enter correct place name");
                    }
                });
                return false;
            });
</script>
<script>
    function Buyer(){
        buyer_type=document.getElementById('buyer_type').value;
        if(buyer_type==1){
            $('#company_doc').show();
            $('#personal_doc').hide();
        }else if(buyer_type==2){
            $('#company_doc').hide();
            $('#personal_doc').show();
        }
    }
    function check(){
       check_value=document.getElementById('checkbox1').checked;
       province=document.getElementById('province').value;
       district=document.getElementById('district').value;
       municipal=document.getElementById('farm-municipal').value;
       ward=document.getElementById('ward').value;
       if(check_value==true){
           $('#temporary').hide();
           $('#temporary1').show();
           $.post('index.php?r=saleform/temporary&province='+province+'&district='+district+'&municipal='+municipal+'&ward='+ward,function(data){
              // console.log(data);
               document.getElementById('t_pro').value=data['province'];
               document.getElementById('t_dis').value=data['district'];
               document.getElementById('t_mun').value=data['municipal'];
               document.getElementById('t_ward').value=data['ward'];
           })
       }else if(check_value==false){
        $('#temporary1').hide();
           $('#temporary').show();
       }
    }
</script>
<script>
    var quality = 60; //(1 to 100) (recommanded minimum 55)
    var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

    function GetInfo() {
        document.getElementById('tdSerial').innerHTML = "";
        document.getElementById('tdCertification').innerHTML = "";
        document.getElementById('tdMake').innerHTML = "";
        document.getElementById('tdModel').innerHTML = "";
        document.getElementById('tdWidth').innerHTML = "";
        document.getElementById('tdHeight').innerHTML = "";
        document.getElementById('tdLocalMac').innerHTML = "";
        document.getElementById('tdLocalIP').innerHTML = "";
        document.getElementById('tdSystemID').innerHTML = "";
        document.getElementById('tdPublicIP').innerHTML = "";


        var key = document.getElementById('txtKey').value;

        var res;
        if (key.length == 0) {
            res = GetMFS100Info();
        } else {
            res = GetMFS100KeyInfo(key);
        }

        if (res.httpStaus) {

            document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

            if (res.data.ErrorCode == "0") {
                document.getElementById('tdSerial').innerHTML = res.data.DeviceInfo.SerialNo;
                document.getElementById('tdCertification').innerHTML = res.data.DeviceInfo.Certificate;
                document.getElementById('tdMake').innerHTML = res.data.DeviceInfo.Make;
                document.getElementById('tdModel').innerHTML = res.data.DeviceInfo.Model;
                document.getElementById('tdWidth').innerHTML = res.data.DeviceInfo.Width;
                document.getElementById('tdHeight').innerHTML = res.data.DeviceInfo.Height;
                document.getElementById('tdLocalMac').innerHTML = res.data.DeviceInfo.LocalMac;
                document.getElementById('tdLocalIP').innerHTML = res.data.DeviceInfo.LocalIP;
                document.getElementById('tdSystemID').innerHTML = res.data.DeviceInfo.SystemID;
                document.getElementById('tdPublicIP').innerHTML = res.data.DeviceInfo.PublicIP;
            }
        } else {
            alert(res.err);
        }
        return false;
    }
    function Capture() {
        try {
            //   document.getElementById('txtStatus').value = "";
            document.getElementById('imgFinger').src = "data:image/bmp;base64,";
            document.getElementById('left-finger-info').value = "";
            document.getElementById('left-iso-template').value = "";
            document.getElementById('left-ansi-template').value = "";
//                document.getElementById('txtIsoImage').value = "";
//                document.getElementById('txtRawData').value = "";
//                document.getElementById('txtWsqData').value = "";

            var res = CaptureFinger(quality, timeout);
            if (res.httpStaus) {

                //document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                    // var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
                    document.getElementById('left-finger-info').value = "data:image/bmp;base64," + res.data.BitmapData;
                    document.getElementById('left-iso-template').value = res.data.IsoTemplate;
                    document.getElementById('left-ansi-template').value = res.data.AnsiTemplate;
//                        document.getElementById('txtIsoImage').value = res.data.IsoImage;
//                        document.getElementById('txtRawData').value = res.data.RawData;
//                        document.getElementById('txtWsqData').value = res.data.WsqImage;
                }
            } else {
                alert(res.err);
            }
        } catch (e) {
            alert(e);
        }
        return false;
    }
    function CaptureLeft() {
        try {
            //   document.getElementById('txtStatus').value = "";
            document.getElementById('leftFinger').src = "data:image/bmp;base64,";
            document.getElementById('right-finger-info').value = "";
            document.getElementById('right-iso-template').value = "";
            document.getElementById('right-ansi-template').value = "";
//                document.getElementById('txtIsoImage').value = "";
//                document.getElementById('txtRawData').value = "";
//                document.getElementById('txtWsqData').value = "";

            var res = CaptureFinger(quality, timeout);
            if (res.httpStaus) {

                //document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('leftFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                    // var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
                    document.getElementById('right-finger-info').value = "data:image/bmp;base64," + res.data.BitmapData;
                    document.getElementById('right-iso-template').value = res.data.IsoTemplate;
                    document.getElementById('right-ansi-template').value = res.data.AnsiTemplate;
//                        document.getElementById('txtIsoImage').value = res.data.IsoImage;
//                        document.getElementById('txtRawData').value = res.data.RawData;
//                        document.getElementById('txtWsqData').value = res.data.WsqImage;
                }
            } else {
                alert(res.err);
            }
        } catch (e) {
            alert(e);
        }
        return false;
    }
</script>