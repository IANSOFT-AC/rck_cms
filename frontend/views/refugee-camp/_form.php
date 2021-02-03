<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeCamp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="refugee-camp-form">

<?php $form = ActiveForm::begin(); ?>


            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'county')->dropDownList($counties, [
                    'prompt' => 'select county',
                    'onchange' => '$.post("subcounties?county="+$(this).val(), (data) => {
                        $("select#refugeecamp-subcounty").html( data );
                    })'
                ]) ?>

            <?= $form->field($model, 'subcounty')->dropDownList($subCounties, ['prompt' => 'select Sub County']) ?>

            <?= $form->field($model, 'rck_office')->dropDownList($rckOffices, ['prompt' => 'select RCK Office']) ?>

            <?= $form->field($model, 'locality_description')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'created_at')->textInput() ?>

            <?php $form->field($model, 'updated_at')->textInput() ?>

            <?php $form->field($model, 'created_by')->textInput() ?>

            <?php $form->field($model, 'updated_by')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
