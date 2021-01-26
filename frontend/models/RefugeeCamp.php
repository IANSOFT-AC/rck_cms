<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "refugee_camp".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $county
 * @property int|null $subcounty
 * @property string|null $locality_description
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $rck_office
 *
 * @property Refugee[] $refugees
 * @property RckOffices $rckOffice
 */
class RefugeeCamp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refugee_camp';
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
            [['county', 'subcounty', 'created_at', 'updated_at', 'created_by', 'updated_by', 'rck_office'], 'integer'],
            [['locality_description'], 'string'],
            [['rck_office'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['rck_office'], 'exist', 'skipOnError' => true, 'targetClass' => RckOffices::className(), 'targetAttribute' => ['rck_office' => 'id']],
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
            'county' => 'County',
            'subcounty' => 'Subcounty',
            'locality_description' => 'Locality Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'rck_office' => 'Rck Office',
        ];
    }

    /**
     * Gets query for [[Refugees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefugees()
    {
        return $this->hasMany(Refugee::className(), ['camp' => 'id']);
    }

    /**
     * Gets query for [[RckOffice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRckOffice()
    {
        return $this->hasOne(RckOffices::className(), ['id' => 'rck_office']);
    }
}
