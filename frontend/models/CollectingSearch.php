<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Collecting;

/**
 * CollectingSearch represents the model behind the search form about `app\models\Collecting`.
 */
class CollectingSearch extends Collecting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collecting_id', 'sender_nm', 'sender_addr', 'sender_kota_id', 'sender_kota', 'sender_telp', 'sender_pos', 'receiver_nm', 'receiver_addr', 'receiver_kota', 'receiver_telp', 'receiver_pos', 'services', 'barang', 'harga_barang', 'catatan', 'tarif', 'qr_code', 'booking_date', 'c_status'], 'safe'],
            [['receiver_kota_id', 'services_id'], 'integer'],
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
        $query = Collecting::find();

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
            'receiver_kota_id' => $this->receiver_kota_id,
            'services_id' => $this->services_id,
            'booking_date' => $this->booking_date,
        ]);

        $query->andFilterWhere(['like', 'collecting_id', $this->collecting_id])
            ->andFilterWhere(['like', 'sender_nm', $this->sender_nm])
            ->andFilterWhere(['like', 'sender_addr', $this->sender_addr])
            ->andFilterWhere(['like', 'sender_kota_id', $this->sender_kota_id])
            ->andFilterWhere(['like', 'sender_kota', $this->sender_kota])
            ->andFilterWhere(['like', 'sender_telp', $this->sender_telp])
            ->andFilterWhere(['like', 'sender_pos', $this->sender_pos])
            ->andFilterWhere(['like', 'receiver_nm', $this->receiver_nm])
            ->andFilterWhere(['like', 'receiver_addr', $this->receiver_addr])
            ->andFilterWhere(['like', 'receiver_kota', $this->receiver_kota])
            ->andFilterWhere(['like', 'receiver_telp', $this->receiver_telp])
            ->andFilterWhere(['like', 'receiver_pos', $this->receiver_pos])
            ->andFilterWhere(['like', 'services', $this->services])
            ->andFilterWhere(['like', 'barang', $this->barang])
            ->andFilterWhere(['like', 'harga_barang', $this->harga_barang])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'tarif', $this->tarif])
            ->andFilterWhere(['like', 'qr_code', $this->qr_code])
            ->andFilterWhere(['like', 'c_status', $this->c_status]);

        return $dataProvider;
    }
}
