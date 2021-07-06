<?php

namespace app\models;

use frontend\models\Gender;
use frontend\models\Conflict;
use Yii;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use DateTime;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "refugee".
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property int $user_group_id
 * @property int|null $user_id
 * @property string|null $image
 * @property int|null $camp
 * @property string|null $cell_number
 * @property string|null $email_address
 * @property int $gender
 * @property int|null $country_of_origin
 * @property int|null $demography_id
 * @property int|null $date_of_birth
 * @property int|null $id_type
 * @property int|null $conflict
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $nhcr_case_no
 * @property int|null $return_refugee
 * @property string|null $rck_no
 * @property int $rck_office_id
 * @property int|null $arrival_date
 * @property int|null $has_disability
 * @property string|null $disability_desc
 * @property int|null $asylum_status
 * @property int|null $rsd_appointment_date
 * @property string|null $reason_for_rsd_appointment
 * @property string|null $source_of_info_abt_rck
 * @property int $mode_of_entry_id
 * @property string|null $id_no
 * @property int|null $victim_of_turture
 * @property string|null $form_of_torture
 * @property string|null $source_of_income
 * @property string|null $job_details
 * @property int|null $has_work_permit
 * @property int|null $arrested_due_to_lack_of_work_permit
 * @property int|null $interested_in_work_permit
 * @property int|null $interested_in_citizenship
 * @property int|null $source_of_info_id
 * @property int|null $source_of_income_id
 * @property int|null $form_of_torture_id
 * @property int|null $disability_type_id
 *
 * @property Dependant[] $dependants
 * @property RefugeeCamp $camp0
 * @property ModeOfEntry $modeOfEntry
 * @property RckOffices $rckOffice
 * @property UserGroup $userGroup
 * @property User $user
 */
