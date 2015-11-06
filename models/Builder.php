<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "builder".
 *
 * @property integer $builder_id
 * @property string $builder_name
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
 * @property Job[] $jobs
 * @property SubDivision[] $subDivisions
 */
class Builder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'builder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['builder_name','state_id','city_id'], 'required'],
            [['address'], 'string'],
            [['state_id', 'city_id'], 'integer'],
            [['created_at'], 'safe'],
            [['builder_name', 'mobile', 'alt_mobile', 'email', 'created_by'], 'string', 'max' => 20],
            [['builder_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'builder_id' => 'Builder ID',
            'builder_name' => 'Builder Name',
            'mobile' => 'Mobile',
            'alt_mobile' => 'Alt Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'state_id' => 'State',
            'city_id' => 'City',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
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
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['builder_id' => 'builder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubDivisions()
    {
        return $this->hasMany(SubDivision::className(), ['builder_id' => 'builder_id']);
    }
}
