<?php

namespace app\controllers;

use yii;
use app\models\Follow;
use app\models\FollowSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Enquiry;

/**
 * FollowController implements the CRUD actions for Follow model.
 */
class FollowController extends Controller
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
     * Lists all Follow models.
     * @return mixed
     */
    public function actionIndex($e_id)
    {
        $searchModel = new FollowSearch();
        $enquiry=\app\models\Enquiry::findone(['id'=>$e_id]);
        $follow=\app\models\Follow::find()->where(['fk_enquiry'=>$e_id])->orderBy(['id'=>SORT_DESC])->all();
        $brand=\app\models\Brand::findone(['id'=>$enquiry['fk_brand']]);
        $model=\app\models\VehicleModel::findone(['id'=>$enquiry['fk_model']]);
        $color=\app\models\Color::findone(['id'=>$enquiry['fk_color']]);
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['fk_enquiry'=>$e_id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'enquiry'=>$enquiry,
            'brand'=>$brand,
            'model'=>$model,
            'color'=>$color,
            'follow'=>$follow,
        ]);
    }

    /**
     * Displays a single Follow model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Follow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($e_id)
    {
        $model = new Follow();
        $helper=new Helper();
        $enquiry=\app\models\Enquiry::findone(['id'=>$e_id]);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                yii::$app->db->createCommand()
                ->update('follow',['status'=>0])
                ->execute();
                yii::$app->db->createCommand()
                ->update('enquiry',['target_time'=>$model->updated_date],['id'=>$e_id])
                ->execute();
                $model->previous_date=$enquiry['target_time'];
                $model->fk_enquiry=$e_id;
                $model->fk_user=$helper->getUserId();
                $model->fk_organization=$helper->getOrganization();
                $model->fk_branch=$helper->getUserbranch();
                $model->status=1; //Active;
                $model->save();
                return $this->redirect(['follow/index', 'e_id' => $e_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'e_id'=>$e_id,
            'enquiry'=>$enquiry,
        ]);
    }

    /**
     * Updates an existing Follow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())){
            yii::$app->db->createCommand()
                ->update('enquiry',['target_time'=>$model->updated_date],['id'=>$model->fk_enquiry])
                ->execute();
            $model->save();
            return $this->redirect(['follow/index', 'e_id' => $model->fk_enquiry]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionMail($e_id){
        $model=new Follow();
        $enquiry=\app\models\Enquiry::findone(['id'=>$e_id]);
        if ($this->request->isPost && $model->load($this->request->post())){
            // var_dump($model->mail);die;
            Yii::$app->mailer->compose() // a view rendering result becomes the message body here
            ->setFrom('grv.damn123@gmail.com')
            ->setTo($enquiry->email)
            ->setSubject('Shreenath Suppliers')
            ->setTextBody('')
            ->setHtmlBody('<b>'.$model->mail.'</b>')
            ->send();
            return $this->redirect(['follow/index','e_id'=>$e_id]);
        }
        return $this->render('mail',[
            'model'=>$model,
            'e_id'=>$e_id,
        ]);
    }
    public function actionMessage($e_id){
        $model=new Follow();
        $enquiry=\app\models\Enquiry::findone(['id'=>$e_id]);
        if ($this->request->isPost && $model->load($this->request->post())){
            /*  Message Send Section */
              $message = $model->message;

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, 'http://app.easy.com.np/easyApi');
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_POST, 1);
              $data = array(
              'key' => 'EASY5c406d30cb33d0.12577082',
              'source' => 'none', // for default sender ID
              'message' => $message,
              'destination' => $enquiry->contact_no, // Contact with or without country code
              'type' => 1,
              );
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              $contents = curl_exec($ch);
             /* Message Send Section End
             */
            return $this->redirect(['follow/index','e_id'=>$e_id]);
        }
        return $this->render('message',[
            'model'=>$model,
            'e_id'=>$e_id,
        ]);
    }
    public function actionBuy($e_id){
        Yii::$app->db->createCommand()
        ->update('enquiry',['status'=>Enquiry::SUCCESS],['id'=>$e_id])
        ->execute();

        return $this->redirect(['saleform/buyform','e_id'=>$e_id]);
    }
    public function actionCancel($e_id){
        Yii::$app->db->createCommand()
        ->update('enquiry',['status'=>Enquiry::CANCEL],['id'=>$e_id])
        ->execute();

        return $this->redirect(['enquiry/follow']);
    }

    public function actionSuccess($e_id){
        return $this->render('success',[
            'e_id'=>$e_id,
        ]);
    }
    /**
     * Deletes an existing Follow model.
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
     * Finds the Follow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Follow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Follow::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
