<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "court_uploads".
 *
 * @property int $id
 * @property string $name
 * @property string|null $desc
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CourtDocsUploads[] $courtDocsUploads
 * @property PoliceDocsUpload[] $policeDocsUploads
 */
class CourtUploads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'court_uploads';
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
            [['name'], 'required'],
            [['desc'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'desc' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CourtDocsUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtDocsUploads()
    {
        return $this->hasMany(CourtDocsUploads::className(), ['court_uploads_id' => 'id']);
    }

    /**
     * Gets query for [[PoliceDocsUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliceDocsUploads()
    {
        return $this->hasMany(PoliceDocsUpload::className(), ['police_uploads_id' => 'id']);
    }
}
