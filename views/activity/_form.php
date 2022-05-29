<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Activity;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
// $message=yii::$app->session->getFlash('message');  

$employee=ArrayHelper::map(\app\models\EmpDetails::find()->where(['fk_branch_id'=>$user_details['fk_branch_id']])->all(),'id','name');
?>

<div class="activity-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_employee')->dropDownList($employee) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropdownList(Activity::getInout(),['prompt'=>'Select Status.....','id'=>'status']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <!-- <php 
        if($message){
           echo '<h4 style="color:red;">'.$message.'</h4>';
        }
        
        ?> -->
    </div>


    <?php ActiveForm::end(); ?>

</div>
    <!-- <script>
    window.onload=function(){
        status=document.getElementById('status').value;
        if(status==1){
            $('.in').show();
            $('.out').hide();
        }
        else if(status==2){
            $('.in').hide();
            $('.out').show();
        }
    }
    function hide(){
        status=document.getElementById('status').value;
        if(status==1){
            $('.in').show();
            $('.out').hide();
        }
        else if(status==2){
            $('.in').hide();
            $('.out').show();
        }
    }


</script> -->
<?php
$js = "$('#nepali-datepicker1').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});$('#nepali-datepicker2').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});";
$this->registerJs($js, 5);
