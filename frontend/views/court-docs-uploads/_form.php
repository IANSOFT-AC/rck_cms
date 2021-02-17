<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourtDocsUploads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-docs-uploads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doc_path')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'court_case_id')->textInput() ?>

    <?= $form->field($model, 'court_uploads_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
