<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Process;

/**
 * ProcessSearch represents the model behind the search form about `app\models\Process`.
 */
class ProcessSearch extends Process
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['process_id'], 'integer'],
            [['collecting_id', 'process_date', 'p_status', 'nama_driver'], 'safe'],
            [['berat', 'harga', 'total'], 'number'],
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
        $query = Process::find();

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
            'collecting_id' => $this->collecting_id,
            'process_id' => $this->process_id,
            'berat' => $this->berat,
            'harga' => $this->harga,
            'total' => $this->total,
            'process_date' => $this->process_date,
        ]);

        $query->andFilterWhere(['like', 'collecting_id', $this->collecting_id])
            ->andFilterWhere(['like', 'p_status', $this->p_status])
            ->andFilterWhere(['like', 'nama_driver', $this->nama_driver]);

        return $dataProvider;
    }
}
