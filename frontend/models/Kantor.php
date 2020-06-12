<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kantor".
 *
 * @property integer $location_id
 * @property string $nama
 * @property string $telp
 * @property string $address
 * @property string $lat
 * @property string $lng
 */
class Kantor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kantor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'address', 'lat', 'lng'], 'required'],
            [['nama'], 'string', 'max' => 200],
            [['telp'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 500],
            [['lat', 'lng'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'nama' => 'Nama',
            'telp' => 'Telp',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }
}
