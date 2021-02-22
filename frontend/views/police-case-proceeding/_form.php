<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCaseProceeding */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="police-case-proceeding-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'police_case_id')->hiddenInput(['value' => $model->isNewRecord ? $police->id : $model->police_case_id ])->label(false) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
