<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "court_case_category".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CourtCaseSubcategory[] $courtCaseSubcategories
 * @property CourtCases[] $courtCases
 */
class CourtCaseCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'court_case_category';
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
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CourtCaseSubcategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtCaseSubcategories()
    {
        return $this->hasMany(CourtCaseSubcategory::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[CourtCases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtCases()
    {
        return $this->hasMany(CourtCases::className(), ['court_case_category_id' => 'id']);
    }
}
