<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TrainingClientNationalityLines]].
 *
 * @see TrainingClientNationalityLines
 */
class TrainingClientNationalityLinesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TrainingClientNationalityLines[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TrainingClientNationalityLines|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
