<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'organizer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facilitators')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_of_participants')->textInput() ?>

    <?= $form->field($model, 'participants_scan')->fileInput() ?>

    <?= $form->field($model, 'photos[]')->fileInput(['multiple'=> true]) ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
