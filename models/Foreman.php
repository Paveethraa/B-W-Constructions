<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foreman".
 *
 * @property integer $foreman_id
 * @property string $foreman_name
 * @property string $driver
 * @property string $person
 * @property string $mobile
 * @property string $email
 * @property integer $rating
 * @property string $created_at
 * @property string $created_by
 *
 * @property JobCard[] $jobCards
 */
class Foreman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foreman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foreman_name', 'driver', 'person', 'rating', ], 'required'],
            [['rating'], 'integer'],
            [['created_at'], 'safe'],
            [['foreman_name', 'driver', 'person', 'mobile', 'email', 'created_by'], 'string', 'max' => 20],
            [['foreman_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'foreman_id' => 'Foreman ID',
            'foreman_name' => 'Foreman Name',
            'driver' => 'Driver',
            'person' => 'Person',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'rating' => 'Rating',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCards()
    {
        return $this->hasMany(JobCard::className(), ['foreman_id' => 'foreman_id']);
    }
}
