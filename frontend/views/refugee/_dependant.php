<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Dependant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dependant-form">

    <?php $form = ActiveForm::begin(['action' =>  Url::to(['/refugee/dependant'])]); ?>

    <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>

    <input type="hidden" value="<?= $refugee->id?>" name="refugee_id">

    <?= $form->field($model, 'relationship_id')->dropDownList($relationships, ['prompt' => '--Select the Relationship--']) ?>

    <?= $form->field($model, 'refugee_id')->hiddenInput(['value' => $refugee->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
