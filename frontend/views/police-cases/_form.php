<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Policestation;
use app\models\Lawyer;
use yii\helpers\Url;

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
                    
                    <?php 
                    if(is_null($refugee_id)){
                    ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gender')->dropDownList(['male' => 'Male', 'female' => 'Female', 'other' => 'Others'],
                        ['prompt' => '-- Gender --']) ?>

                    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'age')->textInput(['type' => 'number']) ?>
                    <?php
                    }
                    ?>

                    <?= $form->field($model, 'police_station_id')->dropDownList($policeStations,
                        ['prompt'=> '-- Select Police Station --']) ?>

                    <?= $form->field($model, 'policestation')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'investigating_officer')->textInput(['maxlength' => true])->label('Names of Investigation Officer') ?>
                        
                    <?= $form->field($model, 'investigating_officer_contacts')->textInput(['maxlength' => true]) ?>

                </div>


                <div class="col-md-6">
                    <?= $form->field($model, 'ob_number')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'ob_details')->textarea() ?>
                    
                    
                    <?= $form->field($model, 'offence_type')->dropDownList([1 => 'Civil',2 => 'Criminal'],['prompt' => '--Offence Type? --'//after prompt
                                    ,'onchange'=>'
                                    $.get( "'.Url::toRoute('police-cases/catlists').'", { id: $(this).val() } )
                                                .done(function( data )
                                        {
                                            $( "select#policecases-offence_id" ).html( data );
                                        });
                                    ']) ?>

                    <?= $form->field($model, 'offence_id')->dropDownList($offences,
                            ['prompt' => '-- Choose Offence --']) ?>

                    <?= $form->field($model, 'offence')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'complainant')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'first_instance_interview')->textarea() ?>

                    <?php 
                    if($refugee_id){
                        echo $form->field($model, 'refugee_id')->hiddenInput(['value' => $refugee_id ])->label(false); 
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>

   

    
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save <i class="fa fa-check"></i> Next'), ['class' => 'btn btn-success']); ?>
                    <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
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
    }).change();

    $('#policecases-offence_id').on('change', function(){
        if(this.value == 0){
            $('.field-policecases-offence').fadeIn('slow');
        }else{
            $('.field-policecases-offence').fadeOut('slow');
        }
    }).change();
    
JS;

$this->registerJs($script);


