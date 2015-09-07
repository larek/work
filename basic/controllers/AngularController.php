<?php

namespace app\controllers;

use app\models\Cost;
use yii\helpers\ArrayHelper;
class AngularController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Cost::find()->All();

        $data = ArrayHelper::toArray($model, [
            'app\models\Cost' => [
                'id',
                'money',
                'category',
                'date',
            ],
        ]);
        
        print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

}
