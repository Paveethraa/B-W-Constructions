<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Foreman;

/**
 * ForemanSearch represents the model behind the search form about `app\models\Foreman`.
 */
class ForemanSearch extends Foreman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foreman_id', 'rating'], 'integer'],
            [['foreman_name', 'driver', 'person', 'mobile', 'email', 'created_at', 'created_by'], 'safe'],
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
	$params['ForemanSearch'][$var]=$val;
		}
		
		}
	
        $query = Foreman::find();

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
            'foreman_id' => $this->foreman_id,
            'rating' => $this->rating,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'foreman_name', $this->foreman_name])
            ->andFilterWhere(['like', 'driver', $this->driver])
            ->andFilterWhere(['like', 'person', $this->person])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
