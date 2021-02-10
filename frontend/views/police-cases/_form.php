<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Policestation;
use app\models\Lawyer;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="police-cases-form">

 <?php $form = ActiveForm::begin(); ?>
    <div class="card">

        <div class="card-body">
            <div class="row">
                



                <div class="col-md-6">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gender')->dropDownList(['male' => 'Male', 'female' => 'Female', 'other' => 'Others'],
                        ['prompt' => '-- Gender --']) ?>

                    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'age')->textInput(['type' => 'number']) ?>

                    <?= $form->field($model, 'police_station_id')->dropDownList($policeStations,
                        ['prompt'=> '-- Select Police Station --']) ?>

                    <?= $form->field($model, 'policestation')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'investigating_officer')->textInput(['maxlength' => true])->label('Names of Investigation Officer') ?>
                        
                    <?= $form->field($model, 'investigating_officer_contacts')->textInput(['maxlength' => true]) ?>

                </div>


                <div class="col-md-6">
                    <?= $form->field($model, 'ob_number')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'ob_details')->textarea() ?>

                    <?= $form->field($model, 'offence_id')->dropDownList($offences,
                            ['prompt' => '-- Choose Offence --']) ?>

                    <?= $form->field($model, 'offence')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'complainant')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'first_instance_interview')->textarea() ?>


                </div>
            </div>
        </div>

    </div>

   

    
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end();
     ?>

</div>

<?php

$script = <<<JS
    //Hide fields initially
    $('.field-policecases-policestation, .field-policecases-offence').hide()

    $('#policecases-police_station_id').on('change', function(){
        if(this.value == 0){
            $('.field-policecases-policestation').fadeIn('slow');
        }else{
            $('.field-policecases-policestation').fadeOut('slow');
        }
    });

    $('#policecases-offence_id').on('change', function(){
        if(this.value == 0){
            $('.field-policecases-offence').fadeIn('slow');
        }else{
            $('.field-policecases-offence').fadeOut('slow');
        }
    });
    
JS;

$this->registerJs($script);


