<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Follow */
$target_date=null;
$follow=\app\models\Follow::find()->where(['fk_enquiry'=>$e_id])->all();
foreach($follow as $fup){
    $target_date=$fup['updated_date'];
}
$this->title = 'Add Follow up for '.$enquiry['customer_name'];
$this->params['breadcrumbs'][] = ['label' => 'Follow Up', 'url' => ['enquiry/follow']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['follow/index','e_id'=>$e_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="follow-create">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>
    <?php if(empty($target_date)){ ?>
    <h5 style="text-align:center;">Target Date: <?= $enquiry['target_time'] ?></h5>
    <?php } else{ ?>
    <h5 style="text-align:center;">Target Date: <?= $target_date ?></h5>
    <?php } ?>
    <?= $this->render('_form', [
        'model' => $model,
        'e_id'=>$e_id,
        'enquiry'=>$enquiry,
    ]) ?>

</div>
