<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ConcreteSchedule;

/**
 * ConcreteScheduleSearch represents the model behind the search form about `app\models\ConcreteSchedule`.
 */
class ConcreteScheduleSearch extends ConcreteSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concrete_schedule_id', 'job_card_id', 'concrete_company_id', 'yards_ordered', 'pump_company_id', 'total'], 'integer'],
            [['concrete_schedule_name', 'schedule_date', 'comments', 'created_at', 'created_by', 'concrete_schedule_status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
	foreach($params as $var=>$val)
	{
	
	if(stristr($var,"date")){
	$params['ConcreteScheduleSearch'][$var]=$val;
		}
		
		}
	
        $query = ConcreteSchedule::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'concrete_schedule_id' => $this->concrete_schedule_id,
            'job_card_id' => $this->job_card_id,
            'concrete_company_id' => $this->concrete_company_id,
            'yards_ordered' => $this->yards_ordered,
            'pump_company_id' => $this->pump_company_id,
            'total' => $this->total,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'concrete_schedule_name', $this->concrete_schedule_name])
            ->andFilterWhere(['like', 'schedule_date', $this->schedule_date])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'concrete_schedule_status', $this->concrete_schedule_status]);

        return $dataProvider;
    }
}
