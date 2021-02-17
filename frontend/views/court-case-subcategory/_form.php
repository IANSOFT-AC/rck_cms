<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CourtCaseCategory;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCaseSubcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-case-subcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(CourtCaseCategory::find()->all(), 'id', 'name'),
        ['prompt'=> '-- Court Case Category --']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
