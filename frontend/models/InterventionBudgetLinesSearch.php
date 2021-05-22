<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InterventionBudgetLines;

/**
 * InterventionBudgetLinesSearch represents the model behind the search form of `app\models\InterventionBudgetLines`.
 */
class InterventionBudgetLinesSearch extends InterventionBudgetLines
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'intervention_id', 'year', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['amount'], 'number'],
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
        $query = InterventionBudgetLines::find();

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
            'intervention_id' => $this->intervention_id,
            'year' => $this->year,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}