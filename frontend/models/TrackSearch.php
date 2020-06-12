<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Track;

/**
 * TrackSearch represents the model behind the search form about `app\models\Track`.
 */
class TrackSearch extends Track
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['track_id'], 'integer'],
            [['collecting_id', 'tanggal', 'status', 'id_office', 'id_user'], 'safe'],
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
        $query = Track::find();

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
            'track_id' => $this->track_id,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'collecting_id', $this->collecting_id])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'id_office', $this->id_office])
            ->andFilterWhere(['like', 'id_user', $this->id_user]);

        return $dataProvider;
    }
}
