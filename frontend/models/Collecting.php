<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "collecting".
 *
 * @property string $collecting_id
 * @property string $sender_nm
 * @property string $sender_addr
 * @property string $sender_kota_id
 * @property string $sender_kota
 * @property string $sender_telp
 * @property string $sender_pos
 * @property string $receiver_nm
 * @property string $receiver_addr
 * @property integer $receiver_kota_id
 * @property string $receiver_kota
 * @property string $receiver_telp
 * @property string $receiver_pos
 * @property integer $services_id
 * @property string $services
 * @property string $barang
 * @property string $harga_barang
 * @property string $catatan
 * @property string $tarif
 * @property string $qr_code
 * @property string $booking_date
 * @property string $c_status
 */
class Collecting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collecting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collecting_id', 'sender_nm', 'sender_addr', 'sender_kota_id', 'sender_kota', 'sender_telp', 'sender_pos', 'receiver_nm', 'receiver_addr', 'receiver_kota_id', 'receiver_kota', 'receiver_telp', 'receiver_pos', 'services_id', 'services', 'barang', 'tarif', 'qr_code', 'booking_date', 'c_status'], 'required'],
            [['receiver_kota_id', 'services_id'], 'integer'],
            [['booking_date'], 'safe'],
            [['collecting_id'], 'string', 'max' => 11],
            [['sender_nm', 'sender_kota_id', 'sender_kota', 'sender_pos', 'receiver_nm', 'receiver_kota', 'receiver_pos', 'services', 'barang', 'harga_barang', 'qr_code', 'c_status'], 'string', 'max' => 50],
            [['sender_addr', 'receiver_addr', 'catatan'], 'string', 'max' => 100],
            [['sender_telp', 'receiver_telp'], 'string', 'max' => 15],
            [['tarif'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'collecting_id' => 'Collecting ID',
            'sender_nm' => 'Sender Nm',
            'sender_addr' => 'Sender Addr',
            'sender_kota_id' => 'Sender Kota ID',
            'sender_kota' => 'Sender Kota',
            'sender_telp' => 'Sender Telp',
            'sender_pos' => 'Sender Pos',
            'receiver_nm' => 'Receiver Nm',
            'receiver_addr' => 'Receiver Addr',
            'receiver_kota_id' => 'Receiver Kota ID',
            'receiver_kota' => 'Receiver Kota',
            'receiver_telp' => 'Receiver Telp',
            'receiver_pos' => 'Receiver Pos',
            'services_id' => 'Services ID',
            'services' => 'Services',
            'barang' => 'Barang',
            'harga_barang' => 'Harga Barang',
            'catatan' => 'Catatan',
            'tarif' => 'Tarif',
            'qr_code' => 'Qr Code',
            'booking_date' => 'Booking Date',
            'c_status' => 'C Status',
        ];
    }

    public function getProcess()
    {
        return $this->hasMany(Process::className(), ['collecting_id' => 'collecting_id']);
    }
}
