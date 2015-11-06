<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Job;

/**
 * JobSearch represents the model behind the search form about `app\models\Job`.
 */
class JobSearch extends Job
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'builder_id', 'sub_division_id'], 'integer'],
            [['job_name', 'lot', 'status', 'comments', 'created_at', 'created_by'], 'safe'],
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
	$params['JobSearch'][$var]=$val;
		}
		
		}
	
        $query = Job::find();

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
            'job_id' => $this->job_id,
            'builder_id' => $this->builder_id,
            'sub_division_id' => $this->sub_division_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'job_name', $this->job_name])
            ->andFilterWhere(['like', 'lot', $this->lot])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
