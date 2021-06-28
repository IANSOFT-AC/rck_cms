<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Lawyer;
use app\models\Magistrate;
use app\models\CourtProceeding;
use app\models\Counsellors;
use app\models\CourtCaseCategory;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-cases-form">

    <?php $form = ActiveForm::begin([
            'enableClientValidation' => true,
            'encodeErrorSummary' => false,
            'errorSummaryCssClass' => 'help-block']); ?>

    <div class="card">
        <div class="card-header"><h5 class="card-title">Court Case</h5></div>
        <div class="card-body">

            <?= $form->errorSummary($model)   ?>

            <!--Case Type Drop Down-->
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'court_case_category_id')->dropDownList($courtCaseCategories,
                        ['prompt' => '-- Choose Court Category --']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                        <?= $form->field($model, 'court_case_number')->textInput() ?>

                        <?= $form->field($model, 'court_location')->dropDownList($locations,['prompt' => 'Select ...']) ?>

                        <?= $form->field($model, 'court_id')->dropDownList($courts,['prompt' => 'Select ...']) ?>


                        <?= $form->field($model, 'court_number')->textInput() ?>

                        <?= $form->field($model, 'first_instance_interview')->textarea(['rows' => 2]) ?>

                        <?= $form->field($model, 'court_proceeding_id')->dropDownList($natureOfProceedings,
                            ['prompt' => '-- Nature of Proceeding --']) ?>

                        <?= $form->field($model, 'case_details')->textarea(['rows' => 2]) ?>

                        <?= $form->field($model, 'date_of_court_appearance')->textInput(['type' => 'date']) ?>

                        <?= $form->field($model, 'interpreter_required')->dropDownList([0 => 'No', 1 => 'Yes'],['prompt' => 'Select']) ?>

                        <?= $form->field($model, 'interpreter_language')->dropDownList($languages,['prompt' => 'Select...']) ?>


                        <?= $form->field($model, 'case_referer')->dropDownList($case_referer,['prompt' => 'Select...']) ?>

                        <?= $form->field($model, 'prosecutor_name')->textInput(['maxlength' => 100]) ?>



                        
                </div>
                <div class="col-md-6">

                    <?= $form->field($model, 'contacts')->textInput(['maxlength' =>  '15']) ?>

                    <?= $form->field($model, 'magistrate')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'legal_officer_id')->dropDownList($lawyers,
                        ['prompt' => '-- Choose Legal Office --']) ?>

                    <?= $form->field($model, 'counsellor_id')->dropDownList($counsellors,
                        ['prompt' => '-- Choose Counsellor --']) ?>

                    <?= $form->field($model, 'case_status')->dropDownList(['open' => 'Open', 'closed' => 'Closed'],
                        ['prompt' => '-- Select Case Status --']) ?>

                    <?= $form->field($model, 'next_court_date')->textInput(['type' => 'date','class' => 'form-control no-past']) ?>

                    <?= $form->field($model, 'case_outcome_id')->dropDownList( $outcomes,
                        ['prompt' => '-- Select Case Status --']) ?>

                    <?= $form->field($model, 'outcome_details')->textarea(['rows' => 2]) ?>

                    <?= $form->field($model, 'nature_of_sentence_id')->dropDownList( $sentences,
                        ['prompt' => 'Select ...']) ?>

                    <?= $form->field($model, 'no_of_refugees')->textInput() ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'offence_type')->dropDownList([1 => 'Civil',2 => 'Criminal'],['prompt' => '--Offence Type? --'//after prompt
                        ,'onchange'=>'
                                    $.get( "'.Url::toRoute('court-cases/catlists').'", { id: $(this).val() } )
                                                .done(function( data )
                                        {
                                            $( "select#courtcases-offence_id" ).html( data );
                                        });
                                    ']) ?>

                    <?= $form->field($model, 'offence_id')->dropDownList($offences,
                        ['prompt' => '-- Choose Offence --']) ?>

                    <?= $form->field($model, 'offence')->textInput(['maxlength' => true]) ?>






                    <?= $form->field($model, 'date_of_arrainment')->textInput(['type' => 'date','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->date_of_arrainment, 'yyyy-MM-dd')]) ?>




                        <?= $form->field($model, 'legal_officer')->textInput() ?>



                        <?= $form->field($model, 'counsellor')->textInput() ?>





                        <?php $form->field($model, 'court_case_subcategory_id')->dropDownList([],['prompt' => '--Select SubCategory']) ?>

                        <?php 
                                echo $form->field($model, 'refugee_id')->hiddenInput(['value' => $model->isNewRecord ? null : $model->refugee_id ])->label(false); 
                        ?>

                </div>
            </div>
        </div>
        <div class="card-footer">
            
        </div>
    </div>

    <section id="general" class="my-3">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">General Case Information</div>
            </div>
            <div class="card-body">
                <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'gender')->dropDownList($gender,['prompt' => 'Select ....']) ?>

                            <?= $form->field($model, 'nationality_id')->dropDownList($nationalities,['prompt' => 'Select ....']) ?>

                            <?= $form->field($model, 'age')->textInput(['type' => 'number']) ?>

                            <?= $form->field($model, 'contact_details')->textarea(['rows' => 2]) ?>

                            <?= $form->field($model, 'asylum_status')->dropDownList($asylum_status,['prompt' => 'Select ....']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'id_number')->textInput(['maxlength' => 30]) ?>

                            <?= $form->field($model, 'physical_address')->textInput() ?>

                            <?= $form->field($model, 'camp_id')->dropDownList($camps,['prompt' => 'Select ....']) ?>

                            <?= $form->field($model, 'block_no')->textInput() ?>

                            <?= $form->field($model, 'plea_status')->dropDownList($pleas,['prompt' => 'Select ....']) ?>
                        </div>

                 </div>
            </div>
        </div>
    </section>

    <!--SGBV-->

    <section id="sgbv" class="my-3">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">SGBV Specific Case Information</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">


                        <?= $form->field($model, 'complainant_name')->textInput(['maxlength' => 100]) ?>

                        <?= $form->field($model, 'bond_or_bail_amount')->textInput(['type' => 'number']) ?>


                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'name_of_accused')->textInput(['maxlength' => 100]) ?>
                        <?= $form->field($model, 'rck_representation_id')->dropDownList($sgbvRepresentation,['prompt' => 'Select ....']) ?>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!--Immigration-->


    <section id="immigration" class="my-3">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Immigration / Documentation Specific Case Information</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">


                        <?= $form->field($model, 'date_of_arrest')->textInput(['type' => 'date']) ?>

                        <?= $form->field($model, 'place_of_arrest')->textInput() ?>


                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'date_of_arraignment')->textInput(['type' => 'date']) ?>


                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="child_custody" class="my-3">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Child Custody Specific Case Information</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">


                        <?= $form->field($model, 'name_of_respondent')->textInput() ?>




                    </div>
                    <div class="col-md-6">

                        <?= $form->field($model, 'rck_representation_id')->dropDownList($childRepresentation,['prompt' => 'Select ....','id' => 'child']) ?>


                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="form-group p-2">
        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> Next'), ['class' => 'btn btn-success']); ?>
        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </div>

    <?php 

    ActiveForm::end(); 
   

    ?>

</div>

<?php

$script = <<<JS

    $('.field-courtcases-name, \
    .field-courtcases-next_court_date, \
    .field-courtcases-offence, \
    .field-courtcases-legal_officer,\
    .field-courtcases-counsellor').fadeOut();

    $('#courtcases-offence_id').on('change', function(){
        if($('#courtcases-offence_id option[value=0]:selected').length > 0){
            $('.field-courtcases-offence').fadeIn('slow');
        }else{
            $('.field-courtcases-offence').fadeOut('slow');
        }
    }).change();

    $('#courtcases-legal_officer_id').on('change', function(){
        if($('#courtcases-legal_officer_id option[value=0]:selected').length > 0){
            $('.field-courtcases-legal_officer').fadeIn('slow');
        }else{
            $('.field-courtcases-legal_officer').fadeOut('slow');
        }
    }).change();

    $('#courtcases-counsellor_id').on('change', function(){
        if($('#courtcases-counsellor_id option[value=0]:selected').length > 0){
            $('.field-courtcases-counsellor').fadeIn('slow');
        }else{
            $('.field-courtcases-counsellor').fadeOut('slow');
        }
    }).change();

    $('#courtcases-no_of_refugees').on('focusout', function(e){
        if(e.target.value > 1){
            $('.field-courtcases-name').fadeOut('slow')
        }else{
            $('.field-courtcases-name').fadeIn('slow')
        }
    }).change();

    $('#courtcases-case_status').on('change', function(e){
        if(e.target.value == "open"){
            $('.field-courtcases-next_court_date').fadeIn('slow')
        }else{
            $('.field-courtcases-next_court_date').fadeOut('slow')
        }
    }).change();
    
    
    // Handle Court Case Category selection
    $('#general,#sgbv,#immigration,#child_custody').hide();
    $('#courtcases-court_case_category_id').on('change',function(){
        // let selectedOpt = $('#courtcases-court_case_category_id option:selected').text();
        let selectedOpt = $(this).val();
        console.log(selectedOpt);
        
        if(selectedOpt == 1) {
            $('#general').show();
           
        }else {
            $('#general').hide();
        } 
        if(selectedOpt == 2) {
            $('#sgbv').show(); 
        }else{
             $('#sgbv').hide();
        }
        if(selectedOpt == 3) {
            $('#child_custody').show(); 
        }else{
             $('#child_custody').hide();
        }
        if(selectedOpt == 4) {
            $('#immigration').show(); 
        }else {
            $('#immigration').hide();
        }
        
    });
JS;

$this->registerJs($script);
?>
