<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_attachment_lines".
 *
 * @property int $id
 * @property int|null $training_id
 * @property string|null $description
 * @property string|null $filename
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class TrainingAttachmentLines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_attachment_lines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string', 'max' => 250],
            [['filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'training_id' => 'Training ID',
            'description' => 'Description',
            'filename' => 'Filename',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TrainingAttachmentLinesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrainingAttachmentLinesQuery(get_called_class());
    }
}
