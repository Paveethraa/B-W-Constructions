<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "concrete_schedule".
 *
 * @property integer $concrete_schedule_id
 * @property string $concrete_schedule_name
 * @property integer $job_card_id
 * @property integer $concrete_company_id
 * @property string $schedule_date
 * @property integer $yards_ordered
 * @property integer $pump_company_id
 * @property integer $total
 * @property string $comments
 * @property string $created_at
 * @property string $created_by
 * @property string $concrete_schedule_status
 *
 * @property ConcreteCompany $concreteCompany
 * @property PumpCompany $pumpCompany
 * @property JobCard $jobCard
 */
class ConcreteSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concrete_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concrete_schedule_name', 'job_card_id', 'concrete_company_id', 'schedule_date', 'yards_ordered', 'pump_company_id', 'total', 'comments', 'concrete_schedule_status'], 'required'],
            [['job_card_id', 'concrete_company_id', 'yards_ordered', 'pump_company_id', 'total'], 'integer'],
            [['comments'], 'string'],
            [['created_at'], 'safe'],
            [['concrete_schedule_name', 'schedule_date', 'created_by', 'concrete_schedule_status'], 'string', 'max' => 20],
            [['concrete_schedule_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'concrete_schedule_id' => 'Concrete Schedule ID',
            'concrete_schedule_name' => 'Concrete Schedule Name',
            'job_card_id' => 'Job Card code',
            'concrete_company_id' => 'Concrete Company Name',
            'schedule_date' => 'Schedule Date',
            'yards_ordered' => 'Yards Ordered',
            'pump_company_id' => 'Pump Company Name',
            'total' => 'Total',
            'comments' => 'Comments',
            
            'concrete_schedule_status' => 'Concrete Schedule Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getconcrete_company()
    {
        return $this->hasOne(ConcreteCompany::className(), ['concrete_company_id' => 'concrete_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getpump_company()
    {
        return $this->hasOne(PumpCompany::className(), ['pump_company_id' => 'pump_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCard()
    {
     return $this->hasOne(JobCard::className(), ['job_card_id' => 'job_card_id']);
    }
  public function getjob_card()
    {
       return $this->hasOne(JobCard::className(), ['job_card_id' => 'job_card_id']);
    }





}
