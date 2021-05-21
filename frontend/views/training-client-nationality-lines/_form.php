<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientNationalityLines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-client-nationality-lines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form->field($model, 'training_id')->textInput() ?>

    <?= $form->field($model, 'nationality')->dropDownList($country,['prompt' => 'Slect ...']) ?>

    <?= $form->field($model, 'number')->textInput(['type' => 'number']) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
