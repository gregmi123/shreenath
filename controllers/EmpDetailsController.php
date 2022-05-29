<?php

namespace app\controllers;

use app\models\EmpDetails;
use app\models\EmpDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpDetailsController implements the CRUD actions for EmpDetails model.
 */
class EmpDetailsController extends Controller {

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
     * Lists all EmpDetails models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EmpDetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpDetails model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $province = \app\models\Province::findOne(['id' => $model->fk_province]);
        $district = \app\models\District::findOne(['id' => $model->fk_district]);
        $municipal = \app\models\Municipals::findOne(['id' => $model->fk_municipal]);
        $ward = \app\models\Ward::findOne(['id' => $model->fk_ward]);
        $organization = \app\models\Organizations::findOne(['id' => $model->fk_organization_id]);
        $branch = \app\models\Branch::findOne(['id' => $model->fk_branch_id]);
        return $this->render('view', [
                    'model' => $model,
                    'province' => $province,
                    'district' => $district,
                    'municipal' => $municipal,
                    'ward' => $ward,
                    'organization' => $organization,
                    'branch' => $branch,
        ]);
    }

    /**
     * Creates a new EmpDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new EmpDetails();
        $helper = new Helper();
        $user_id=$helper->getUserId();
        $user_details=\app\models\Users::findone(['id'=>$user_id]);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
                if (empty($model->image)) {

                    \Yii::$app->session->setFlash('message', 'Image Can not be blank');
                    return $this->render('create', [
                                'model' => $model,
                                'user_details'=>$user_details,
                    ]);
                }
                $path = 'images/' . uniqid() . '.' . $model->image->extension;
                $model->image->saveAs($path, false);
                $model->photo = $path;

                if (!empty($model->contract)) {
                    $model->image = \yii\web\UploadedFile::getInstance($model, 'contract');
                    $path = 'images/' . uniqid() . '.' . $model->contract->extension;
                    $model->contract->saveAs($path, false);
                    $model->contract_letter = $path;
                }
                $model->fk_branch_id = $helper->getBranch();
                $model->fk_organization_id = $helper->getOrganization();
                $model->created_date = date('Y-m-d');
                $model->fk_user_id = $helper->getUserId();
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    var_dump($model->errors);
                    die;
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
                    'user_details'=>$user_details,
        ]);
    }

    /**
     * Updates an existing EmpDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            if (!empty($model->image)) {
                $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
                $path = 'images/' . uniqid() . '.' . $model->image->extension;
                $model->image->saveAs($path, false);
                $model->photo = $path;
            }
            if (!empty($model->contract)) {
                $model->image = \yii\web\UploadedFile::getInstance($model, 'contract');
                $path = 'images/' . uniqid() . '.' . $model->contract->extension;
                $model->contract->saveAs($path, false);
                $model->contract_letter = $path;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EmpDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmpDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return EmpDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = EmpDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
