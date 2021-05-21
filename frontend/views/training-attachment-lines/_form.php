<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingAttachmentLines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-attachment-lines-form">

    <?php $form = ActiveForm::begin(['id'=>'documents'],['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->errorSummary($model)?>


    <?php $form->field($model, 'training_id')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'imageFile')->fileInput(['id' => 'attachmentfile', 'name' => 'imageFile' ])?>

    <?php $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
