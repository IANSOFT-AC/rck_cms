<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dependant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dependant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relationship_id')->dropDownList($relationships, ['prompt' => '--Select the Relationship--']) ?>

    <?= $form->field($model, 'refugee_id')->textInput() ?>

    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
