<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "case_update".
 *
 * @property int $id
 * @property int $police_case_id
 * @property string|null $description
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property PoliceCases $policeCase
 */
class CaseUpdate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'case_update';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['police_case_id'], 'required'],
            [['police_case_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['police_case_id'], 'exist', 'skipOnError' => true, 'targetClass' => PoliceCases::className(), 'targetAttribute' => ['police_case_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'police_case_id' => 'Police Case ID',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[PoliceCase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliceCase()
    {
        return $this->hasOne(PoliceCases::className(), ['id' => 'police_case_id']);
    }
}
