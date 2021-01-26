<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PoliceCases;

/**
 * PoliceCasesSearch represents the model behind the search form of `app\models\PoliceCases`.
 */
class PoliceCasesSearch extends PoliceCases
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'police_station_id', 'first_instance_interview', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'gender', 'contacts', 'age', 'investigating_officer', 'investigating_officer_contacts', 'ob_number', 'ob_details', 'offence', 'complainant'], 'safe'],
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
        $query = PoliceCases::find();

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
            'police_station_id' => $this->police_station_id,
            'first_instance_interview' => $this->first_instance_interview,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'investigating_officer', $this->investigating_officer])
            ->andFilterWhere(['like', 'investigating_officer_contacts', $this->investigating_officer_contacts])
            ->andFilterWhere(['like', 'ob_number', $this->ob_number])
            ->andFilterWhere(['like', 'ob_details', $this->ob_details])
            ->andFilterWhere(['like', 'offence', $this->offence])
            ->andFilterWhere(['like', 'complainant', $this->complainant]);

        return $dataProvider;
    }
}
