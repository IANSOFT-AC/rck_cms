<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "security_interview".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $sex
 * @property string|null $unhcr_case_no
 * @property string|null $refugee_no
 * @property int|null $nationality
 * @property string|null $telephone
 * @property int|null $dob
 * @property string|null $education_level
 * @property string|null $place_of_birth
 * @property string|null $religion
 * @property string|null $names_of_parents
 * @property string|null $siblings
 * @property string|null $ethnicity
 * @property string|null $marital_status
 * @property string|null $dependants
 * @property string|null $reason_for_flight
 * @property string|null $flight
 * @property string|null $life_in_country_of_asylum
 * @property string|null $assessment
 * @property int|null $intervention_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Intervention $intervention
 */
class SecurityInterview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'security_interview';
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
            [['sex', 'nationality',  'intervention_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['names_of_parents', 'dependants', 'reason_for_flight', 'life_in_country_of_asylum', 'assessment', 'dob'], 'string'],
            [['name', 'unhcr_case_no', 'refugee_no', 'telephone', 'education_level', 'place_of_birth', 'religion', 'siblings', 'ethnicity', 'marital_status', 'flight'], 'string', 'max' => 255],
            [['intervention_id'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['intervention_id' => 'id']],
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
            'sex' => 'Sex',
            'unhcr_case_no' => 'UNHCR Case No',
            'refugee_no' => 'Refugee No',
            'nationality' => 'Nationality',
            'telephone' => 'Telephone',
            'dob' => 'DOB',
            'education_level' => 'Education Level',
            'place_of_birth' => 'Place Of Birth',
            'religion' => 'Religion',
            'names_of_parents' => 'Names Of Parents',
            'siblings' => 'Siblings',
            'ethnicity' => 'Ethnicity',
            'marital_status' => 'Marital Status',
            'dependants' => 'Dependants',
            'reason_for_flight' => 'Reason For Flight',
            'flight' => 'Flight',
            'life_in_country_of_asylum' => 'Life In Country Of Asylum',
            'assessment' => 'Assessment',
            'intervention_id' => 'Intervention ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
