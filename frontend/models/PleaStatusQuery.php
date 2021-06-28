<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[PleaStatus]].
 *
 * @see PleaStatus
 */
class PleaStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PleaStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PleaStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
