<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "intervention_progress_lines".
 *
 * @property int $id
 * @property int|null $intervention_id
 * @property string|null $progress_update
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class InterventionProgressLines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intervention_progress_lines';
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
            [['intervention_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['progress_update'], 'string'],
            ['progress_update','unique'],
            ['progress_update','required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'intervention_id' => 'Intervention ID',
            'progress_update' => 'Progress Update',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return InterventionProgressLinesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterventionProgressLinesQuery(get_called_class());
    }
}
