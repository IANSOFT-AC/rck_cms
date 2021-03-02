<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "intervention".
 *
 * @property int $id
 * @property string|null $intervention_type_id
 * @property int|null $case_id
 * @property string|null $situation_description
 * @property string|null counseling_intake_form
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $court_case
 * @property int|null $police_case
 * @property int|null $client_id
 *
 * @property Refugee $client
 * @property CourtCases $courtCase
 * @property PoliceCases $policeCase
 * @property InterventionAttachment[] $interventionAttachments
 */
class Intervention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intervention';
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
            [['created_at','agency_id','updated_at', 'created_by', 'updated_by', 'court_case', 'police_case', 'client_id','office_id'], 'integer'],
            [['situation_description','intervention_details'], 'string'],
            [['counseling_intake_form'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Refugee::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['court_case'], 'exist', 'skipOnError' => true, 'targetClass' => CourtCases::className(), 'targetAttribute' => ['court_case' => 'id']],
            [['police_case'], 'exist', 'skipOnError' => true, 'targetClass' => PoliceCases::className(), 'targetAttribute' => ['police_case' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'intervention_type_id' => 'Intervention Type',
            'intervention_details' => 'Intervention Details',
            'case_id' => 'Intervention Issue/Case',
            'situation_description' => 'Issue/Case Description',
            'counseling_intake_form' => 'Counseling Intake Form',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'court_case' => 'Court Case',
            'police_case' => 'Police Case',
            'client_id' => 'Client',
            'office_id' => 'RCK office Relocation',
            'agency_id' => 'Referred Agency'
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Refugee::className(), ['id' => 'client_id']);
    }

    public function getCasetype()
    {
        return $this->hasOne(Casetype::className(), ['id' => 'case_id']);
    }

    public function getOffice()
    {
        return $this->hasOne(RckOffices::className(), ['id' => 'office_id']);
    }

    public function getAgency()
    {
        return $this->hasOne(Agency::className(), ['id' => 'agency_id']);
    }

    /**
     * Gets query for [[CourtCase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtCase()
    {
        return $this->hasOne(CourtCases::className(), ['id' => 'court_case']);
    }

    /**
     * Gets query for [[PoliceCase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliceCase()
    {
        return $this->hasOne(PoliceCases::className(), ['id' => 'police_case']);
    }

    /**
     * Gets query for [[CounselingIntake]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCounselingIntake()
    {
        return $this->hasMany(CounsellingIntake::className(), ['intervention_id' => 'id']);
    }

    /**
     * Gets query for [[InterventionAttachments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInterventionAttachments()
    {
        return $this->hasMany(InterventionAttachment::className(), ['intervention_id' => 'id']);
    }
}
