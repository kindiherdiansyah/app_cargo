<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefBookingSvc;

/**
 * RefBookingSvcSearch represents the model behind the search form about `app\models\RefBookingSvc`.
 */
class RefBookingSvcSearch extends RefBookingSvc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SERVICE_ID'], 'integer'],
            [['SERVICE', 'SHIPMENT_ID', 'SERVICE_NAME', 'SERVICE_DESC', 'SERVICE_STATUS'], 'safe'],
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
        $query = RefBookingSvc::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'SERVICE_ID' => $this->SERVICE_ID,
        ]);

        $query->andFilterWhere(['like', 'SERVICE', $this->SERVICE])
            ->andFilterWhere(['like', 'SHIPMENT_ID', $this->SHIPMENT_ID])
            ->andFilterWhere(['like', 'SERVICE_NAME', $this->SERVICE_NAME])
            ->andFilterWhere(['like', 'SERVICE_DESC', $this->SERVICE_DESC])
            ->andFilterWhere(['like', 'SERVICE_STATUS', $this->SERVICE_STATUS]);

        return $dataProvider;
    }
}
