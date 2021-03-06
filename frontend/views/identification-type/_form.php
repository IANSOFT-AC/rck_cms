<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IdentificationType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="identification-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
