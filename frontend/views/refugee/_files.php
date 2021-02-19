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
        <div class="row container-fluid">
                <div class="custom-file m-1 col-md-9">
                    <?= $form->field($uploadModel, 'imageFile',[
                    'options' => [
                        'class' => 'custom-file has-icon has-label',
                    ],
                    'labelOptions' => [ 'class' => 'custom-file-label' ]
                    ])->fileInput([ 'accept' => '*/*', 'class' => 'custom-file-input uploadform-imagefile','id' => $value->name])->label($value->desc) ?>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                    <input type="hidden" name="id" value="<?= $model->id?>">
                    <input type="hidden" name="refugee_upload_id" value="<?= $value->id ?>">
                </div>
                <div class="pull-right col-md-2">
                <?= Html::submitButton(Yii::t('app', 'Upload and Finish'), ['class' => 'btn btn-success text-center uploadFile']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    <?php
       }
    ?>
<hr>
<?php $form = ActiveForm::begin([
        'action' =>'upload',
        'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-inline caseFileUpload'],
        //'enableAjaxValidation' => true,
        //'validationUrl' => '/police_cases/upload',
    ]); ?>
        <div class="row container-fluid">
            <div class="custom-file m-1  col-md-9">
                <?= $form->field($uploadModel, 'multipleFiles[]',[
                    'options' => [
                        'class' => 'custom-file has-icon has-label',
                    ],
                    'labelOptions' => [ 'class' => 'custom-file-label' ]
                ])->fileInput([ 'accept' => '*/*','multiple' => true, 'class' => 'custom-file-input uploadform-multipleFiles'])->label("Other Uploads") ?>
                <input type="hidden" name="id" value="<?= $model->id?>">
            </div>
            <div class="form-group mx-sm-3 mb-2 col-md-2 pull-right">
                <?= Html::submitButton(Yii::t('app', 'Upload Multiple files'), ['class' => 'btn btn-warning uploadFile form-control']) ?>
            </div>
        </div>
        <hr>

        <?php ActiveForm::end(); ?>
        
        <div class="form-group p-4">
            <?= Html::a('Proceed to view page', ['view','id' => $model->id], ['class' => 'btn btn-success form-control']) ?>
        </div>

</div>

<?php

$script = <<<JS
    
    // For showing which file is loaded
    $('input[type="file"]').on('change', function() {
        var file = $(this)[0].files[0].name;
        let title = $(this).siblings( "label" ).text();
        $(this).siblings( "label" ).text(" ("+ file + ") File selected");
    });

JS;

$this->registerJs($script);