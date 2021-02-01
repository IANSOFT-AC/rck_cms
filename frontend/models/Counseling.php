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
            [['code', 'intervention_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['intervention_id'], 'required'],
            [['presenting_problem', 'date', 'therapeutic', 'conseptualization', 'intervention', 'counsellors'], 'string'],
            [['session', 'counseling_intake_form'], 'string', 'max' => 255],
            [['intervention_id'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['intervention_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->date = strtotime($this->date);
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
            'session' => 'Session',
            'intervention_id' => 'Intervention ID',
            'presenting_problem' => 'Presenting problem/summary of previous session',
            'therapeutic' => 'Therapeutic process/exploration',
            'conseptualization' => 'Conceptualization/acquisition and perpetuation',
            'intervention' => 'Interventions',
            'counsellors' => 'Counsellors self Envaluation',
            'counseling_intake_form' => 'Counseling Intake Form',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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
}