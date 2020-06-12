<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipment".
 *
 * @property string $shipment_id
 * @property string $shipment_name
 * @property string $shipment_desc
 */
class Shipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipment_id'], 'required'],
            [['shipment_desc'], 'string'],
            [['shipment_id'], 'string', 'max' => 20],
            [['shipment_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shipment_id' => 'Shipment ID',
            'shipment_name' => 'Shipment Name',
            'shipment_desc' => 'Shipment Desc',
        ];
    }

    public function getService()
    {
        return $this->hasMany(RefBookingSvc::className(), ['SHIPMENT_ID' => 'shipment_id']);
    }

}
