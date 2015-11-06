<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_division".
 *
 * @property integer $sub_division_id
 * @property string $sub_division_name
 * @property integer $builder_id
 * @property string $contact_person
 * @property string $phone
 * @property string $address
 * @property string $zip
 * @property integer $state_id
 * @property integer $city_id
 * @property string $comments
 * @property string $created_at
 * @property string $created_by
 *
 * @property Job[] $jobs
 * @property State $state
 * @property City $city
 * @property Builder $builder
 */
class SubDivision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_division';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_division_name', 'builder_id', 'state_id','city_id'], 'required'],
            [['builder_id', 'state_id', 'city_id'], 'integer'],
            [['address', 'comments'], 'string'],
            [['created_at'], 'safe'],
            [['sub_division_name', 'contact_person', 'phone', 'zip', 'created_by'], 'string', 'max' => 20],
            [['sub_division_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sub_division_id' => 'Sub Division ID',
            'sub_division_name' => 'Sub Division Name',
            'builder_id' => 'Builder',
            'contact_person' => 'Contact Person',
            'phone' => 'Phone',
            'address' => 'Address',
            'zip' => 'Zip',
            'state_id' => 'State ',
            'city_id' => 'City ',
            'comments' => 'Comments',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['sub_division_id' => 'sub_division_id']);
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
    public function getBuilder()
    {
        return $this->hasOne(Builder::className(), ['builder_id' => 'builder_id']);
    }
}
