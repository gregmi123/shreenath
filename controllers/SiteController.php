<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        $helper=new Helper();
        $user_details=\app\models\Users::findone(['id'=>$helper->getUserId()]);
        if($user_details['type']==3){
        $employee=\app\models\EmpDetails::find()->where(['fK_branch_id'=>$user_details['fk_branch_id']]);
        $employee_count=$employee->count();
        $enquiry=\app\models\Enquiry::find()->where(['fK_branch_id'=>$user_details['fk_branch_id']])->andWhere(['or',['status'=>0,'status'=>1]]);
        $enquiry_count=$enquiry->count();
        $cancel=\app\models\Enquiry::find()->where(['fK_branch_id'=>$user_details['fk_branch_id']])->andWhere(['status'=>2]);
        $cancel_count=$cancel->count();
        $customer=\app\models\Enquiry::find()->where(['fK_branch_id'=>$user_details['fk_branch_id']])->andWhere(['status'=>3]);
        $customer_count=$customer->count();
        
        $bar_array=array();
        $title=array();
        array_push($title,'Date','Enquiries');
        array_push($bar_array,$title);
        // $today_date=$helper->actionNepaliDate();
        // $today_date="2078-01-02";
        // $break_today_date=explode('-',$today_date);
        // if($break_today_date[1]==1){
        //     $previous_month_value=12;
        //     $previous_year_value=$break_today_date[0]-1;
        //     $actual_previous_month=$previous_year_value.'-'.$previous_month_value.'-'.$break_today_date[2];
        // }else{
        // $previous_month_value=$break_today_date[1]-1;
        // if($previous_month_value<10){
        //     $previous_month_value='0'.$previous_month_value;
        // }
        // $actual_previous_month=$break_today_date[0].'-'.$previous_month_value.'-'.$break_today_date[2];
        // }

        // $diff=abs(strtotime($today_date)-strtotime($actual_previous_month));
        // $days=abs($diff/86400);

        // $bar_days=array();
        // $final_array=array();
        // for($i=1;$i<=$days;$i++){
        //     $check_date=$break_today_date[0].'-'.$previous_month_value.'-'.$break_today_date[2];
        // }
        $db = Yii::$app->getDb();

        $sql = 'SELECT DISTINCT (DATE(created_date)) AS unique_date,COUNT(*) as total FROM enquiry
                WHERE created_date_en >= (LAST_DAY(NOW()) + INTERVAL 1 DAY - INTERVAL 1 MONTH)
                AND created_date_en <  (LAST_DAY(NOW()) + INTERVAL 1 DAY) AND enquiry.fk_branch_id = ' .$user_details['fk_branch_id'] . '
                GROUP BY created_date';
                $query = $db->createCommand($sql);
                $result = $query->queryAll();
            // var_dump($result);die;
        foreach($result as $res){
            $new=array();
            array_push($new,$res['unique_date']);
            array_push($new,$res['total']);
            array_push($bar_array,$new);
        }
            // var_dump($bar_array);die;
        $enquiries = json_encode($bar_array,JSON_NUMERIC_CHECK);
            // var_dump($enquiries);die;
        return $this->render('index',[
            'employee_count'=>$employee_count,
            'enquiry_count'=>$enquiry_count,
            'cancel_count'=>$cancel_count,
            'customer_count'=>$customer_count,
            'enquiries'=>$enquiries,
            'user_details'=>$user_details,
        ]);
    }else{
        $employee=\app\models\EmpDetails::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']]);
        $employee_count=$employee->count();
        $enquiry=\app\models\Enquiry::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']])->andWhere(['or',['status'=>0,'status'=>1]]);
        $enquiry_count=$enquiry->count();
        $cancel=\app\models\Enquiry::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']])->andWhere(['status'=>2]);
        $cancel_count=$cancel->count();
        $customer=\app\models\Enquiry::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']])->andWhere(['status'=>3]);
        $customer_count=$customer->count();
        $enquiries=null;
        $branch=\app\models\Branch::find()->where(['fk_organization_id'=>$user_details['fk_organization_id']])->all();
        return $this->render('index',[
            'employee_count'=>$employee_count,
            'enquiry_count'=>$enquiry_count,
            'cancel_count'=>$cancel_count,
            'customer_count'=>$customer_count,
            'enquiries'=>$enquiries,
            'user_details'=>$user_details,
            'branch'=>$branch,
        ]);
    }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

}
