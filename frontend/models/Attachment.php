<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 5/11/2020
 * Time: 3:51 AM
 */

namespace frontend\models;
use app\models\Refugee;
use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class Attachment extends Model
{

    /**
     * @var UploadedFile
     */
    public $Document_No;
    public $Name;
    public $File_path;
    public $Key;
    public $attachmentfile;


    public function rules()
    {
        return [
            ['Document_No','integer'],
            ['Document_No','required'],
            [['attachmentfile'],'file','maxFiles'=> 1],
            [['attachmentfile'],'file','mimeTypes'=> ['application/pdf']],
            [['attachmentfile'],'file','extensions'=> 'pdf'],
            [['attachmentfile'],'file','maxSize' => '5120000'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'attachmentfile' => 'Consent Document',
        ];
    }

    public function upload($docId)
    {
        $model = $this;

        $imageId = Yii::$app->security->generateRandomString(8);

        $imagePath = Yii::getAlias('@frontend/web/consent_attachments/'.$imageId.'.'.$this->attachmentfile->extension);
        $navPath = \yii\helpers\Url::home(true).'consent_attachments/'.$imageId.'.'.$this->attachmentfile->extension; // Readable from nav interface


        if($model->validate()){
            // Check if directory exists, else create it
            if(!is_dir(dirname($imagePath))){
                FileHelper::createDirectory(dirname($imagePath));
            }

            $this->attachmentfile->saveAs($imagePath);

            //Post to Nav
            if($docId) // A create scenario
            {
               $clientModel = Refugee::findOne(['id' => $docId]);
               $clientModel->consent_scan = $navPath;
               if($clientModel->save(false))
               {
                   Yii::$app->session->setFlash('success','Client Consent Document Upload Saved Successfully.');
                   return true;

               }else{
                   Yii::$app->session->setFlash('error','Could not upload Consent Document, try later.');
                   return false;
               }

                return true;

            }else
            {
                return false;

            }

        }else{
            return $this->errors;
        }
    }

    public function getPath($DocNo=''){
        if(!$DocNo){
            return false;
        }
       $path = Refugee::findOne(['id' => $DocNo]);
        if($path)
        {
            return $path->consent_scan;
        }

        return false;

    }

    public function readAttachment($path)
    {


            $binary = file_get_contents($path);
            $content = chunk_split(base64_encode($binary));
            return $content;

    }



    public function getFileProperties($binary)
    {
        $bin  = base64_decode($binary);
        $props =  getImageSizeFromString($bin);
        return $props['mime'];
    }
}