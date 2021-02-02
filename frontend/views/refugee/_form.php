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
                    <h3 class="card-title">General Data</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                            <?php $form->field($model, 'user_id')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'user_group_id')->hiddenInput(['value' => 4])->label(false) ?>
                            <?= $form->field($model, 'physical_address')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--Row One-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Personal Data</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'cell_number')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'gender')->dropDownList($gender, ['prompt' => 'Select ...']) ?>
                            <?= $form->field($model, 'arrival_date')->textInput(['type' => 'date']) ?>
                            <?= $form->field($model, 'demography_id')->dropDownList($demographics, ['prompt' => 'Select ...']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'email_address')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'country_of_origin')->dropDownList($countries, ['prompt' => 'select..']) ?>
                            <?= $form->field($model, 'date_of_birth')->textInput(['type' => 'date']) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--Row Two-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Identification Data</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <?= $form->field($model, 'id_type')->dropDownList($IdTypes, ['prompt' => 'Select']) ?>

                            <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">

                            
                            <?= $form->field($model, 'conflict')->dropDownList($conflicts, ['prompt' => 'Select ...']) ?>

                        </div>
                    </div>

                </div>
            </div>
        </div><!--Rwo Three-->



        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">RCK & NHCR details</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <?= $form->field($model, 'nhcr_case_no')->textInput() ?>

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

                            <?= $form->field($model, 'rck_no')->textInput() ?>
                            
                            <?= $form->field($model, 'camp')->dropDownList([], ['prompt' => 'Select']) ?>

                        </div>
                    </div>

                </div>
            </div>
        </div><!--Rwo Three-->


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Asylum</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">


                            <?= $form->field($model, 'asylum_status')->dropDownList(['1' => 'Yes (Seeking Asylum)' , '0' => 'No (Refugee)'],['prompt' => '-- Asylum Status? --']) ?>
                            <?= $form->field($model, 'rsd_appointment_date')->textInput(['type' => 'date']) ?>
                        </div>
                        <div class="col-md-6">
                            

                            <?= $form->field($model, 'reason_for_rsd_appointment')->textarea() ?>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--Rwo Three-->

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Torture, Jobs & Disability</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <?= $form->field($model, 'has_disability')->dropDownList(['1' => 'Yes' , '0' => 'No'],['prompt' => '-- Has Disability? --']) ?>
                            <?= $form->field($model, 'disability_desc')->textarea() ?>

                            <?= $form->field($model, 'victim_of_turture')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Select Yes or No --']) ?>

                            <?= $form->field($model, 'form_of_torture')->textarea() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'source_of_info_abt_rck')->textarea() ?>
                            <?= $form->field($model, 'mode_of_entry_id')->dropDownList($modeOfEntry,['prompt' => '-- Select Mode Of Entry --']) ?>
                        
                            <?= $form->field($model, 'source_of_income')->textInput() ?>
                            <?= $form->field($model, 'job_details')->textarea() ?>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--Rwo Three-->


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Interests and Events</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <?= $form->field($model, 'has_work_permit')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Has work permit? --']) ?>

                            <?= $form->field($model, 'arrested_due_to_lack_of_work_permit')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Has work permit? --']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'interested_in_work_permit')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Has work permit? --']) ?>
                        
                            <?= $form->field($model, 'interested_in_citizenship')->dropDownList([1 => 'Yes',0 => 'No'],['prompt' => '-- Has work permit? --']) ?>
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
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
