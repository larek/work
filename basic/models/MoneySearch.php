<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Money;

/**
 * MoneySearch represents the model behind the search form about `app\models\Money`.
 */
class MoneySearch extends Money
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'price', 'status'], 'integer'],
            [['dateContract', 'datePay'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Money::find();
        $query->andWhere(['like','datePay',date('Y-m')]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'client_id' => $this->client_id,
            'price' => $this->price,
            'status' => $this->status,
            'dateContract' => $this->dateContract,
            'datePay' => $this->datePay,
        ]);

        return $dataProvider;
    }
}
