<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityInterview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="security-interview-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'unhcr_case_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refugee_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nationality')->textInput() ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'education_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place_of_birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'names_of_parents')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'siblings')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ethnicity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marital_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dependants')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reason_for_flight')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'flight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'life_in_country_of_asylum')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'assessment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'intervention_id')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
