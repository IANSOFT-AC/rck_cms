<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "court_case_proceeding".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $desc
 * @property int $court_case_id
 * @property string|null $case_status
 * @property int|null $next_court_date
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CourtCases $courtCase
 */
class CourtCaseProceeding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'court_case_proceeding';
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
            [['desc'], 'string'],
            [['court_case_id'], 'required'],
            [['court_case_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'case_status','next_court_date'], 'string', 'max' => 255],
            [['court_case_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourtCases::className(), 'targetAttribute' => ['court_case_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->next_court_date = strtotime($this->next_court_date);
        return parent::beforeSave($insert);
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
            'court_case_id' => 'Court Case ID',
            'case_status' => 'Case Status',
            'next_court_date' => 'Next Court Date',
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
}
