<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCasesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-cases-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_of_refugees') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'offence') ?>

    <?= $form->field($model, 'first_instance_interview') ?>

    <?php // echo $form->field($model, 'magistrate_id') ?>

    <?php // echo $form->field($model, 'court_proceeding_id') ?>

    <?php // echo $form->field($model, 'date_of_arrainment') ?>

    <?php // echo $form->field($model, 'case_status') ?>

    <?php // echo $form->field($model, 'next_court_date') ?>

    <?php // echo $form->field($model, 'legal_officer_id') ?>

    <?php // echo $form->field($model, 'counsellor_id') ?>

    <?php // echo $form->field($model, 'court_case_category_id') ?>

    <?php // echo $form->field($model, 'court_case_subcategory_id') ?>

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
