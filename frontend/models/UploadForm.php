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
    public $multipleFiles;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, docx, pdf, doc, odt'],
            [['multipleFiles'], 'file', 'maxFiles' => 10,'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, docx, pdf, doc, odt'],
        ];
    }

    //Upload of single file
    public function upload($model, $id, $upload_id, $subcat = null)
    {
        if ($this->validate()) {
            if($this->imageFile){                
                $BasePath = Yii::getAlias('@webroot').'/uploads/'.$model.'/';

                $filename = time().'-'.$this->imageFile->baseName.'.'.$this->imageFile->extension;

                $this->imageFile->saveAs($BasePath.$filename);

                self::insertData($filename, $id, $upload_id, $model, $subcat);
                return true;
            }
            else{
                print_r($this->imageFile);
                return false; 
            }
        } else {            
            print_r($this->errors);
            return false;
        }
    }

    public function deleteFile($model, $upload_id){
        $data = Document::findOne($id);
        unlink(Yii::$app->basePath . '/web/' . $data->file_name);
        $this->findModel($id)->delete();
    }

    //Upload Multiple Files
    public function multipleUpload($model,$model_id,$upload_id){

        if ($this->multipleFiles) {
            foreach ($this->multipleFiles as $file) {
                $BasePath = Yii::getAlias('@webroot').'/uploads/multiple/'.$model.'/';
                $filename = time().'-'.$file->baseName.'.'.$file->extension;
                //$model->media = $filename;
                $rst = self::insertMultipleData($filename,$model,$model_id,$upload_id);
                if($rst){
                    $file->saveAs($BasePath.$filename);
                }
            }
            return true; 
        }else{
            return false;
        }
    }

    public static function insertMultipleData($filename,$model,$model_id,$upload_id){
        $BasePath = '/uploads/multiple/'.$model.'/';
        if($model == "training"){
            $d = new TrainingUpload();
            $d->doc_path = $BasePath.$filename;
            $d->training_id = $model_id;
            $d->filename = $filename;
            $rst = $d->save();
            return $rst;
        }else if($model == "refugees"){
            $d = new RefugeeDocsUpload();
            $d->doc_path = $BasePath.$filename;
            $d->model_id = $model_id;
            $d->filename = $filename;
            $rst = $d->save();
            return $rst;
        }else if($model == "interventions"){
            $d = new InterventionAttachment();
            $d->doc_path = $BasePath.$filename;
            $d->intervention_id = $model_id;
            $d->filename = $filename;
            $rst = $d->save();
            return $rst;
        }else if($model == "police_cases"){
            $d = new PoliceDocsUpload();
            $d->doc_path = $BasePath.$filename;
            $d->police_case_id = $model_id;
            $d->filename = $filename;
            $rst = $d->save();
            return $rst;
        }else if($model == "court_cases"){
            $d = new CourtDocsUploads();
            $d->doc_path = $BasePath.$filename;
            $d->court_case_id = $model_id;
            $d->filename = $filename;
            $rst = $d->save();
            return $rst;
        }
    }

    public static function insertData($filename, $case_id, $uploads_id, $model, $subcat){
        $BasePath = '/uploads/'.$model.'/';
        if($model == "police_cases"){
            $doc = new PoliceDocsUpload();
            $doc->doc_path = $BasePath.$filename;
            $doc->filename = $filename;
            $doc->police_case_id = $case_id;
            $doc->police_uploads_id = $uploads_id;
            $doc->save();
        }else if($model == "court_cases"){
            if(is_null($subcat)){
                $doc = new CourtDocsUploads();
                $doc->doc_path = $BasePath.$filename;
                $doc->filename = $filename;
                $doc->court_case_id = $case_id;
                $doc->court_uploads_id = $uploads_id;
                $doc->save();
            }else{
                $doc = new CourtDocsUploads();
                $doc->doc_path = $BasePath.$filename;
                $doc->filename = $filename;
                $doc->court_case_id = $case_id;
                $doc->subcat_id = $uploads_id;
                $doc->save();
            }
            
        }else if($model == "refugees"){
            $doc = new RefugeeDocsUpload();
            $doc->doc_path = $BasePath.$filename;
            $doc->filename = $filename;
            $doc->model_id = $case_id;
            $doc->upload_id = $uploads_id;
            $doc->save();
        }else if($model == "interventions"){
            $doc = new InterventionAttachment();
            $doc->doc_path = $BasePath.$filename;
            $doc->filename = $filename;
            $doc->intervention_id = $case_id;
            $doc->upload_id = $uploads_id;
            $doc->save();
        }else if($model == "training"){
            $doc = Training::findOne($case_id);
            $doc->participants_scan = $filename;
            //False due to date must be a string validation rule
            $doc->save(false);
            //print_r($doc->errors());
        } 
        else if($model == "counseling"){
            $doc = Intervention::findOne($case_id);
            $doc->counseling_intake_form = $filename;
            //False due to date must be a string validation rule
            $doc->save(false);
            //print_r($doc->errors());
        } 
    }
}

