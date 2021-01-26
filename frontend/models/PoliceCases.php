<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "police_cases".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $gender
 * @property string|null $contacts
 * @property string|null $age
 * @property int $police_station_id
 * @property string|null $investigating_officer
 * @property string|null $investigating_officer_contacts
 * @property string|null $ob_number
 * @property string|null $ob_details
 * @property string $offence
 * @property string $complainant
 * @property string|null $first_instance_interview
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CaseUpdate[] $caseUpdates
 * @property Policestation $policeStation
 * @property PoliceDocsUpload[] $policeDocsUploads
 */
class PoliceCases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    public static function tableName()
    {
        return 'police_cases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['police_station_id', 'offence', 'complainant'], 'required'],
            [['first_instance_interview'],'string'],
            [['police_station_id','refugee_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'gender', 'contacts', 'age', 'investigating_officer', 'ob_number', 'ob_details', 'offence', 'complainant'], 'string', 'max' => 255],
            [['investigating_officer_contacts'], 'string', 'max' => 100],
            [['police_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Policestation::className(), 'targetAttribute' => ['police_station_id' => 'id']],
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
            'gender' => 'Gender',
            'contacts' => 'Contacts',
            'age' => 'Age',
            'police_station_id' => 'Police Station',
            'investigating_officer' => 'Investigating Officer',
            'investigating_officer_contacts' => 'Investigating Officer Contacts',
            'ob_number' => 'OB Number',
            'ob_details' => 'OB Details',
            'offence' => 'Offence',
            'refugee_id' => 'Client',
            'complainant' => 'Complainant',
            'first_instance_interview' => 'First Instance Interview',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CaseUpdates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaseUpdates()
    {
        return $this->hasMany(CaseUpdate::className(), ['police_case_id' => 'id']);
    }

    /**
     * Gets query for [[PoliceStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliceStation()
    {
        return $this->hasOne(Policestation::className(), ['id' => 'police_station_id']);
    }

    /**
     * Gets query for [[PoliceStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Refugee::className(), ['id' => 'refugee_id']);
    }

    /**
     * Gets query for [[PoliceDocsUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUploads()
    {
        return $this->hasMany(PoliceDocsUpload::className(), ['police_case_id' => 'id']);
    }
}
