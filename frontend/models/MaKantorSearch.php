<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaKantor;

/**
 * MaKantorSearch represents the model behind the search form about `app\models\MaKantor`.
 */
class MaKantorSearch extends MaKantor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kantor_id', 'kantor_nama', 'kantor_alamat1', 'kantor_alamat2', 'kantor_provinsi', 'kantor_kota', 'kantor_kodepos', 'kantor_telp', 'kantor_fax', 'kantor_email', 'kantor_singkatan', 'kantor_cp', 'kantor_tipe', 'kantor_status'], 'safe'],
            [['kantor_latitude', 'kantor_longitude'], 'number'],
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
        $query = MaKantor::find();

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
            'id' => $this->id,
            'kantor_latitude' => $this->kantor_latitude,
            'kantor_longitude' => $this->kantor_longitude,
        ]);

        $query->andFilterWhere(['like', 'kantor_id', $this->kantor_id])
            ->andFilterWhere(['like', 'kantor_nama', $this->kantor_nama])
            ->andFilterWhere(['like', 'kantor_alamat1', $this->kantor_alamat1])
            ->andFilterWhere(['like', 'kantor_alamat2', $this->kantor_alamat2])
            ->andFilterWhere(['like', 'kantor_provinsi', $this->kantor_provinsi])
            ->andFilterWhere(['like', 'kantor_kota', $this->kantor_kota])
            ->andFilterWhere(['like', 'kantor_kodepos', $this->kantor_kodepos])
            ->andFilterWhere(['like', 'kantor_telp', $this->kantor_telp])
            ->andFilterWhere(['like', 'kantor_fax', $this->kantor_fax])
            ->andFilterWhere(['like', 'kantor_email', $this->kantor_email])
            ->andFilterWhere(['like', 'kantor_singkatan', $this->kantor_singkatan])
            ->andFilterWhere(['like', 'kantor_cp', $this->kantor_cp])
            ->andFilterWhere(['like', 'kantor_tipe', $this->kantor_tipe])
            ->andFilterWhere(['like', 'kantor_status', $this->kantor_status]);

        return $dataProvider;
    }
}
