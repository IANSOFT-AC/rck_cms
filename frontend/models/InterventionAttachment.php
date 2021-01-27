<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "intervention_attachment".
 *
 * @property int $id
 * @property int|null $intervention_id
 * @property string|null $filename
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $mime
 * @property string|null $doc_path
 * @property int|null $upload_id
 *
 * @property Intervention $intervention
 * @property InterventionUpload $upload
 */
class InterventionAttachment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intervention_attachment';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['intervention_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'upload_id'], 'integer'],
            [['filename'], 'string', 'max' => 150],
            [['mime', 'doc_path'], 'string', 'max' => 255],
            [['intervention_id'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['intervention_id' => 'id']],
            [['upload_id'], 'exist', 'skipOnError' => true, 'targetClass' => InterventionUpload::className(), 'targetAttribute' => ['upload_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'intervention_id' => 'Intervention ID',
            'filename' => 'Filename',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'mime' => 'Mime',
            'doc_path' => 'Doc Path',
            'upload_id' => 'Upload ID',
        ];
    }

    /**
     * Gets query for [[Intervention]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntervention()
    {
        return $this->hasOne(Intervention::className(), ['id' => 'intervention_id']);
    }

    /**
     * Gets query for [[Upload]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpload()
    {
        return $this->hasOne(InterventionUpload::className(), ['id' => 'upload_id']);
    }
}
