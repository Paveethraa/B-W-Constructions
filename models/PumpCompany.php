<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pump_company".
 *
 * @property integer $pump_company_id
 * @property string $pump_company_name
 * @property string $contact_person
 * @property string $mobile
 * @property string $alt_mobile
 * @property string $email
 * @property string $address
 * @property integer $state_id
 * @property integer $city_id
 * @property string $created_at
 * @property string $created_by
 *
 * @property ConcreteSchedule[] $concreteSchedules
 * @property State $state
 * @property City $city
 */
class PumpCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pump_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pump_company_name', 'contact_person', 'mobile', 'alt_mobile', 'email', 'address', 'state_id', 'city_id',], 'required'],
            [['state_id', 'city_id'], 'integer'],
            [['created_at'], 'safe'],
            [['pump_company_name', 'contact_person', 'mobile', 'alt_mobile', 'email', 'address', 'created_by'], 'string', 'max' => 20],
            [['pump_company_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pump_company_id' => 'Pump Company ID',
            'pump_company_name' => 'Pump Company Name',
            'contact_person' => 'Contact Person',
            'mobile' => 'Mobile',
            'alt_mobile' => 'Alt Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'state_id' => 'State ID',
            'city_id' => 'City ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcreteSchedules()
    {
        return $this->hasMany(ConcreteSchedule::className(), ['pump_company_id' => 'pump_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }
}
