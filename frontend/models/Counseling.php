<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "counseling".
 *
 * @property int $id
 * @property int|null $code
 * @property int|null $date
 * @property string|null $session
 * @property int $intervention_id
 * @property string|null $presenting_problem
 * @property string|null $therapeutic
 * @property string|null $conseptualization
 * @property string|null $intervention
 * @property string|null $counsellors
 * @property string|null $counseling_intake_form
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Intervention $intervention0
 */
class Counseling extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counseling';
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
            [['code', 'intervention_id', 'created_at', 'updated_at', 'created_by', 'updated_by','consent'], 'integer'],
            [['intervention_id','type'], 'required'],
            [['presenting_problem', 'date', 'therapeutic', 'conseptualization', 'intervention', 'counsellors', 'next_appointment_date', 'type', 'case_status'], 'string'],
            [['session', 'counseling_intake_form'], 'string', 'max' => 255],
            [['session_goals', 'key_tasks_achieved', 'challenges_emerging', 'interventions_by_facilitator', 'achievement_of_goals', 'stage','remarks'], 'string'],
            [['intervention_id'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['intervention_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->date = strtotime($this->date);
        $this->next_appointment_date = strtotime($this->next_appointment_date);
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code Number',
            'date' => 'Date',
            'next_appointment_date' => 'Next Appointment Date',
            'session' => 'Session',
            'intervention_id' => 'Intervention ID',
            'presenting_problem' => 'Presenting problem/summary of previous session',
            'therapeutic' => 'Therapeutic process/exploration',
            'conseptualization' => 'Conceptualization/acquisition and perpetuation',
            'intervention' => 'Interventions',
            'type' => 'Counseling Type',
            'case_status' => 'Case Status',
            'counsellors' => 'Counsellors self Evaluation',
            'counseling_intake_form' => 'Counseling Intake Form',
            'consent' => 'Consent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',

            'session_goals' => 'What were the session goals',
            'key_tasks_achieved' => 'Summary of key tasks achieved',
            'challenges_emerging' => 'Challenges/Issues that emerged',
            'interventions_by_facilitator' => 'Skills/Interventions by facilitators',
            'achievement_of_goals' => 'Achievement of goals',
            'stage' => 'What stage is the group at and why',
            'remarks' => 'Remarks/Way forward',
            'other_clients' => 'Other Clients'
        ];
    }

    /**
     * Gets query for [[Intervention0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntervention()
    {
        return $this->hasOne(Intervention::className(), ['id' => 'intervention_id']);
    }

    public function getCounselingType()
    {
        if($this->type == 1){
          return "Individual";
        }else if($this->type == 2){
          return "Family";
        }else if($this->type == 3){
          return "Group";
        }else if($this->type == 4){
          return "Couple";
        }
    }

    public function getOtherClients()
    {
      $clients = Refugee::find()->where([
        'in', 'id', [3,20]
        ])->all();
      return $clients;
    }
}
