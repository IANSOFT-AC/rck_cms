<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCasesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="police-cases-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'contacts') ?>

    <?= $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'police_station_id') ?>

    <?php // echo $form->field($model, 'investigating_officer') ?>

    <?php // echo $form->field($model, 'investigating_officer_contacts') ?>

    <?php // echo $form->field($model, 'ob_number') ?>

    <?php // echo $form->field($model, 'ob_details') ?>

    <?php // echo $form->field($model, 'offence') ?>

    <?php // echo $form->field($model, 'complainant') ?>

    <?php // echo $form->field($model, 'first_instance_interview') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
