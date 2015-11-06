<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JobCard;

/**
 * JobCardSearch represents the model behind the search form about `app\models\JobCard`.
 */
class JobCardSearch extends JobCard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_card_id', 'job_id', 'foreman_id'], 'integer'],
            [['job_card_name', 'task', 'date_pour', 'linear_feet_footing', 'yards_footing', 'brick', 'bulkheads', 'dowels', 'pier_pads', 'firepalace_pads', 'rebar_rf3', 'tied_rebar', 'pumped_by', 'calcium', 'plywood_rf3', 'pockets', 'created_at', 'created_by', 'job_card_status', 'completed_at'], 'safe'],
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
	$params['JobCardSearch'][$var]=$val;
		}
		
		}
	
        $query = JobCard::find();

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
            'job_card_id' => $this->job_card_id,
            'job_id' => $this->job_id,
            'foreman_id' => $this->foreman_id,
            'created_at' => $this->created_at,
            'completed_at' => $this->completed_at,
        ]);

        $query->andFilterWhere(['like', 'job_card_name', $this->job_card_name])
            ->andFilterWhere(['like', 'task', $this->task])
            ->andFilterWhere(['like', 'date_pour', $this->date_pour])
            ->andFilterWhere(['like', 'linear_feet_footing', $this->linear_feet_footing])
            ->andFilterWhere(['like', 'yards_footing', $this->yards_footing])
            ->andFilterWhere(['like', 'brick', $this->brick])
            ->andFilterWhere(['like', 'bulkheads', $this->bulkheads])
            ->andFilterWhere(['like', 'dowels', $this->dowels])
            ->andFilterWhere(['like', 'pier_pads', $this->pier_pads])
            ->andFilterWhere(['like', 'firepalace_pads', $this->firepalace_pads])
            ->andFilterWhere(['like', 'rebar_rf3', $this->rebar_rf3])
            ->andFilterWhere(['like', 'tied_rebar', $this->tied_rebar])
            ->andFilterWhere(['like', 'pumped_by', $this->pumped_by])
            ->andFilterWhere(['like', 'calcium', $this->calcium])
            ->andFilterWhere(['like', 'plywood_rf3', $this->plywood_rf3])
            ->andFilterWhere(['like', 'pockets', $this->pockets])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'job_card_status', $this->job_card_status]);

        return $dataProvider;
    }
}
