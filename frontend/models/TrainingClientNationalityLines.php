<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_client_nationality_lines".
 *
 * @property int $id
 * @property int|null $training_id
 * @property int|null $nationality
 * @property int|null $number
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class TrainingClientNationalityLines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_client_nationality_lines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_id', 'nationality', 'number', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'training_id' => 'Training ID',
            'nationality' => 'Nationality',
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TrainingClientNationalityLinesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrainingClientNationalityLinesQuery(get_called_class());
    }
}
