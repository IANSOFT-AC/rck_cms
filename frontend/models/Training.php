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
            [['no_of_participants','topic', 'venue','date'],'required'],
            [['organizer_id','type','donor_id','created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['facilitators', 'no_of_participants','date','0-9','10-19','20-24','25-59','60+','boys','girls','men','women'], 'string'],
            [['organizer', 'topic', 'venue', 'participants_scan'], 'string', 'max' => 255],
            [['organizer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizer::className(), 'targetAttribute' => ['organizer_id' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingType::className(), 'targetAttribute' => ['type' => 'id']],
            [['donor_id'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingType::className(), 'targetAttribute' => ['donor_id' => 'id']],
        ];
    }

     public function beforeSave($insert)
    {
        $this->date = strtotime($this->date);
        //echo $this->date;
        return parent::beforeSave($insert);
    }

    //Other fields for updating
    public function beforeValidate(){
        if (parent::beforeValidate()) {
            //Nullify the values if the value is other for the following fields
            $this->organizer_id = ($this->organizer_id == 0) ? null : $this->organizer_id;
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organizer' => 'Organizer Name',
            'date' => 'Date',
            'topic' => 'Topic',
            'venue' => 'Venue',
            'organizer_id' => 'Organizer ID',
            'facilitators' => 'Facilitators',
            'no_of_participants' => 'No. of Participants',
            'participants_scan' => 'Participants List',
            'donor_id' => 'Donor',
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

    public function getROrganizer()
    {
        return $this->hasOne(Organizer::className(), ['id' => 'organizer_id']);
    }

    public function getTType()
    {
        return $this->hasOne(TrainingType::className(), ['id' => 'type']);
    }

    public function getDonor()
    {
        return $this->hasOne(Donor::className(), ['id' => 'donor_id']);
    }
}
