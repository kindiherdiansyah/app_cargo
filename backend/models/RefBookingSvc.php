<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_booking_svc".
 *
 * @property integer $SERVICE_ID
 * @property string $SERVICE
 * @property string $SHIPMENT_ID
 * @property string $SERVICE_NAME
 * @property string $SERVICE_DESC
 * @property string $SERVICE_STATUS
 */
class RefBookingSvc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_booking_svc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SERVICE', 'SHIPMENT_ID'], 'string', 'max' => 20],
            [['SERVICE_NAME'], 'string', 'max' => 50],
            [['SERVICE_DESC'], 'string', 'max' => 100],
            [['SERVICE_STATUS'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SERVICE_ID' => 'Service  ID',
            'SERVICE' => 'Service',
            'SHIPMENT_ID' => 'Shipment  ID',
            'SERVICE_NAME' => 'Service  Name',
            'SERVICE_DESC' => 'Service  Desc',
            'SERVICE_STATUS' => 'Service  Status',
        ];
    }
}
