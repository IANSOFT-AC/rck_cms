<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[RckRepresentation]].
 *
 * @see RckRepresentation
 */
class RckRepresentationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RckRepresentation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RckRepresentation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
