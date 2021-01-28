<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */
/* @var $form yii\widgets\ActiveForm */
$uploadModel = new UploadForm();

//echo "<pre>";
//print_r(PoliceUploads::find()->select('name')->column());
//echo "</pre>";
?>

<div class="intervention-form">

    <?php
    foreach ($list as $key => $value) {
        # code...
    ?>
    <?php $form = ActiveForm::begin([
        'action' =>'upload',
        'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-inline interventionFileUpload', 'id' => $value->name.'Form']
    ]); ?>

        <?= $form->field($uploadModel, 'imageFile')->fileInput([ 'accept' => '*/*'])->label($value->name) ?>
        <input type="hidden" name="id" value="<?= $model->id?>">
        <input type="hidden" name="intervention_upload_id" value="<?= $value->id ?>">

	    <div class="form-group mt-3">
	        <?= Html::submitButton(Yii::t('app', 'Upload and Finish'), ['class' => 'btn btn-success']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

    <?php
       }
    ?>

</div>