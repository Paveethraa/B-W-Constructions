<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_card".
 *
 * @property integer $job_card_id
 * @property integer $job_id
 * @property integer $foreman_id
 * @property string $job_card_name
 * @property string $task
 * @property string $date_pour
 * @property string $linear_feet_footing
 * @property string $yards_footing
 * @property string $brick
 * @property string $bulkheads
 * @property string $dowels
 * @property string $pier_pads
 * @property string $firepalace_pads
 * @property string $rebar_rf3
 * @property string $tied_rebar
 * @property string $pumped_by
 * @property string $calcium
 * @property string $plywood_rf3
 * @property string $pockets
 * @property string $created_at
 * @property string $created_by
 * @property string $job_card_status
 * @property string $completed_at
 *
 * @property ConcreteSchedule[] $concreteSchedules
 * @property Job $job
 * @property Foreman $foreman
 */
class JobCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'foreman_id', 'job_card_name', 'task', 'date_pour', 'linear_feet_footing', 'yards_footing', 'brick', 'bulkheads', 'dowels', 'pier_pads', 'firepalace_pads', 'rebar_rf3', 'tied_rebar', 'pumped_by', 'calcium', 'plywood_rf3', 'pockets', 'job_card_status'], 'required'],
            [['job_id', 'foreman_id'], 'integer'],
            [['created_at', 'completed_at'], 'safe'],
            [['job_card_name', 'task', 'date_pour', 'linear_feet_footing', 'yards_footing', 'brick', 'bulkheads', 'dowels', 'pier_pads', 'firepalace_pads', 'rebar_rf3', 'tied_rebar', 'pumped_by', 'calcium', 'plywood_rf3', 'pockets', 'created_by', 'job_card_status'], 'string', 'max' => 20],
            [['job_card_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_card_id' => 'Job Card ID',
            'job_id' => 'Job ID',
            'foreman_id' => 'Foreman ID',
            'job_card_name' => 'Job Card Name',
            'task' => 'Task',
            'date_pour' => 'Date Pour',
            'linear_feet_footing' => 'Linear Feet Footing',
            'yards_footing' => 'Yards Footing',
            'brick' => 'Brick',
            'bulkheads' => 'Bulkheads',
            'dowels' => 'Dowels',
            'pier_pads' => 'Pier Pads',
            'firepalace_pads' => 'Firepalace Pads',
            'rebar_rf3' => 'Rebar RF3',
            'tied_rebar' => 'Tied Rebar',
            'pumped_by' => 'Pumped By',
            'calcium' => 'Calcium',
            'plywood_rf3' => 'Plywood RF3',
            'pockets' => 'Pockets',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'job_card_status' => 'Job Card Status',
            'completed_at' => 'Completed At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcreteSchedules()
    {
        return $this->hasMany(ConcreteSchedule::className(), ['job_card_id' => 'job_card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForeman()
    {
        return $this->hasOne(Foreman::className(), ['foreman_id' => 'foreman_id']);
    }
}
