<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refugee_docs_upload".
 *
 * @property int $id
 * @property string|null $doc_path
 * @property string|null $filename
 * @property int $model_id
 * @property int|null $upload_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Refugee $model
 * @property RefugeeUploads $upload
 */
class RefugeeDocsUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refugee_docs_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_path'], 'string'],
            [['model_id'], 'required'],
            [['model_id', 'upload_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['filename'], 'string', 'max' => 255],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Refugee::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['upload_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefugeeUploads::className(), 'targetAttribute' => ['upload_id' => 'id']],
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
            'model_id' => 'Model ID',
            'upload_id' => 'Upload ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Refugee::className(), ['id' => 'model_id']);
    }

    /**
     * Gets query for [[Upload]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpload()
    {
        return $this->hasOne(RefugeeUploads::className(), ['id' => 'upload_id']);
    }
}
