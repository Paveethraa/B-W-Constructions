<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $state_id
 * @property string $state_name
 * @property integer $flag
 *
 * @property Builder[] $builders
 * @property City[] $cities
 * @property ConcreteCompany[] $concreteCompanies
 * @property PumpCompany[] $pumpCompanies
 * @property SubDivision[] $subDivisions
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_name'], 'required'],
            [['flag'], 'integer'],
            [['state_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state_name' => 'State Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilders()
    {
        return $this->hasMany(Builder::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcreteCompanies()
    {
        return $this->hasMany(ConcreteCompany::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPumpCompanies()
    {
        return $this->hasMany(PumpCompany::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubDivisions()
    {
        return $this->hasMany(SubDivision::className(), ['state_id' => 'state_id']);
    }
}
