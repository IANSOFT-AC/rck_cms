®<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="refugee-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true
    ]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['maxlength' => true])->label(false) ?>



    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'gender')->dropDownList($gender, ['prompt' => 'Select ...']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'dependants')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?></div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'user_group_id')->hiddenInput(['value' => 4])->label(false) ?>
                            
                            <?= $form->field($model, 'date_of_birth')->textInput(['type' => 'date', 'class' => 'form-control no-future','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->date_of_birth, 'yyyy-MM-dd')]) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'country_of_origin')->dropDownList($countries, ['prompt' => 'select..']) ?>
                        </div>
                    <!-- </div>

                </div>
            </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Information</h3>
                </div>
                <div class="card-body">
                    <div class="row"> -->
                        <div class="col-md-6">
                            <?= $form->field($model, 'cell_number')->textInput(['maxlength' => true]) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'email_address')->textInput(['maxlength' => true]) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'arrival_date')->textInput(['type' => 'date', 'class' => 'form-control no-future','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->arrival_date, 'yyyy-MM-dd')]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'interpreter')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Needs an interpreter? --']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'languages[]')->dropDownList($languages, ['prompt' => '--Select The Languages--','multiple data-live-search' => "true",'class' => 'form-control selectpicker']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'custom_language')->textInput(['maxlength' => true]) ?>
                        </div>
                    <!-- </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Asylum</h3>
                </div>
                <div class="card-body">

                    <div class="row"> -->
                        <div class="col-md-6">
                            <?= $form->field($model, 'asylum_status')->dropDownList($asylum_types,['prompt' => '-- Asylum Status? --']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'rsd_appointment_date')->textInput(['type' => 'date','class' => 'form-control','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->rsd_appointment_date, 'yyyy-MM-dd')]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'reason_for_rsd_appointment')->textarea() ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'id_no')->textInput() ?>
                        </div>
                    <!-- </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Identification Data</h3>
                </div>
                <div class="card-body">

                    <div class="row"> -->
                        <div class="col-md-6">

                            <?= $form->field($model, 'id_type')->dropDownList($IdTypes, ['prompt' => 'Select']) ?>
                            </div>
                        <div class="col-md-6">

                            <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">

                            
                            <?= $form->field($model, 'conflict')->dropDownList($conflicts, ['prompt' => 'Select ...']) ?>

                        </div>
                    <!-- </div>

                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">RCK & UNHCR details</h3>
                </div>
                <div class="card-body">

                    <div class="row"> -->
                        <div class="col-md-6">

                            <?= $form->field($model, 'nhcr_case_no')->textInput() ?>
                            </div>
                        <div class="col-md-6">

                            <?php $form->field($model, 'return_refugee')->dropDownList([1 => 'Return' , 0 => 'New'],['prompt' => '-- Is return or new client']) ?>
                            <?= $form->field($model, 'rck_office_id')->dropDownList($rck_offices, ['prompt' => '--Select Camp --','onchange'=>'
                                 $.get( "'.Url::toRoute('refugee/camps').'", { id: $(this).val() } )
                                                .done(function( data )
                                       {
                                                  $( "select#refugee-camp" ).html( data );
                                                });
                                            ']) ?>
                                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'old_rck')->textInput()->label("Old RCK No (if any)") ?>
                        </div>
                        <div class="col-md-6">

                            <?php $form->field($model, 'rck_no')->textInput() ?>
                            
                            <?= $form->field($model, 'camp')->dropDownList([], ['prompt' => 'Select']) ?>
                            </div>
                        <div class="col-md-6">
                            
                            <?= $form->field($model, 'physical_address')->textInput(['maxlength' => true]) ?>

                        </div>
                    <!-- </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Torture, Jobs & Disability</h3>
                </div>
                <div class="card-body">

                    <div class="row"> -->
                        <div class="col-md-6">
                            <?= $form->field($model, 'has_disability')->dropDownList([1 => 'Yes' , 0 => 'No'],['prompt' => '-- Has Disability? --']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'disability_type_id[]')->dropDownList($disabilityType,['prompt' => '-- Select Disability --','multiple data-live-search' => "true",'class' => 'form-control selectpicker']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'disability_desc')->textarea() ?>
                            </div>
                        <div class="col-md-6">

                            <?= $form->field($model, 'victim_of_turture')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Select Yes or No --']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'form_of_torture_id[]')->dropDownList($formOfTorture,['prompt' => '-- Select Form of Torture --','multiple data-live-search' => "true",'class' => 'form-control selectpicker']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'form_of_torture')->textarea() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'source_of_info_id')->dropDownList($sourceOfInfo,['prompt' => '-- Select source of Information --']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'source_of_info_abt_rck')->textarea() ?>
                            </div>
                        <div class="col-md-6">

                            <?= $form->field($model, 'source_of_income_id[]')->dropDownList($sourceOfIncome,['prompt' => '-- Select source of Income --','multiple data-live-search' => "true",'class' => 'form-control selectpicker']) ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'source_of_income')->textarea() ?>
                            </div>
                        <div class="col-md-6">
                            <?php $form->field($model, 'job_details')->textarea() ?>
                            </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'mode_of_entry_id')->dropDownList($modeOfEntry,['prompt' => '-- Select Mode Of Entry --']) ?>

                        </div>
                    </div>

                </div>
            </div>
        </div><!--Rwo Three-->


        <div class="col-md-12" id="work-permits">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Work Permit</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <?= $form->field($model, 'has_work_permit')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Has work permit? --']) ?>

                            <?= $form->field($model, 'arrested_due_to_lack_of_work_permit')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Arrested due to lack of a Work Permit? --']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'interested_in_work_permit')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Interested in getting a Work Permit? --']) ?>
                        
                            <?= $form->field($model, 'interested_in_citizenship')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- interested in getting Kenyan Citizenship? --']) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--Rwo Three-->

    </div>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Next <i class="fa fa-check"></i>', ['class' => 'btn btn-success']) ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php


