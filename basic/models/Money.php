<?php

namespace app\models;

use Yii;
use app\models\Client;
use app\models\Status;
/**
 * This is the model class for table "money".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $price
 * @property integer $status
 * @property string $dateContract
 * @property string $datePay
 */
class Money extends \yii\db\ActiveRecord
{
    public function getClient(){
        return $this->hasOne(Client::className(),['id' => 'client_id']);
    }
    
    public function getStatusTranslate(){
        return $this->hasOne(Status::className(),['id' => 'status']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'price', 'status', 'dateContract'], 'required'],
            [['client_id', 'price', 'status'], 'integer'],
            [['dateContract', 'datePay'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'price' => 'Price',
            'status' => 'Status',
            'dateContract' => 'Date Contract',
            'datePay' => 'Date Pay',
        ];
    }
}
