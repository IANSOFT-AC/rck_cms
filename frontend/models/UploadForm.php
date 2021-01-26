<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload($model,$id,$upload_id)
    {
        if ($this->validate()) {
            $BasePath = Yii::getAlias('@webroot').'/uploads/'.$model.'/';

            $filename = time().'-'.$this->imageFile->baseName.'.'.$this->imageFile->extension;

            $this->imageFile->saveAs($BasePath.$filename);

            self::insertData($filename, $id, $upload_id, $model);
            return true;
        } else {
            
            print_r($this->errors);
            return false;
        }
    }

    public static function insertData($filename, $case_id, $uploads_id, $model){
        $BasePath = '/uploads/'.$model.'/';
        if($model == "police_cases"){
            $doc = new PoliceDocsUpload();
            $doc->doc_path = $BasePath.$filename;
            $doc->filename = $filename;
            $doc->police_case_id = $case_id;
            $doc->police_uploads_id = $uploads_id;
            $doc->save();
        }else if($model == "court_cases"){
            $doc = new CourtDocsUploads();
            $doc->doc_path = $BasePath.$filename;
            $doc->filename = $filename;
            $doc->court_case_id = $case_id;
            $doc->court_uploads_id = $uploads_id;
            $doc->save();
        }else if($model == "refugees"){
            $doc = new RefugeeDocsUpload();
            $doc->doc_path = $BasePath.$filename;
            $doc->filename = $filename;
            $doc->model_id = $case_id;
            $doc->upload_id = $uploads_id;
            $doc->save();
        } 
    }
}

