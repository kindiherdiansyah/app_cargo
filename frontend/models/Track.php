<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "track".
 *
 * @property integer $track_id
 * @property string $collecting_id
 * @property string $tanggal
 * @property string $status
 * @property string $id_office
 * @property string $id_user
 */
class Track extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'track';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collecting_id', 'tanggal', 'status', 'id_user'], 'required'],
            [['tanggal'], 'safe'],
            [['collecting_id'], 'string', 'max' => 13],
            [['status'], 'string', 'max' => 50],
            [['id_office'], 'string', 'max' => 15],
            [['id_user'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'track_id' => 'Track ID',
            'collecting_id' => 'Collecting ID',
            'tanggal' => 'Tanggal',
            'status' => 'Status',
            'id_office' => 'Id Office',
            'id_user' => 'Id User',
        ];
    }

    public function getIdMaKantor()
    {
        return $this->hasOne(MaKantor::className(), ['kantor_id' => 'id_office']);
    }
}
