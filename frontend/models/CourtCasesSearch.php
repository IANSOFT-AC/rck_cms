<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CourtCases;

/**
 * CourtCasesSearch represents the model behind the search form of `app\models\CourtCases`.
 */
class CourtCasesSearch extends CourtCases
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_of_refugees', 'first_instance_interview', 'magistrate_id', 'court_proceeding_id', 'date_of_arrainment', 'next_court_date', 'legal_officer_id', 'counsellor_id', 'court_case_category_id', 'court_case_subcategory_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'offence', 'case_status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CourtCases::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_of_refugees' => $this->no_of_refugees,
            'first_instance_interview' => $this->first_instance_interview,
            'magistrate_id' => $this->magistrate_id,
            'court_proceeding_id' => $this->court_proceeding_id,
            'date_of_arrainment' => $this->date_of_arrainment,
            'next_court_date' => $this->next_court_date,
            'legal_officer_id' => $this->legal_officer_id,
            'counsellor_id' => $this->counsellor_id,
            'court_case_category_id' => $this->court_case_category_id,
            'court_case_subcategory_id' => $this->court_case_subcategory_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'offence', $this->offence])
            ->andFilterWhere(['like', 'case_status', $this->case_status]);

        return $dataProvider;
    }
}
