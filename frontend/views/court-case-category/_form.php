<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCaseCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-case-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
