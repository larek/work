<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cost".
 *
 * @property integer $id
 * @property integer $money
 * @property string $category
 * @property string $date
 */
class Cost extends \yii\db\ActiveRecord
{
    public function getSum($category){
       return Cost::find()->andWhere(['category' => $category])->andWhere(['like','date',$this-> month])->sum('money');
    }
    
    protected function getMonth(){
        if(Yii::$app->request->get('month')){
            $month = Yii::$app->request->get('month');
        }
        else{
            $month = date("Y-m");
        }
        
        return $month;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money', 'category', 'date'], 'required'],
            [['money'], 'integer'],
            [['date'], 'safe'],
            [['category'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'money' => 'Money',
            'category' => 'Category',
            'date' => 'Date',
        ];
    }
}
