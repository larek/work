<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\Task;
class PlanController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                    'allow' => true,
                    'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }
    
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find()->where('price>0'),
        ]);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }

}
