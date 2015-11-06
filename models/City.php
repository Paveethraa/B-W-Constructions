<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property integer $state_id
 * @property string $city_name
 * @property integer $flag
 *
 * @property Builder[] $builders
 * @property State $state
 * @property ConcreteCompany[] $concreteCompanies
 * @property PumpCompany[] $pumpCompanies
 * @property SubDivision[] $subDivisions
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'city_name', 'flag'], 'required'],
            [['state_id', 'flag'], 'integer'],
            [['city_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'state_id' => 'State ID',
            'city_name' => 'City Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilders()
    {
        return $this->hasMany(Builder::className(), ['city_id' => 'city_id']);
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
    public function getConcreteCompanies()
    {
        return $this->hasMany(ConcreteCompany::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPumpCompanies()
    {
        return $this->hasMany(PumpCompany::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubDivisions()
    {
        return $this->hasMany(SubDivision::className(), ['city_id' => 'city_id']);
    }
}
