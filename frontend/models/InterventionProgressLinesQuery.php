<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InterventionProgressLines]].
 *
 * @see InterventionProgressLines
 */
class InterventionProgressLinesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return InterventionProgressLines[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return InterventionProgressLines|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
