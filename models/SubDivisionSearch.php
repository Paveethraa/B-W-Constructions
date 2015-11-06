<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubDivision;

/**
 * SubDivisionSearch represents the model behind the search form about `app\models\SubDivision`.
 */
class SubDivisionSearch extends SubDivision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_division_id', 'builder_id', 'state_id', 'city_id'], 'integer'],
            [['sub_division_name', 'contact_person', 'phone', 'address', 'zip', 'comments', 'created_at', 'created_by'], 'safe'],
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
	$params['SubDivisionSearch'][$var]=$val;
		}
		
		}
	
        $query = SubDivision::find();

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
            'sub_division_id' => $this->sub_division_id,
            'builder_id' => $this->builder_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'sub_division_name', $this->sub_division_name])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
