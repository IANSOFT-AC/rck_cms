<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-form">


            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'organizer_id')->dropDownList($organizers,['prompt' => '-- Select Organizer? --']) ?>
                    <?= $form->field($model, 'organizer')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'date')->textInput(['type' => 'date','class' => 'form-control no-past']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'facilitators')->textarea(['rows' => 3]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'no_of_participants')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'participants_scan')->fileInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'photos[]')->fileInput(['multiple'=> true]) ?>
                </div>

                    <?php $form->field($model, 'created_by')->textInput() ?>

                    <?php $form->field($model, 'updated_by')->textInput() ?>

                    <?php $form->field($model, 'created_at')->textInput() ?>

                    <?php $form->field($model, 'updated_at')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

</div>
<?php


$script = <<<JS

    //Hide fields initially
    $('.field-training-organizer').hide()

    $('#training-organizer_id').on('change', function(){
        if(this.value == 0){
            $('.field-training-organizer').fadeIn('slow');
        }else{
            $('.field-training-organizer').fadeOut('slow');
        }
    });
    
JS;

$this->registerJs($script);
