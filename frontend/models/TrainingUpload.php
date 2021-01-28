<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_upload".
 *
 * @property int $id
 * @property string|null $doc_path
 * @property string|null $filename
 * @property int $training_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Training $training
 */
class TrainingUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_path'], 'string'],
            [['training_id'], 'required'],
            [['training_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['filename'], 'string', 'max' => 255],
            [['training_id'], 'exist', 'skipOnError' => true, 'targetClass' => Training::className(), 'targetAttribute' => ['training_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_path' => 'Doc Path',
            'filename' => 'Filename',
            'training_id' => 'Training ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Training]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraining()
    {
        return $this->hasOne(Training::className(), ['id' => 'training_id']);
    }
}
