<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Task;
use app\models\Client;
use app\models\Money;
use app\models\Cost;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','about','contact'],
                'rules' => [
                    [
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

    public function actions()
    {
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

    public function actionIndex()
    {
        $months = [
          'January'=>date('Y')."-01",
          'February'=>date('Y')."-02", 
          'March'=>date('Y')."-03",
          'April'=>date('Y')."-04",
          'May'=>date('Y')."-05",
          'June'=>date('Y')."-06",
          'July'=>date('Y')."-07",
          'August'=>date('Y')."-08",
          'September'=>date('Y')."-09",
          'October'=>date('Y')."-10",
          'November'=>date('Y')."-11",
          'December'=>date('Y')."-12",
        ];
        $moneyPayYear = [];
        $client = Client::find()->count();
        $task = Task::find()->where(['archive'=>'0'])->count();
        
        foreach($months as $key=>$value){
            $moneyPay = Money::find()->andWhere(['status'=>'2'])->andWhere(['like','datePay',$value])->sum('price');
            $cost = Cost::find()->andWhere(['like','date',$value])->sum('money'); 
            $moneyPayYear[$key]['revenue'] = $moneyPay;
            $moneyPayYear[$key]['cost'] = $cost;
        }
        
        $moneyContract = Money::find()->where(['status'=>'1'])->sum('price');
        return $this->render('index',[
            'client' => $client,
            'task' => $task,
            'moneyPayYear' => $moneyPayYear,
            
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
