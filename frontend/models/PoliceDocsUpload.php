<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "police_docs_upload".
 *
 * @property int $id
 * @property string|null $doc_path
 * @property int $police_case_id
 * @property int|null $police_uploads_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property PoliceCases $policeCase
 * @property CourtUploads $policeUploads
 */
class PoliceDocsUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'police_docs_upload';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_path','filename'], 'string'],
            [['police_case_id'], 'required'],
            [['police_case_id', 'police_uploads_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['police_case_id'], 'exist', 'skipOnError' => true, 'targetClass' => PoliceCases::className(), 'targetAttribute' => ['police_case_id' => 'id']],
            [['police_uploads_id'], 'exist', 'skipOnError' => true, 'targetClass' => PoliceUploads::className(), 'targetAttribute' => ['police_uploads_id' => 'id']],
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
            'filename' => 'File Name',
            'police_case_id' => 'Police Case ID',
            'police_uploads_id' => 'Police Uploads ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[PoliceCase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliceCase()
    {
        return $this->hasOne(PoliceCases::className(), ['id' => 'police_case_id']);
    }

    /**
     * Gets query for [[PoliceUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliceUploads()
    {
        return $this->hasOne(PoliceUploads::className(), ['id' => 'police_uploads_id']);
    }
}
