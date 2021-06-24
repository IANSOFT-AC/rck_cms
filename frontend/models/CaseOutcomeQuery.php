<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[CaseOutcome]].
 *
 * @see CaseOutcome
 */
class CaseOutcomeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CaseOutcome[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CaseOutcome|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
