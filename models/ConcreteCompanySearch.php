<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ConcreteCompany;

/**
 * ConcreteCompanySearch represents the model behind the search form about `app\models\ConcreteCompany`.
 */
class ConcreteCompanySearch extends ConcreteCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['concrete_company_id', 'state_id', 'city_id'], 'integer'],
            [['concrete_company_name', 'contact_person', 'mobile', 'alt_mobile', 'email', 'address', 'created_at', 'created_by'], 'safe'],
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
	$params['ConcreteCompanySearch'][$var]=$val;
		}
		
		}
	
        $query = ConcreteCompany::find();

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
            'concrete_company_id' => $this->concrete_company_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'concrete_company_name', $this->concrete_company_name])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'alt_mobile', $this->alt_mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
