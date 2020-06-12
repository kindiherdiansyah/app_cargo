<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_kantor".
 *
 * @property integer $id
 * @property string $kantor_id
 * @property string $kantor_nama
 * @property string $kantor_alamat1
 * @property string $kantor_alamat2
 * @property string $kantor_provinsi
 * @property string $kantor_kota
 * @property string $kantor_kodepos
 * @property string $kantor_telp
 * @property string $kantor_fax
 * @property string $kantor_email
 * @property string $kantor_singkatan
 * @property string $kantor_cp
 * @property string $kantor_latitude
 * @property string $kantor_longitude
 * @property string $kantor_tipe
 * @property string $kantor_status
 */
class MaKantor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_kantor';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kantor_id'], 'required'],
            [['kantor_latitude', 'kantor_longitude'], 'number'],
            [['kantor_id', 'kantor_cp', 'kantor_tipe'], 'string', 'max' => 10],
            [['kantor_nama'], 'string', 'max' => 34],
            [['kantor_alamat1', 'kantor_alamat2', 'kantor_singkatan'], 'string', 'max' => 50],
            [['kantor_provinsi', 'kantor_email'], 'string', 'max' => 100],
            [['kantor_kota', 'kantor_telp', 'kantor_fax'], 'string', 'max' => 20],
            [['kantor_kodepos'], 'string', 'max' => 6],
            [['kantor_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kantor_id' => 'Kantor ID',
            'kantor_nama' => 'Kantor Nama',
            'kantor_alamat1' => 'Kantor Alamat1',
            'kantor_alamat2' => 'Kantor Alamat2',
            'kantor_provinsi' => 'Kantor Provinsi',
            'kantor_kota' => 'Kantor Kota',
            'kantor_kodepos' => 'Kantor Kodepos',
            'kantor_telp' => 'Kantor Telp',
            'kantor_fax' => 'Kantor Fax',
            'kantor_email' => 'Kantor Email',
            'kantor_singkatan' => 'Kantor Singkatan',
            'kantor_cp' => 'Kantor Cp',
            'kantor_latitude' => 'Kantor Latitude',
            'kantor_longitude' => 'Kantor Longitude',
            'kantor_tipe' => 'Kantor Tipe',
            'kantor_status' => 'Kantor Status',
        ];
    }

    public function getTrack()
    {
        return $this->hasMany(Process::className(), ['id_office' => 'kantor_id']);
    }
}
