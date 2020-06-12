<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarif_cargo".
 *
 * @property integer $tcargo_id
 * @property string $shipment_id
 * @property string $service_id
 * @property string $origin
 * @property string $origin_name
 * @property string $destination
 * @property string $destination_name
 * @property double $rate
 * @property double $rate_cube
 * @property double $admin_fee
 * @property integer $lead_time
 */
class TarifCargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarif_cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipment_id'], 'required'],
            [['rate', 'rate_cube', 'admin_fee'], 'number'],
            [['lead_time'], 'integer'],
            [['shipment_id', 'service_id'], 'string', 'max' => 20],
            [['origin', 'destination'], 'string', 'max' => 6],
            [['origin_name'], 'string', 'max' => 100],
            [['destination_name'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tcargo_id' => 'Tcargo ID',
            'shipment_id' => 'Shipment ID',
            'service_id' => 'Service ID',
            'origin' => 'Origin',
            'origin_name' => 'Origin Name',
            'destination' => 'Destination',
            'destination_name' => 'Destination Name',
            'rate' => 'Rate',
            'rate_cube' => 'Rate Cube',
            'admin_fee' => 'Admin Fee',
            'lead_time' => 'Lead Time',
        ];
    }
}
