<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shipment;

/**
 * ShipmentSearch represents the model behind the search form about `app\models\Shipment`.
 */
class ShipmentSearch extends Shipment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipment_id', 'shipment_name', 'shipment_desc'], 'safe'],
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
        $query = Shipment::find();

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
        $query->andFilterWhere(['like', 'shipment_id', $this->shipment_id])
            ->andFilterWhere(['like', 'shipment_name', $this->shipment_name])
            ->andFilterWhere(['like', 'shipment_desc', $this->shipment_desc]);

        return $dataProvider;
    }
}
