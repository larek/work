<?php

namespace app\models;

use Yii;
use app\models\Task;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $site
 */
class Client extends \yii\db\ActiveRecord
{
    public function getTasksum(){
        return $this->hasMany(Task::className(),['client_id' => 'id'])->count();
    }
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'site'], 'required'],
            [['name', 'image', 'site'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'site' => 'Site',
        ];
    }
}