$script = <<<JS

    //COnfirm if its new record
    let isNewRecord = $model->isNewRecord
    
    //Hide fields initially
    $('.field-refugee-disability_desc, \
        .field-refugee-form_of_torture, \
        .field-refugee-id_no, \
        .field-refugee-disability_type_id,\
        .field-refugee-reason_for_rsd_appointment, \
        .field-refugee-rsd_appointment_date,\
        .field-refugee-source_of_info_abt_rck,\
        .field-refugee-form_of_torture_id,\
        .field-refugee-languages, \
        .field-refugee-custom_language').parent().hide()

    $('#refugee-country_of_origin').on('change', function(){
        if(this.value == 3){
            $('.field-refugee-conflict, .field-refugee-arrival_date,\
                .field-refugee-mode_of_entry_id,\
                .field-refugee-nhcr_case_no,\
                #work-permits'
            ).parent().fadeOut();
            
            //Select an option for the asyslum seeker select field
            if(isNewRecord == 1){
                $("#refugee-asylum_status option[value=" + 3 + "]").prop("selected",true);
            }
        }else{
            $('.field-refugee-conflict, .field-refugee-arrival_date,\
                .field-refugee-mode_of_entry_id,\
                .field-refugee-nhcr_case_no,\
                #work-permits'
            ).parent().fadeIn();

            //Offset asyslum seeker select field
            if(isNewRecord == 1){
                $("#refugee-asylum_status option:selected").prop("selected",false);
            }

        }
    }).change();

    $('#refugee-asylum_status').on('change', function() {
      //alert( this.value );
      if(this.value == 1){
        $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').parent().fadeIn('slow');
      }else{
        $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').parent().fadeOut('slow')
      }

      if(this.value == 3 || this.value == 2){
        $('.field-refugee-id_no').parent().fadeIn('slow');
      }else{
        $('.field-refugee-id_no').parent().fadeOut('slow');
      }

    }).change();

    $('#refugee-interpreter').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-languages').parent().fadeIn('slow');
        }else{
            $('.field-refugee-languages').parent().fadeOut('slow');
        }
    }).change();

    $('#refugee-rck_office_id').on('change', function(){
        if(this.value == 1 || this.value == 2){
            $('.field-refugee-camp').parent().fadeOut('slow');
        }else{
            $('.field-refugee-camp').parent().fadeIn('slow');
        }
    }).change();

    $('#refugee-languages').on('change', function(){
        if($('#refugee-languages option[value=0]:selected').length > 0){
            $('.field-refugee-custom_language').parent().fadeIn('slow');
        }else{
            $('.field-refugee-custom_language').parent().fadeOut('slow');
        }
    }).change();

    $('#refugee-has_work_permit').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-arrested_due_to_lack_of_work_permit, .field-refugee-interested_in_work_permit, .field-refugee-interested_in_citizenship').fadeOut('slow');
        }else{
            $('.field-refugee-arrested_due_to_lack_of_work_permit, .field-refugee-interested_in_work_permit, .field-refugee-interested_in_citizenship').fadeIn('slow');
        }
    }).change();

    $('#refugee-has_disability').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-disability_type_id').parent().fadeIn('slow');
        }else{
            $('.field-refugee-disability_type_id').parent().fadeOut('slow');
        }
    }).change();;

    $('#refugee-disability_type_id').on('change', function(){
        if($('#refugee-disability_type_id option[value=0]:selected').length > 0){
            $('.field-refugee-disability_desc').parent().fadeIn('slow');
        }else{
            $('.field-refugee-disability_desc').parent().fadeOut('slow');
        }
    }).change();;

    $('#refugee-victim_of_turture').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-form_of_torture_id').parent().fadeIn('slow');
        }else{
            $('.field-refugee-form_of_torture_id').parent().fadeOut('slow');
        }
    }).change();;

    $('#refugee-form_of_torture_id').on('change', function(){
        if($('#refugee-form_of_torture_id option[value=0]:selected').length > 0){
            $('.field-refugee-form_of_torture').parent().fadeIn('slow');
        }else{
            $('.field-refugee-form_of_torture').parent().fadeOut('slow');
        }
    }).change();;

    $('#refugee-source_of_info_id').on('change', function(){
        if(this.value == 0){
            $('.field-refugee-source_of_info_abt_rck').parent().fadeIn('slow');
        }else{
            $('.field-refugee-source_of_info_abt_rck').parent().fadeOut('slow');
        }
    }).change();;

    $('#refugee-source_of_income_id').on('change', function(){
        if($('#refugee-source_of_income_id option[value=0]:selected').length > 0){
            //$('.field-refugee-source_of_income').fadeIn('slow');
        }else{
            //$('.field-refugee-source_of_income').fadeOut('slow');
        }
    }).change();;

    

    //$('#refugee-asylum_status').change();
    //$('#refugee-asylum_status').selectmenu('refresh', true);
    
JS;

$this->registerJs($script);
