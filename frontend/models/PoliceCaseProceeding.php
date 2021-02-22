<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "police_case_proceeding".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $desc
 * @property int $police_case_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property PoliceCases $policeCase
 */
class PoliceCaseProceeding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'police_case_proceeding';
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
            [['police_case_id'], 'required'],
            [['police_case_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'desc' => 'Desc',
            'police_case_id' => 'Police Case ID',
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
