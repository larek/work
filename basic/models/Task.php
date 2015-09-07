<?php

namespace app\models;

use Yii;
use app\models\Client;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $task
 * @property string $price
 * @property string $dateCreated
 * @property integer $archive
 */
class Task extends \yii\db\ActiveRecord
{
    public function getClient(){
        return $this->hasOne(Client::className(),['id' => 'client_id']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'task'], 'required'],
            [['client_id', 'archive', 'price'], 'integer'],
            [['dateCreated'], 'safe'],
            [['task'], 'string']
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
            'task' => 'Task',
            'price' => 'Price',
            'dateCreated' => 'Date Created',
            'archive' => 'Archive',
        ];
    }
}
