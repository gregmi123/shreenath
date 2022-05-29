<?php

namespace app\controllers;

use Yii;
use app\models\Saleform;
use app\models\SaleformSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\PaymentDetails;
use app\models\FocDetail;
use app\models\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use  yii\web\Response;

/**
 * SaleformController implements the CRUD actions for Saleform model.
 */
class SaleformController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Saleform models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaleformSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionMessage($customer){
        $model = new Saleform();
        $customer=explode(',',$customer);
        if ($this->request->isPost && $model->load($this->request->post())){
            // var_dump($customer);die;
            foreach($customer as $cus){
                $saleform=\app\models\Saleform::findone(['id'=>$cus]);
                $message=str_replace("[{customer_name}]",$saleform['name'],$model->message);
               

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'http://app.easy.com.np/easyApi');
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                $data = array(
                'key' => 'EASY5c406d30cb33d0.12577082',
                'source' => 'none',
                'format'=>'html', // for default sender ID
                'message' => $message,
                'destination' => $saleform->mobile_no, // Contact with or without country code
                'type' => 1,
                );
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $contents = curl_exec($ch);
                
            }
            return $this->redirect(['saleform/index']);

            
        }
        return $this->render('message',[
            'model'=>$model,
            'customer'=>$customer,
        ]);
    }
    public function actionMail($customer){
        $model = new Saleform();
        $customer=explode(',',$customer);
        if ($this->request->isPost && $model->load($this->request->post())){
            // var_dump($customer);die;
            foreach($customer as $cus){
                $saleform=\app\models\Saleform::findone(['id'=>$cus]);
                $message=str_replace("[{customer_name}]",$saleform['name'],$model->message);
               
                Yii::$app->mailer->compose() // a view rendering result becomes the message body here
                ->setFrom('grv.damn123@gmail.com')
                ->setTo($saleform->mail)
                ->setSubject('Shreenath Suppliers')
                ->setTextBody('')
                ->setHtmlBody('<b>'.$message.'</b>')
                ->send();
                
                
            }
            return $this->redirect(['saleform/index']);

            
        }
        return $this->render('mail',[
            'model'=>$model,
            'customer'=>$customer,
        ]);
    }
    /**
     * Displays a single Saleform model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $helper=new Helper();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'helper'=>$helper,
        ]);
    }

    public function actionTemporary($province,$district,$municipal,$ward){
        Yii::$app->response->format = Response::FORMAT_JSON;
      $provinceModel = \app\models\Province::findOne(['id'=>$province]);
      $districtModel = \app\models\District::findOne(['id'=>$district]);
      $municipalModel=\app\models\Municipals::findone(['id'=>$municipal]);
      $wardModel=\app\models\Ward::findone(['id'=>$ward]);
      $returnData = ['province'=>$provinceModel['province_nepali'],'district'=>$districtModel['district_nepali'],'municipal'=>$municipalModel['municipal_nepali'],'ward'=>$wardModel['ward']];
      return $returnData;
    }

    public function actionFinance($id){
        $model=$this->findModel($id);
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        return $this->render('finance',[
            'model'=>$model,
            'user_details'=>$user_details,
        ]);
    }
    /**
     * Creates a new Saleform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Saleform();
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        if ($model->load(Yii::$app->request->post())) {

            // var_dump($model->lat);die;
            // var_dump($model);die;
            $modelsAddress = Model::createMultiple(PaymentDetails::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

            $modelsAddressFoc = Model::createMultiple(FocDetail::classname());
            Model::loadMultiple($modelsAddressFoc, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAddress),
                    ActiveForm::validateMultiple($modelsAddressFoc),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAddress) && Model::validateMultiple($modelsAddressFoc) && $valid;
            // var_dump($valid);die;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if($model->checkbox==1){
                        $model->t_province=$model->p_province;
                        $model->t_district=$model->p_district;
                        $model->t_municipal=$model->p_municipal;
                        $model->t_ward=$model->p_ward;
                    }
                    $tfile = 'images/thumb';
                    define('UPLOAD_DIR', $tfile);
                    // check Image File is Empty form form
                    // var_dump($model->thumbLeft);die;
                    if (!empty($model->thumbLeft)) {

                        $image_parts2 = explode(";base64,", $model->thumbLeft);
                        //var_dump($image_parts2);die;
                        $image_type_aux2 = explode("image/", $image_parts2[0]);
                        $image_type2 = $image_type_aux2[1];
                        $image_base64_2 = base64_decode($image_parts2[1]);
                        $file2 = UPLOAD_DIR . uniqid() . '.png';
                        //var_dump($file2);die;
                        file_put_contents($file2, $image_base64_2);
                        $model->thumb_left = $file2;
                        // var_dump($file2);die;
                    }
                    
                    // insert right thumb
                    //$tfile1 = 'images/' .$user . '/thumb-right';
                    // define('UPLOAD_DIR', $tfile1);
                    // check Image File is Empty form form
                    if (!empty($model->thumbRight)) {

                        $image_parts3 = explode(";base64,", $model->thumbRight);
                        //var_dump($image_parts3);die;
                        $image_type_aux3 = explode("image/", $image_parts3[0]);
                        $image_type3 = $image_type_aux3[1];
                        $image_base64_3 = base64_decode($image_parts3[1]);
                        $file3 = UPLOAD_DIR . uniqid() . '.png';
                        //var_dump($file2);die;
                        file_put_contents($file3, $image_base64_3);
                        $model->thumb_right = $file3;
                        // var_dump($file2);die;
                    }
                    $model->fk_branch=$user_details['fk_branch_id'];
                    $model->fk_user=$user_details['id'];
                    $model->fk_organization=$user_details['fk_organization_id'];
                    $model->status=1; //Active
                    $model->created_date=$helper->actionNepaliDate();
                    $model->fk_enquiry=null;
                    $model->due_amt=$model->total_amt-$model->paid_amt;

                    $model->inspection_file=UploadedFile::getInstance($model,'inspection_file');
                    if(!empty($model->inspection_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->inspection_file->saveAs('images/'.$random.'.'.$model->inspection_file->extension,false);
                        $model->inspection_report='images/'.$random.'.'.$model->inspection_file->extension;
                    }
                    
                    $model->citizenship_file=UploadedFile::getInstance($model,'citizenship_file');
                    if(!empty($model->citizenship_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->citizenship_file->saveAs('images/'.$random.'.'.$model->citizenship_file->extension,false);
                        $model->citizenship_no='images/'.$random.'.'.$model->citizenship_file->extension;
                    }
                    
                    $model->Vat_file=UploadedFile::getInstance($model,'Vat_file');
                    if(!empty($model->Vat_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->Vat_file->saveAs('images/'.$random.'.'.$model->Vat_file->extension,false);
                        $model->vat_doc='images/'.$random.'.'.$model->Vat_file->extension;
                    }
                   
                    $model->owner_citizenship_file=UploadedFile::getInstance($model,'owner_citizenship_file');
                    if(!empty($model->owner_citizenship_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->owner_citizenship_file->saveAs('images/'.$random.'.'.$model->owner_citizenship_file->extension,false);
                        $model->owner_citizenship='images/'.$random.'.'.$model->owner_citizenship_file->extension;
                    }
                    
                    $model->certificate_file=UploadedFile::getInstance($model,'certificate_file');
                    if(!empty($model->certificate_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->certificate_file->saveAs('images/'.$random.'.'.$model->certificate_file->extension,false);
                        $model->certificate='images/'.$random.'.'.$model->certificate_file->extension;
                    }
                    if ($flag = $model->save(false)) {
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->fk_sale = $model->id;
                            // var_dump($model);die;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                            foreach ($modelsAddressFoc as $modelAddressf) {
                                $modelAddressf->fk_sale = $model->id;
                                if (! ($flag = $modelAddressf->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'user_details'=>$user_details,
            'modelsAddress' => (empty($modelsAddress)) ? [new PaymentDetails] : $modelsAddress,
            'modelsAddressFoc' => (empty($modelsAddressFoc)) ? [new FocDetail] : $modelsAddressFoc,
        ]);
    }
    public function actionBuyform($e_id)
    {
        $model = new Saleform();
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        $enquiry=\app\models\Enquiry::findone(['id'=>$e_id]);
        $modelsAddress = [new PaymentDetails];
        $modelsAddressFoc=[new FocDetail];
        if ($model->load(Yii::$app->request->post())) {
            yii::$app->db->createCommand()
            ->update('enquiry',['status'=>3],['id'=>$e_id])
            ->execute();
            // var_dump($model);die;
            $modelsAddress = Model::createMultiple(PaymentDetails::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

            $modelsAddressFoc = Model::createMultiple(FocDetail::classname());
            Model::loadMultiple($modelsAddressFoc, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAddress),
                    ActiveForm::validateMultiple($modelsAddressFoc),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAddress) && Model::validateMultiple($modelsAddressFoc) && $valid;
            // var_dump($valid);die;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if($model->checkbox==1){
                        $model->t_province=$model->p_province;
                        $model->t_district=$model->p_district;
                        $model->t_municipal=$model->p_municipal;
                        $model->t_ward=$model->p_ward;
                    }
                    $tfile = 'images/thumb';
                    define('UPLOAD_DIR', $tfile);
                    // check Image File is Empty form form
                    // var_dump($model->thumbLeft);die;
                    if (!empty($model->thumbLeft)) {

                        $image_parts2 = explode(";base64,", $model->thumbLeft);
                        //var_dump($image_parts2);die;
                        $image_type_aux2 = explode("image/", $image_parts2[0]);
                        $image_type2 = $image_type_aux2[1];
                        $image_base64_2 = base64_decode($image_parts2[1]);
                        $file2 = UPLOAD_DIR . uniqid() . '.png';
                        //var_dump($file2);die;
                        file_put_contents($file2, $image_base64_2);
                        $model->thumb_left = $file2;
                        // var_dump($file2);die;
                    }
                    
                    // insert right thumb
                    //$tfile1 = 'images/' .$user . '/thumb-right';
                    // define('UPLOAD_DIR', $tfile1);
                    // check Image File is Empty form form
                    if (!empty($model->thumbRight)) {

                        $image_parts3 = explode(";base64,", $model->thumbRight);
                        //var_dump($image_parts3);die;
                        $image_type_aux3 = explode("image/", $image_parts3[0]);
                        $image_type3 = $image_type_aux3[1];
                        $image_base64_3 = base64_decode($image_parts3[1]);
                        $file3 = UPLOAD_DIR . uniqid() . '.png';
                        //var_dump($file2);die;
                        file_put_contents($file3, $image_base64_3);
                        $model->thumb_right = $file3;
                        // var_dump($file2);die;
                    }
                    $model->fk_branch=$enquiry['fk_branch_id'];
                    $model->fk_user=$user_details['id'];
                    $model->fk_organization=$user_details['fk_organization_id'];
                    $model->status=1; //Active
                    $model->created_date=$helper->actionNepaliDate();
                    $model->fk_enquiry=$e_id;
                    $model->due_amt=$model->total_amt-$model->paid_amt;

                    $model->inspection_file=UploadedFile::getInstance($model,'inspection_file');
                    if(!empty($model->inspection_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->inspection_file->saveAs('images/'.$random.'.'.$model->inspection_file->extension,false);
                        $model->inspection_report='images/'.$random.'.'.$model->inspection_file->extension;
                    }
                    
                    $model->citizenship_file=UploadedFile::getInstance($model,'citizenship_file');
                    if(!empty($model->citizenship_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->citizenship_file->saveAs('images/'.$random.'.'.$model->citizenship_file->extension,false);
                        $model->citizenship_no='images/'.$random.'.'.$model->citizenship_file->extension;
                    }
                    
                    $model->Vat_file=UploadedFile::getInstance($model,'Vat_file');
                    if(!empty($model->Vat_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->Vat_file->saveAs('images/'.$random.'.'.$model->Vat_file->extension,false);
                        $model->vat_doc='images/'.$random.'.'.$model->Vat_file->extension;
                    }
                   
                    $model->owner_citizenship_file=UploadedFile::getInstance($model,'owner_citizenship_file');
                    if(!empty($model->owner_citizenship_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->owner_citizenship_file->saveAs('images/'.$random.'.'.$model->owner_citizenship_file->extension,false);
                        $model->owner_citizenship='images/'.$random.'.'.$model->owner_citizenship_file->extension;
                    }
                    
                    $model->certificate_file=UploadedFile::getInstance($model,'certificate_file');
                    if(!empty($model->certificate_file)){
                        $random=yii::$app->security->generateRandomString();
                        $model->certificate_file->saveAs('images/'.$random.'.'.$model->certificate_file->extension,false);
                        $model->certificate='images/'.$random.'.'.$model->certificate_file->extension;
                    }
                    if ($flag = $model->save(false)) {
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->fk_sale = $model->id;
                            // var_dump($model);die;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                            foreach ($modelsAddressFoc as $modelAddressf) {
                                $modelAddressf->fk_sale = $model->id;
                                if (! ($flag = $modelAddressf->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('buy_form', [
            'model' => $model,
            'user_details'=>$user_details,
            'enquiry'=>$enquiry,
            'modelsAddress' => (empty($modelsAddress)) ? [new PaymentDetails] : $modelsAddress,
            'modelsAddressFoc' => (empty($modelsAddressFoc)) ? [new FocDetail] : $modelsAddressFoc,
        ]);
    }
    /**
     * Updates an existing Saleform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        $modelsAddress = \app\models\PaymentDetails::find()->where(['fk_sale'=>$model->id])->all();
        $modelsAddressFoc=\app\models\FocDetail::find()->where(['fk_sale'=>$model->id])->all();
        // $enquiry=\app\models\Enquiry::findone(['id'=>$e_id]);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $oldIDs = ArrayHelper::map($modelsAddress, 'id', 'id');
            $modelsAddress = Model::createMultiple(PaymentDetails::classname(), $modelsAddress);
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, 'id', 'id')));

            $oldIDsfoc = ArrayHelper::map($modelsAddressFoc, 'id', 'id');
            $modelsAddressFoc = Model::createMultiple(PaymentDetails::classname(), $modelsAddressFoc);
            Model::loadMultiple($modelsAddressFoc, Yii::$app->request->post());
            $deletedIDsfoc = array_diff($oldIDsfoc, array_filter(ArrayHelper::map($modelsAddressFoc, 'id', 'id')));

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsAddress),
                    ActiveForm::validateMultiple($modelsAddressFoc),
                    ActiveForm::validate($model)
                );
            }
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid && Model::validateMultiple($modelsAddressFoc);

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            PaymentDetails::deleteAll(['id' => $deletedIDs]);
                        }
                        if (! empty($deletedIDs)) {
                            PaymentDetails::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->fk_sale = $model->id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'user_details'=>$user_details,
            'modelsAddress' => (empty($modelsAddress)) ? [new PaymentDetails()] : $modelsAddress,
            'modelsAddressFoc' => (empty($modelsAddressFoc)) ? [new FocDetail()] : $modelsAddressFoc,
        ]);
    }

    /**
     * Deletes an existing Saleform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Saleform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Saleform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Saleform::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
