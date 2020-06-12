<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TarifCargo;

/**
 * TarifCargoSearch represents the model behind the search form about `app\models\TarifCargo`.
 */
class TarifCargoSearch extends TarifCargo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tcargo_id', 'lead_time'], 'integer'],
            [['shipment_id', 'service_id', 'origin', 'origin_name', 'destination', 'destination_name'], 'safe'],
            [['rate', 'rate_cube', 'admin_fee'], 'number'],
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
        $query = TarifCargo::find();

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
            'tcargo_id' => $this->tcargo_id,
            'rate' => $this->rate,
            'rate_cube' => $this->rate_cube,
            'admin_fee' => $this->admin_fee,
            'lead_time' => $this->lead_time,
        ]);

        $query->andFilterWhere(['like', 'shipment_id', $this->shipment_id])
            ->andFilterWhere(['like', 'service_id', $this->service_id])
            ->andFilterWhere(['like', 'origin', $this->origin])
            ->andFilterWhere(['like', 'origin_name', $this->origin_name])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'destination_name', $this->destination_name]);

        return $dataProvider;
    }
}
