<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "counselling_intake".
 *
 * @property int $id
 * @property string|null $ic_presenting_problem
 * @property string|null $observation_of_ic_behaviour
 * @property string|null $other_interventions_given_elsewhere
 * @property string|null $how_you_supported_the_client
 * @property string|null $skills_used
 * @property string|null $next_appointment_if_any
 * @property string|null $counselor_comment
 * @property string|null $referred_to
 * @property int|null $counsellor_id
 * @property int|null $intervention_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Intervention $intervention
 */
class CounsellingIntake extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counselling_intake';
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
            [['ic_presenting_problem', 'observation_of_ic_behaviour', 'other_interventions_given_elsewhere', 'how_you_supported_the_client', 'skills_used', 'counselor_comment'], 'string'],
            [['counsellor_id', 'intervention_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['next_appointment_if_any', 'referred_to', 'date_of_referal'], 'string', 'max' => 255],
            [['intervention_id'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['intervention_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->next_appointment_if_any = strtotime($this->next_appointment_if_any);
        $this->date_of_referal = strtotime($this->date_of_referal);
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ic_presenting_problem' => 'IC Presenting Problem',
            'observation_of_ic_behaviour' => 'Observation Of IC Behaviour',
            'other_interventions_given_elsewhere' => 'Medical, Legal, and other interventions given to the IC by other agencies',
            'how_you_supported_the_client' => 'How you supported the client',
            'skills_used' => 'Skills Used',
            'next_appointment_if_any' => 'Next Appointment If Any',
            'counselor_comment' => 'Counselor Comment',
            'referred_to' => 'Referred to',
            'date_of_referal' => 'Date of referral',
            'counsellor_id' => 'Counsellor ID',
            'intervention_id' => 'Intervention ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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

    
}
