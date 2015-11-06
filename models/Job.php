<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $job_id
 * @property string $job_name
 * @property integer $builder_id
 * @property integer $sub_division_id
 * @property string $lot
 * @property string $status
 * @property string $comments
 * @property string $created_at
 * @property string $created_by
 *
 * @property Builder $builder
 * @property SubDivision $subDivision
 * @property JobCard[] $jobCards
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_name', 'builder_id', 'sub_division_id', 'lot', 'comments'], 'required'],
            [['builder_id', 'sub_division_id'], 'integer'],
            [['comments'], 'string'],
            [['created_at'], 'safe'],
            [['job_name', 'lot', 'status', 'created_by'], 'string', 'max' => 20],
            [['job_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'job_name' => 'Job Name',
            'builder_id' => 'Builder ID',
            'sub_division_id' => 'Sub Division ID',
            'lot' => 'Lot',
            'status' => 'Status',
            'comments' => 'Comments',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilder()
    {
        return $this->hasOne(Builder::className(), ['builder_id' => 'builder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubDivision()
    {
        return $this->hasOne(SubDivision::className(), ['sub_division_id' => 'sub_division_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCards()
    {
        return $this->hasMany(JobCard::className(), ['job_id' => 'job_id']);
    }


    public function getsub_division()
    {
        return $this->hasOne(SubDivision::className(), ['sub_division_id' => 'sub_division_id']);
    }

}
