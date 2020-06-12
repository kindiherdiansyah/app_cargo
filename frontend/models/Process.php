<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "process".
 *
 * @property integer $process_id
 * @property string $collecting_id
 * @property double $berat
 * @property double $harga
 * @property double $total
 * @property string $process_date
 * @property string $p_status
 * @property string $nama_driver
 */
class Process extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'process';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collecting_id', 'berat', 'harga', 'total', 'process_date', 'nama_driver'], 'required'],
            [['berat', 'harga', 'total'], 'number'],
            [['process_date'], 'safe'],
            [['collecting_id'], 'string', 'max' => 11],
            [['p_status', 'nama_driver'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'process_id' => 'Process ID',
            'collecting_id' => 'Collecting ID',
            'berat' => 'Berat',
            'harga' => 'Harga',
            'total' => 'Total',
            'process_date' => 'Process Date',
            'p_status' => 'P Status',
            'nama_driver' => 'Nama Driver',
            [['collecting_id'], 'exist', 'skipOnError' => true, 'targetClass' => Collecting::className(), 'targetAttribute' => ['collecting_id' => 'collecting_id']],
            [['collecting_id'], 'exist', 'skipOnError' => true, 'targetClass' => Track::className(), 'targetAttribute' => ['collecting_id' => 'collecting_id']],
        ];
    }

    public function getIdCollecting()
    {
        return $this->hasOne(Collecting::className(), ['collecting_id' => 'collecting_id']);
    }

    public function getIdTrack()
    {
        return $this->hasOne(Track::className(), ['collecting_id' => 'collecting_id']);
    }
}
