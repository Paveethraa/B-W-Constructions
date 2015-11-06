<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "concrete_company".
 *
 * @property integer $concrete_company_id
 * @property string $concrete_company_name
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
 * @property State $state
 * @property City $city
 * @property ConcreteSchedule[] $concreteSchedules
 */
class ConcreteCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concrete_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concrete_company_name'], 'required'],
            [['address'], 'string'],
            [['state_id', 'city_id'], 'integer'],
            [['created_at'], 'safe'],
            [['concrete_company_name', 'contact_person', 'mobile', 'alt_mobile', 'email', 'created_by'], 'string', 'max' => 20],
            [['concrete_company_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'concrete_company_id' => 'Concrete Company ID',
            'concrete_company_name' => 'Concrete Company Name',
            'contact_person' => 'Contact Person',
            'mobile' => 'Mobile',
            'alt_mobile' => 'Alt Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'state_id' => 'State ID',
            'city_id' => 'City ID',
         
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcreteSchedules()
    {
        return $this->hasMany(ConcreteSchedule::className(), ['concrete_company_id' => 'concrete_company_id']);
    }
}
