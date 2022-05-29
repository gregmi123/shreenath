<?php

namespace app\controllers;

use yii;
use app\models\Enquiry;
use app\models\EnquirySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnquiryController implements the CRUD actions for Enquiry model.
 */
class EnquiryController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
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
     * Lists all Enquiry models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EnquirySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMessage($customer){
        $model = new Enquiry();
        $customer=explode(',',$customer);
        if ($this->request->isPost && $model->load($this->request->post())){
            // var_dump($customer);die;
            foreach($customer as $cus){
                $enquiry=\app\models\Enquiry::findone(['id'=>$cus]);
                $message=str_replace("[{customer_name}]",$enquiry['customer_name'],$model->message);
               

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
                'destination' => $enquiry->contact_no, // Contact with or without country code
                'type' => 1,
                );
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $contents = curl_exec($ch);
                
            }
            return $this->redirect(['enquiry/follow']);

            
        }
        return $this->render('message',[
            'model'=>$model,
            'customer'=>$customer,
        ]);
    }
    public function actionMail($customer){
        $model = new Enquiry();
        $customer=explode(',',$customer);
        if ($this->request->isPost && $model->load($this->request->post())){
            // var_dump($customer);die;
            foreach($customer as $cus){
                $enquiry=\app\models\Enquiry::findone(['id'=>$cus]);
                $message=str_replace("[{customer_name}]",$enquiry['customer_name'],$model->message);
               
                Yii::$app->mailer->compose() // a view rendering result becomes the message body here
                ->setFrom('grv.damn123@gmail.com')
                ->setTo($enquiry->email)
                ->setSubject('Shreenath Suppliers')
                ->setTextBody('')
                ->setHtmlBody('<b>'.$message.'</b>')
                ->send();
                
                
            }
            return $this->redirect(['enquiry/follow']);

            
        }
        return $this->render('mail',[
            'model'=>$model,
            'customer'=>$customer,
        ]);
    }
    public function actionFollow() {
        $searchModel = new EnquirySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('follow', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enquiry model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Enquiry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Enquiry();
        $helper = new Helper();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_date = $helper->actionNepaliDate();
                $model->created_date_en=date('Y-m-d');
                $model->fk_user_id = $helper->getUserId();
                $model->fk_organization_id = $helper->getOrganization();
                $model->fk_branch_id = $helper->getBranch();
                $model->status=Enquiry::RUNNING;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Enquiry model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Enquiry model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionModel() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \app\models\VehicleModel::getModels($cat_id);

                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    /**
     * Finds the Enquiry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Enquiry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Enquiry::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
