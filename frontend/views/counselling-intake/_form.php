<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CounsellingIntake */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="counselling-intake-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ic_presenting_problem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observation_of_ic_behaviour')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'other_interventions_given_elsewhere')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'how_you_supported_the_client')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'skills_used')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'next_appointment_if_any')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'counselor_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'referred_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'counsellor_id')->dropDownList($counsellors,
                            ['prompt' => '-- Choose Counsellor --']) ?>

    <?= $form->field($model, 'intervention_id')->hiddenInput(['value' => $intervention])->label(false) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
