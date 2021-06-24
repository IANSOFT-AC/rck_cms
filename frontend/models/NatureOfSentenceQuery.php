<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[NatureOfSentence]].
 *
 * @see NatureOfSentence
 */
class NatureOfSentenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NatureOfSentence[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NatureOfSentence|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