class Refugee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $full_names;
    public $attachmentfile;

    public static function tableName()
    {
        return 'refugee';
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
            [['attachmentfile'],'file','maxFiles'=> 1],
            [['attachmentfile'],'file','mimeTypes'=> ['application/pdf']],
            [['attachmentfile'],'file','extensions'=> 'pdf'],
            [['attachmentfile'],'file','maxSize' => '5120000'],
            [['first_name', 'last_name', 'user_group_id', 'gender', 'rck_office_id', 'country_of_origin','has_disability','victim_of_turture','asylum_status'], 'required'],
            [['user_group_id', 'user_id', 'camp', 'gender', 'country_of_origin', 'demography_id', 'id_type', 'conflict', 'created_at', 'updated_at',
                'created_by', 'updated_by', 'return_refugee', 'rck_office_id', 'has_disability', 'asylum_status','interpreter',
                 'mode_of_entry_id', 'victim_of_turture', 'has_work_permit', 'arrested_due_to_lack_of_work_permit','consent',
                  'interested_in_work_permit', 'dependants','interested_in_citizenship','disability_type_id'
                ], 'integer'],


            ['arrival_date','safe'],
            [['email_address','cell_number','id_no'],'unique'],
            ['email_address','email'],
            [['disability_desc', 'reason_for_rsd_appointment', 'custom_language', 'source_of_info_abt_rck', 'form_of_torture', 'job_details','rsd_appointment_date', 'date_of_birth', 'physical_address',  'old_rck'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'email_address'], 'string', 'max' => 50],
            [['image'], 'string', 'max' => 150],
            [['cell_number','id_no'], 'string', 'max' => 15],
            [['nhcr_case_no', 'rck_no', 'source_of_income'], 'string', 'max' => 255],
            [['camp'], 'exist', 'skipOnError' => true, 'targetClass' => RefugeeCamp::className(), 'targetAttribute' => ['camp' => 'id']],
            // [['mode_of_entry_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModeOfEntry::className(), 'targetAttribute' => ['mode_of_entry_id' => 'id']],
            [['rck_office_id'], 'exist', 'skipOnError' => true, 'targetClass' => RckOffices::className(), 'targetAttribute' => ['rck_office_id' => 'id']],
            [['user_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserGroup::className(), 'targetAttribute' => ['user_group_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['conflict'], 'exist', 'skipOnError' => true, 'targetClass' => Conflict::className(), 'targetAttribute' => ['conflict' => 'id']],
            //[['source_of_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => SourceOfInfo::className(), 'targetAttribute' => ['source_of_info_id' => 'id']],
            //[['source_of_income_id'], 'exist', 'skipOnError' => true, 'targetClass' => SourceOfIncome::className(), 'targetAttribute' => ['source_of_income_id' => 'id']],
            //[['asylum_status'], 'exist', 'skipOnError' => true, 'targetClass' => AsylumType::className(), 'targetAttribute' => ['asylum_status' => 'id']],
            [['disability_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DisabilityType::className(), 'targetAttribute' => ['disability_type_id' => 'id']],
            ['torture_manifestation', 'string'],
            //Conditional Validation
            [
                ['disability_desc'],
                'required',
                'when' => function($model){
                    return ($model->disability_type_id == 'other') ? true : false;
                },
                'whenClient' => "function(attribute, value){
                    //alert('has disability')
                    if( $('#refugee-disability_type_id').val() == 'other'){
                        return true;
                    }else{
                        return false;
                    }
                }"
            ],
            [
                ['mode_of_entry_id','arrival_date','has_work_permit'],
                'required',
                'when' => function($model){
                    return ($model->country_of_origin != 3) ? true : false;
                },
                'whenClient' => "function(attribute, value){
                    //alert('has disability')
                    if( $('#refugee-country_of_origin').val() != 3){
                        return true;
                    }else{
                        return false;
                    }
                }"
            ],
            // [
            //     ['rsd_appointment_date'],
            //     'required',
            //     'when' => function($model){
            //         return ($model->asylum_status == 1) ? true : false;
            //     },
            //     'whenClient' => "function(attribute, value){
            //         if( $('#refugee-asylum_status').val() == 1){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }"
            // ],
            [
                ['reason_for_rsd_appointment'],
                'required',
                'when' => function($model){
                    return isset($model->rsd_appointment_date) ? false : false;
                },
                'whenClient' => "function(attribute, value){
                    if( $('#refugee-rsd_appointment_date').val() != \"\"){
                        return true;
                    }else{
                        return false;
                    }
                }"
            ],
            // [
            //     ['form_of_torture'],
            //     'required',
            //     'when' => function($model){
            //         return ($model->form_of_torture_id == 'other') ? true : false;
            //     },
            //     'whenClient' => "function(attribute, value){
            //         if( $('#refugee-form_of_torture_id').val() == 'other'){
            //             return true;
            //         }else{
            //             return false;
            //         }
            //     }"
            // ],
        ];
    }

    //Active Record hooks

    public function beforeSave($insert)
    {


        $this->arrival_date = strtotime($this->arrival_date);
        $this->date_of_birth = strtotime($this->date_of_birth);
        $this->rsd_appointment_date = strtotime($this->rsd_appointment_date);
        //$this->source_of_income_id = implode(',',$this->source_of_income_id);
        //$this->form_of_torture_id = implode(',',$this->form_of_torture_id);

        return parent::beforeSave($insert);
    }

    //Other fields for updating
    public function beforeValidate(){
        if (parent::beforeValidate()) {
            //Nullify the values if the value is other for the following fields
            //$this->source_of_info_id = ($this->source_of_info_id == 0) ? null : $this->source_of_info_id;

            //$this->disability_type_id = ($this->disability_type_id == 0) ? null : $this->disability_type_id;
            return true;
        }
        return false;
    }

    //WORK ON RCK NUMBER

    public function afterSave($insert, $changedAttributes){
        //Create the RCK id number
        if($insert){


            if(!empty($_FILES['attachmentfile']) && sizeof($_FILES['attachmentfile']) > 1){


                $this->attachmentfile = UploadedFile::getInstanceByName('attachmentfile');
                if($this->attachmentfile)
                {
                    $fileID = Yii::$app->security->generateRandomString(8);
                    $absolutePath = Yii::getAlias('@frontend/web/consent_attachments/'.$fileID.'.'.$this->attachmentfile->extension);
                    $FilePath = \yii\helpers\Url::home(true).'consent_attachments/'.$fileID.'.'.$this->attachmentfile->extension;
                    if(!is_dir(dirname($absolutePath))){
                        FileHelper::createDirectory(dirname($absolutePath));
                    }

                    $this->attachmentfile->saveAs($absolutePath);

                }

            }


            $date = new DateTime();
            $this->rck_no = "RCK-".$this->rckOffice->code ."-". $this->id."-".$date->format('Y');
            $this->updateAttributes(
                [
                    'rck_no' => $this->rck_no,
                    'consent_scan' => !empty($FilePath)?$FilePath:''
                ]);
        }
        //parent::afterSave($insert, $changedAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'user_group_id' => 'User Group ID',
            'user_id' => 'User ID',
            'image' => 'ID Scan',
            'camp' => 'Camp',
            'cell_number' => 'Cell Number',
            'email_address' => 'Email Address',
            'gender' => 'Gender',
            'country_of_origin' => 'Nationality',
            'demography_id' => 'Demography',
            'date_of_birth' => 'Date Of Birth',
            'id_type' => 'ID Type',
            'conflict' => 'Reason for Fleeing',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'nhcr_case_no' => 'UNHCR/RAS Case No',
            'return_refugee' => 'Return Refugee',
            'rck_no' => 'RCK No',
            'rck_office_id' => 'RCK Office',
            'arrival_date' => 'Arrival Date',
            'has_disability' => 'Has Disability',
            'disability_type_id' => 'Disablity Type',
            'disability_desc' => 'Disability Description',
            'asylum_status' => 'Asylum Status',
            'rsd_appointment_date' => 'RSD Appointment Date',
            'reason_for_rsd_appointment' => 'Reason For RSD Appointment',
            'source_of_info_abt_rck' => 'How you learnt about RCK Details',
            'mode_of_entry_id' => 'Mode Of Entry',
            'victim_of_turture' => 'Is a victim of turture?',
            'form_of_torture' => 'Form Of Torture',
            'source_of_income' => 'Source Of Income Details',
            'physical_address' => 'Physical Address',
            'job_details' => 'Job Details',
            'id_no' => 'ID / Passport number',
            'has_work_permit' => 'Has Work Permit?',
            'arrested_due_to_lack_of_work_permit' => 'Arrested Due To Lack Of Work Permit?',
            'interested_in_work_permit' => 'Interested In Getting a Work Permit?',
            'interested_in_citizenship' => 'Interested In Getting Kenyan Citizenship?',

            'source_of_info_id' => 'How did you learn about RCK?',
            'source_of_income_id' => 'Source of Income',
            'form_of_torture_id' => 'Form of Torture',
            'disability_type_id' => 'Disability Type',

            'languages' => 'Languages That need interpretation',
            'interpreter' => 'Client needs an interpreter?',
            'dependants' => 'No. of Dependants',
            'old_rck' => 'Old RCK No',
            'custom_language' => 'Custom Language',
            'spoken_languages' => 'Spoken Languages',
            'consent' => 'Consent',
            'torture_manifestation' => 'Direct / Indirect'
        ];
    }

    /**
     * Gets query for [[Dependants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDependants()
    {
        return $this->hasMany(Dependant::className(), ['refugee_id' => 'id']);
    }

    /**
     * Gets query for [[Camp0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCamp()
    {
        return $this->hasOne(RefugeeCamp::className(), ['id' => 'camp']);
    }

    public function getRcamp()
    {
        return $this->hasOne(RefugeeCamp::className(), ['id' => 'camp']);
    }

    /**
     * Gets query for [[ModeOfEntry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModeOfEntry()
    {
        return $this->hasOne(ModeOfEntry::className(), ['id' => 'mode_of_entry_id']);
    }

    public function getAsylumType()
    {
        return $this->hasOne(AsylumType::className(), ['id' => 'asylum_status']);
    }

    public function getDisabilityType()
    {
        return $this->hasOne(DisabilityType::className(), ['id' => 'disability_type_id']);
    }

    // public function getSourceOfIncome()
    // {
    //     return $this->hasOne(SourceOfIncome::className(), ['id' => 'source_of_income_id']);
    // }

    // public function getFormOfTorture()
    // {
    //     return $this->hasOne(FormOfTorture::className(), ['id' => 'form_of_torture_id']);
    // }

    public function getRconflict()
    {
        return $this->hasOne(Conflict::className(), ['id' => 'conflict']);
    }

    /**
     * Gets query for [[RckOffice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRckOffice()
    {
        return $this->hasOne(RckOffices::className(), ['id' => 'rck_office_id']);
    }

    /**
     * Gets query for [[UserGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroup()
    {
        return $this->hasOne(UserGroup::className(), ['id' => 'user_group_id']);
    }

    public function getRgender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender']);
    }

    public function getIdType()
    {
        return $this->hasOne(IdentificationType::className(), ['id' => 'id_type']);
    }

    public function getRcountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_of_origin']);
    }


    public function getRdemography()
    {
        return $this->hasOne(Demographics::className(), ['id' => 'demography_id']);
    }


    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUploads()
    {
        return $this->hasMany(RefugeeDocsUpload::className(), ['model_id' => 'id']);
    }

    public function getFullNames(){
        return $this->first_name." ".$this->middle_name." ".$this->last_name;
    }

    public function getFullDetails(){
        return $this->first_name." ".$this->middle_name." ".$this->last_name. ", RCK No:".$this->rck_no.", Old RCK No: ". $this->old_rck;
    }




}
