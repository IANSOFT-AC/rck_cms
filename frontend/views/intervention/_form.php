<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervention-form">

    <div class="card">

        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'case_id[]')->dropDownList($cases,['prompt' => '-- Select Case or Issue --','multiple'=>'multiple', 'data-live-search' => "true",'class' => 'form-control selectpicker', 'options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->case_id)]) ?>
                </div>  
                <div class="col-md-6">
                    <?= $form->field($model, 'sgbv[]')->dropDownList($sgbvTypes,['prompt' => '--Select SGBV Type...','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->sgbv)]) ?>
                </div>              
                <div class="col-md-6">
                    <?= $form->field($model, 'client_id')->dropDownList($client) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'situation_description')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'intervention_type_id[]')->dropDownList($interventionType,['prompt' => '--Select ...','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->intervention_type_id)]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'intervention_details')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'court_case')->dropDownList($court_cases,['prompt' => '--Select Court Case--']) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'office_id')->dropDownList($rck_offices,['prompt' => 'Select RCK office for Relocation']) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'agency_id[]')->dropDownList($agencies,['prompt' => '--Select the Agency--','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->agency_id)]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'police_case')->dropDownList($police_cases,['prompt' => '--Select Police Case--']) ?>
                </div>                
                <?php $form->field($model, 'created_at')->textInput() ?>

                <?php $form->field($model, 'updated_at')->textInput() ?>

                <?php $form->field($model, 'created_by')->textInput() ?>

                <?php $form->field($model, 'updated_by')->textInput() ?>

                <div class="form-group col-md-12">
                    <?= Html::submitButton('Save <i class="fa fa-check"></i>', ['class' => 'btn btn-success']) ?>
                    <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php

$script = <<<JS

    //hide initially
    function hideEm(){
        $('.field-intervention-court_case,\
            .field-intervention-police_case,\
            .field-intervention-office_id,\
            .field-intervention-agency_id').parent().fadeOut();
    }
    hideEm()

    $('#intervention-case_id').on('change', function(e){
        //Hide elements on change

        //Then make necessary changes
        if($('#intervention-case_id option[value=11]:selected').length > 0){
            $('.field-intervention-court_case').parent().fadeIn('slow')
        }else{
            $('.field-intervention-court_case').parent().fadeOut()
        }
        
        if($('#intervention-case_id option[value=12]:selected').length > 0){
            $('.field-intervention-police_case').parent().fadeIn('slow')
        }else{
            $('.field-intervention-police_case').parent().fadeOut()
        }
    }).change();

    $('#intervention-intervention_type_id').on('change', function(e){
        //Hide elements on change
        console.log(this.value);

        //Then make necessary changes
        if($('#intervention-intervention_type_id option[value=3]:selected').length > 0){
            $('.field-intervention-office_id').parent().fadeIn('slow')
        }else{
            $('.field-intervention-office_id').parent().fadeOut()
        }
        
        if($('#intervention-intervention_type_id option[value=5]:selected').length > 0){
            $('.field-intervention-agency_id').parent().fadeIn('slow')
        }else{
            $('.field-intervention-agency_id').parent().fadeOut()
        }
    }).change();
JS;

$this->registerJs($script);
