<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "training".
 *
 * @property int $id
 * @property string|null $organizer
 * @property int|null $date
 * @property string|null $topic
 * @property string|null $venue
 * @property string|null $facilitators
 * @property string|null $no_of_participants
 * @property string|null $participants_scan
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property TrainingUpload[] $trainingUploads
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $photos;

    public static function tableName()
    {
        return 'training';
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
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['facilitators', 'no_of_participants','date'], 'string'],
            [['organizer', 'topic', 'venue', 'participants_scan'], 'string', 'max' => 255],
        ];
    }

     public function beforeSave($insert)
    {
        $this->date = strtotime($this->date);
        echo $this->date;
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organizer' => 'Organizer',
            'date' => 'Date',
            'topic' => 'Topic',
            'venue' => 'Venue',
            'facilitators' => 'Facilitators',
            'no_of_participants' => 'No Of Participants',
            'participants_scan' => 'Participants Scan',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TrainingUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingUploads()
    {
        return $this->hasMany(TrainingUpload::className(), ['training_id' => 'id']);
    }
}
