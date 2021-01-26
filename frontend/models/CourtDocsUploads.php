<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "court_docs_uploads".
 *
 * @property int $id
 * @property string|null $doc_path
 * @property int $court_case_id
 * @property int|null $court_uploads_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CourtCases $courtCase
 * @property CourtUploads $courtUploads
 */
class CourtDocsUploads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'court_docs_uploads';
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
            [['doc_path'], 'string'],
            [['court_case_id'], 'required'],
            [['court_case_id', 'court_uploads_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['court_case_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourtCases::className(), 'targetAttribute' => ['court_case_id' => 'id']],
            [['court_uploads_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourtUploads::className(), 'targetAttribute' => ['court_uploads_id' => 'id']],
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
            'court_case_id' => 'Court Case ID',
            'court_uploads_id' => 'Court Uploads ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CourtCase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtCase()
    {
        return $this->hasOne(CourtCases::className(), ['id' => 'court_case_id']);
    }

    /**
     * Gets query for [[CourtUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtUploads()
    {
        return $this->hasOne(CourtUploads::className(), ['id' => 'court_uploads_id']);
    }
}
