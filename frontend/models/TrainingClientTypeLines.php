<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "training_client_type_lines".
 *
 * @property int $id
 * @property int|null $training_id
 * @property int|null $client_type
 * @property int|null $number
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class TrainingClientTypeLines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_client_type_lines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_id', 'client_type', 'number', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['number','client_type'], 'required'],
            ['client_type','unique']
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
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
            'client_type' => 'Client Type',
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }


    // Get Client Type

    public function getType()
    {
        return $this->hasOne(AsylumType::className(),['id' => 'client_type' ]);
    }
}
