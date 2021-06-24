<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[CourtLocation]].
 *
 * @see CourtLocation
 */
class CourtLocationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CourtLocation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CourtLocation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
