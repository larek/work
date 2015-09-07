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
        return Cost::find()->where(['category' => $category])->sum('money');
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
