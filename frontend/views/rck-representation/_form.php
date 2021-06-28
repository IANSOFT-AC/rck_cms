<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RckRepresentation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rck-representation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'representation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'case_category')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
