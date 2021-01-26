<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Policestation;
use app\models\Lawyer;
use app\models\PoliceUploads;
use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */
/* @var $form yii\widgets\ActiveForm */
$uploadModel = new UploadForm();

// echo "<pre>";
// print_r($model);
// echo "</pre>";
?>

<div class="police-cases-form">

    

    <?php
    foreach ($list as $key => $value) {
        # code...
    ?>
    <?php $form = ActiveForm::begin([
        'action' =>'upload',
        'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-inline caseFileUpload', 'id' => $value->name.'Form'],
        //'enableAjaxValidation' => true,
        //'validationUrl' => '/police_cases/upload',
    ]); ?>
        <div class="row">
            <div class="form-group mt-3 col-md-5">
                <?= $form->field($uploadModel, 'imageFile')->fileInput([ 'accept' => 'image/*'])->label($value->desc) ?>
                <input type="hidden" name="id" value="<?= $model->id?>">
                <input type="hidden" name="refugee_upload_id" value="<?= $value->id ?>">
            </div>
            <div class="form-group mx-sm-3 mb-2 mt-3 col-md-5 pull-right">
                <?= Html::submitButton(Yii::t('app', 'Upload and Finish'), ['class' => 'btn btn-success uploadFile']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    <?php
       }
    ?>


</div>