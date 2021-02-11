<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "court_cases".
 *
 * @property int $id
 * @property int|null $no_of_refugees
 * @property string|null $name
 * @property string|null $offence
 * @property string|null $first_instance_interview
 * @property int|null $magistrate
 * @property int|null $court_proceeding_id
 * @property int|null $date_of_arrainment
 * @property string|null $case_status
 * @property int|null $next_court_date
 * @property int|null $legal_officer_id
 * @property int|null $counsellor_id
 * @property int|null $court_case_category_id
 * @property int|null $court_case_subcategory_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Counsellors $counsellor
 * @property CourtCaseCategory $courtCaseCategory
 * @property CourtCaseSubcategory $courtCaseSubcategory
 * @property CourtProceeding $courtProceeding
 * @property Lawyer $legalOfficer
 * @property string|null $magistrate
 * @property CourtDocsUploads[] $courtDocsUploads
 */
class CourtCases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'court_cases';
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
            [['no_of_refugees', 'court_proceeding_id', 'legal_officer_id', 'counsellor_id', 'court_case_category_id', 'court_case_subcategory_id', 'refugee_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['first_instance_interview','counsellor','legal_officer'],'string'],
            [['name', 'offence', 'case_status','date_of_arrainment','next_court_date','magistrate','counsellor','legal_officer'], 'string', 'max' => 255],
            [['counsellor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Counsellors::className(), 'targetAttribute' => ['counsellor_id' => 'id']],
            [['court_case_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourtCaseCategory::className(), 'targetAttribute' => ['court_case_category_id' => 'id']],
            [['court_case_subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourtCaseSubcategory::className(), 'targetAttribute' => ['court_case_subcategory_id' => 'id']],
            [['court_proceeding_id'], 'exist', 'skipOnError' => true, 'targetClass' => NatureOfProceeding::className(), 'targetAttribute' => ['court_proceeding_id' => 'id']],
            [['legal_officer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lawyer::className(), 'targetAttribute' => ['legal_officer_id' => 'id']],
            [['refugee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Refugee::className(), 'targetAttribute' => ['refugee_id' => 'id']],
        ];
    }

    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_of_refugees' => 'No Of Refugees',
            'name' => 'Name',
            'offence' => 'Offence',
            'offence_id' => 'Offence',
            'first_instance_interview' => 'First Instance Interview',
            'magistrate' => 'Magistrate',
            'court_proceeding_id' => 'Nature of Proceeding',
            'date_of_arrainment' => 'Date Of Arraignment',
            'case_status' => 'Case Status',
            'next_court_date' => 'Next Court Date',
            'legal_officer_id' => 'Legal Officer',
            'counsellor_id' => 'Counsellor',
            'legal_officer' => 'Legal Officer Names',
            'counsellor' => 'Counsellor Names',
            'refugee_id' => 'Client',
            'court_case_category_id' => 'Court Case Category',
            'court_case_subcategory_id' => 'Court Case Subcategory',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        $this->date_of_arrainment = strtotime($this->date_of_arrainment);
        $this->next_court_date = strtotime($this->next_court_date);
        return parent::beforeSave($insert);
    }

    //Other fields for updating
    public function beforeValidate(){
        if (parent::beforeValidate()) {
            //Nullify the values if the value is other for the following fields
            $this->offence_id = ($this->offence_id == 0) ? null : $this->offence_id;
            $this->counsellor_id = ($this->counsellor_id == 0) ? null : $this->counsellor_id;             
            $this->legal_officer_id = ($this->legal_officer_id == 0) ? null : $this->legal_officer_id;
            return true;
        }
        return false;
    }

    /**
     * Gets query for [[Counsellor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRCounsellor()
    {
        return $this->hasOne(Counsellors::className(), ['id' => 'counsellor_id']);
    }

    /**
     * Gets query for [[Offence]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getROffence()
    {
        return $this->hasOne(Offence::className(), ['id' => 'offence_id']);
    }

    /**
     * Gets query for [[CourtCaseCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtCaseCategory()
    {
        return $this->hasOne(CourtCaseCategory::className(), ['id' => 'court_case_category_id']);
    }

    /**
     * Gets query for [[CourtCaseSubcategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtCaseSubcategory()
    {
        return $this->hasOne(CourtCaseSubcategory::className(), ['id' => 'court_case_subcategory_id']);
    }

    /**
     * Gets query for [[CourtProceeding]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourtProceeding()
    {
        return $this->hasOne(NatureOfProceeding::className(), ['id' => 'court_proceeding_id']);
    }

    /**
     * Gets query for [[LegalOfficer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRLegalOfficer()
    {
        return $this->hasOne(Lawyer::className(), ['id' => 'legal_officer_id']);
    }

    /**
     * Gets query for [[CourtDocsUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUploads()
    {
        return $this->hasMany(CourtDocsUploads::className(), ['court_case_id' => 'id']);
    }
}
