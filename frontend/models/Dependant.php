<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "dependant".
 *
 * @property int $id
 * @property string $names
 * @property int $relationship_id
 * @property int $refugee_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Refugee $refugee
 * @property Relationship $relationship
 */
class Dependant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dependant';
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
            [['names', 'relationship_id', 'refugee_id'], 'required'],
            [['relationship_id', 'refugee_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['names'], 'string', 'max' => 255],
            [['refugee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Refugee::className(), 'targetAttribute' => ['refugee_id' => 'id']],
            [['relationship_id'], 'exist', 'skipOnError' => true, 'targetClass' => Relationship::className(), 'targetAttribute' => ['relationship_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'names' => 'Names',
            'relationship_id' => 'Relationship ID',
            'refugee_id' => 'Refugee ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Refugee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefugee()
    {
        return $this->hasOne(Refugee::className(), ['id' => 'refugee_id']);
    }

    /**
     * Gets query for [[Relationship]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelationship()
    {
        return $this->hasOne(Relationship::className(), ['id' => 'relationship_id']);
    }
}
