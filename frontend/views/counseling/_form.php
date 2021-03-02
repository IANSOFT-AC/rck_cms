<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Counseling */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="counseling-form">

    <div class="card">

        <div class="card-body">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'code')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'next_appointment_date')->textInput(['type' => 'date','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->next_appointment_date, 'yyyy-MM-dd')]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'session')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'presenting_problem')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'therapeutic')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'conseptualization')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'intervention')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'counsellors')->textarea(['rows' => 6]) ?>
                </div>
                
            </div>

            <?= $form->field($model, 'intervention_id')->hiddenInput(['value' => $intervention])->label(false) ?>

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
    </div>

</div>
