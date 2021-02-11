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

//echo "<pre>";
//print_r(PoliceUploads::find()->select('name')->column());
//echo "</pre>";
?>

<div class="court-cases-form">

    <?php
    foreach ($list as $key => $value) {
        # code...
    ?>
    <?php $form = ActiveForm::begin([
        'action' =>'upload',
        'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-inline caseFileUpload']
    ]); ?>

            <div class="row container-fluid">
                <div class="custom-file m-1 col-md-9">
                    <?= $form->field($uploadModel, 'imageFile',['options' => [
                'class' => 'custom-file-label has-icon has-label'
            ]])->fileInput([ 'accept' => '*/*', 'class' => 'custom-file-input uploadform-imagefile','id' => $value->name])->label($value->desc) ?>
                    <input type="hidden" name="id" value="<?= $model->id?>">
                    <input type="hidden" name="court_upload_id" value="<?= $value->id ?>">
                </div>
                <div class="pull-right col-md-2">
                <?= Html::submitButton(Yii::t('app', 'Upload and Finish'), ['class' => 'btn btn-success text-center']) ?>
                </div>
            </div>

    <?php ActiveForm::end(); ?>

    <?php
       }
    ?>



       <!-- category specific uploads -->
       <?php
        foreach ($categoryUploads as $key => $value) {
            # code...
        ?>
        <?php $form = ActiveForm::begin([
            'action' =>'upload',
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-inline caseFileUpload']
        ]); ?>

                <div class="row container-fluid">
                    <div class="custom-file m-1 col-md-9">
                        <?= $form->field($uploadModel, 'imageFile',['options' => [
                    'class' => 'custom-file-label has-icon has-label'
                ]])->fileInput([ 'accept' => '*/*', 'class' => 'custom-file-input uploadform-imagefile','id' => $value->name])->label($value->name) ?>
                        <input type="hidden" name="id" value="<?= $model->id?>">
                        <input type="hidden" name="subcat_upload_id" value="<?= $value->id ?>">
                    </div>
                    <div class="pull-right col-md-2">
                    <?= Html::submitButton(Yii::t('app', 'Upload and Finish'), ['class' => 'btn btn-success text-center']) ?>
                    </div>
                </div>

        <?php ActiveForm::end(); ?>

        <?php
        }
        ?>



    <div class="card-footer">
        <?php $form = ActiveForm::begin([
            'action' =>'upload',
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-inline caseFileUpload'],
            //'enableAjaxValidation' => true,
            //'validationUrl' => '/police_cases/upload',
        ]); ?>
                <div class="custom-file m-1">
                    <?= $form->field($uploadModel, 'multipleFiles[]',['options' => [
        'class' => 'custom-file-label has-icon has-label'
    ]])->fileInput([ 'accept' => '*/*','multiple' => true, 'class' => 'custom-file-input uploadform-multipleFiles'])->label("Other Uploads") ?>
                    <input type="hidden" name="id" value="<?= $model->id?>">
                </div>
                <div class="form-group mx-sm-3 mb-2 mt-3 col-md-12 pull-right">
                    <?= Html::submitButton(Yii::t('app', 'Upload Multiple files'), ['class' => 'btn btn-warning uploadFile form-control']) ?>
                </div>
            <hr>

            <?php ActiveForm::end(); ?>
    </div>

</div>