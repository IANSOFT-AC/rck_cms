<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TrainingAttachmentLines]].
 *
 * @see TrainingAttachmentLines
 */
class TrainingAttachmentLinesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TrainingAttachmentLines[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TrainingAttachmentLines|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
