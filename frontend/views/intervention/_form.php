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

        <div class="card-header">
            <h2 class="card-title text-capitalize"><?= Html::encode($this->title) ?></h2>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <?php $class = ($model->isNewRecord)? 'col-md-12': 'col-md-6' ?>

                <div  class="<?= $class ?>" >
                        <div class="col-md-12">
                            <?= $form->field($model, 'case_id[]')->dropDownList($cases,['prompt' => '-- Select Case or Issue --', 'data-live-search' => "true",'class' => 'form-control', 'options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->case_id)]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'sgbv[]')->dropDownList($sgbvTypes,['prompt' => '--Select SGBV Type...','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->sgbv)]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'client_id')->dropDownList($client) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'situation_description')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'intervention_type_id[]')->dropDownList($interventionType,['prompt' => '--Select ...','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->intervention_type_id)]) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'legal_representation_id')->dropDownList($legalRepresentation,['prompt' => '--Select ...','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->legal_representation_id)]) ?>
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

                    <?php ActiveForm::end(); ?><!--/main form-->


                <?php if(!$model->isNewRecord): ?>

                    <div class="col-md-6"> <!--lines sections--->

                        <!--Budget Lines div-->


                        <div id="budgetlines">

                            <div class="card">

                                <div class="card-header">
                                    <div class="card-title display-2 text-center">Social Assistance / Economic Empowerment Disbursement Details</div>

                                    <div class="card-tools">
                                        <?= Html::a('New',['intervention-budget-lines/create','iid' => $model->id],['class' => 'btn btn-sm btn-primary add']) ?>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table my-2">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Year</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($model->budget)): ?>

                                            <?php $i=0; foreach($model->budget as $ln): $i++; ?>

                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $ln->year ?></td>
                                                    <td><?= $ln->amount ?></td>
                                                    <td>
                                                        <?= Html::a('<i class="fa fa-edit"></i>',['intervention-budget-lines/update','id' => $ln->id],['class' => 'btn btn-sm btn-outline-primary add']) ?>
                                                        <?= Html::a('<i class="fa fa-trash"></i>',['intervention-budget-lines/delete','id' => $ln->id],['class' => 'btn btn-sm btn-outline-danger delete','data' => [
                                                            'params' => ['id' => $ln->id],
                                                            'method' => 'post']]) ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


                        <!--Budget Lines div-->

                        <!--Progress Lines-->

                        <div id="progresslines" class="my-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="lead card-title text-center"> Progress Update</div>

                                    <div class="card-tools">
                                        <?= Html::a('New',['intervention-progress-lines/create','iid' => $model->id],['class' => 'btn btn-sm btn-primary add']) ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table my-2">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Progress</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; if(is_array($model->progress)):  $i++; ?>

                                            <?php foreach($model->progress as $pro): ?>

                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $pro->progress_update ?></td>
                                                    <td><?= date('Y-m-d H:i:s',$pro->created_at) ?></td>
                                                    <td>
                                                        <?= Html::a('<i class="fa fa-edit"></i>',['intervention-progress-lines/update','id' => $pro->id],['class' => 'btn btn-sm btn-outline-primary add']) ?>
                                                        <?= Html::a('<i class="fa fa-trash"></i>',['intervention-progress-lines/delete','id' => $pro->id],['class' => 'btn btn-sm btn-outline-danger delete','data' => [
                                                            'params' => ['id' => $pro->id],
                                                            'method' => 'post']]) ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>




                        </div>

                        <!--/ Progress Lines-->

                        <!--Vulnerability Assessment Uploads-->


                        <div id="uploads" class="my-3">

                            <div class="card">
                                <div class="card-header">
                                    <div class="lead card-title text-center">Vulnerability Assement Uploads</div>
                                    <div class="card-tools">
                                        <?= Html::a('New',['intervention-vulnerability-upload-lines/create','iid' => $model->id],['class' => 'btn btn-sm btn-primary add']) ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table my-2">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; if(is_array($model->documents)):  $i++; ?>

                                            <?php foreach($model->documents as $doc): ?>

                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= Html::a('<i class="fa fa-eye mx-1"></i>'.$doc->description,['intervention/read','id' => $doc->id],['class' => 'btn btn-sm btn-outline-info']) ?></td>
                                                    <td><?= $doc->creator->username ?></td>
                                                    <td><?= date('Y-m-d H:i:s',$doc->created_at) ?></td>
                                                    <td>

                                                        <?= Html::a('<i class="fa fa-edit"></i>',['intervention-vulnerability-upload-lines/update','id' => $doc->id],['class' => 'btn btn-sm btn-outline-primary add']) ?>
                                                        <?= Html::a('<i class="fa fa-trash"></i>',['intervention-vulnerability-upload-lines/delete','id' => $doc->id],['class' => 'btn btn-sm btn-outline-danger delete','data' => [
                                                            'confirm' => 'Are you sure you want to delete this file?',
                                                            'params' => ['id' => $doc->id],
                                                            'method' => 'post']]) ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>





                        </div>


                        <!--/ Vulnerability Asssment Lines-->


                    </div>
                <?php endif; ?>
                <!--/ Only Add lines on update-->
                </div>

        </div>
    </div>
</div>


    <!--My Bs Modal template  --->

    <div class="modal fade bs-example-modal-lg bs-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="position: absolute">Intervention Management</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>

            </div>
        </div>
    </div>


<?php

$script = <<<JS

$('#budgetlines').hide();
// $('#progresslines').hide();
$('#uploads').hide();

init();

    //hide initially
    function hideEm(){
        $('.field-intervention-court_case,\
            .field-intervention-police_case,\
            .field-intervention-office_id,\
            .field-intervention-agency_id,\
            .field-intervention-sgbv, .field-intervention-legal_representation_id').parent().fadeOut();
    }
    hideEm();
    
    
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

        if($('#intervention-case_id option[value=16]:selected').length > 0){
            $('.field-intervention-sgbv').parent().fadeIn();
        }else{
            $('.field-intervention-sgbv').parent().fadeOut();
        }
    }).change();

    $('#intervention-intervention_type_id').on('change', function(e){
        //Hide elements on change
        console.log(this.value);
        
        /*Francis update*/
        
        // Only show budget lines if Economic Empowerment or  social assistance is selected
        $('#budgetlines').hide();
        let res = $('#intervention-intervention_type_id').val();
        
        if(res.indexOf("8")>= 0 || res.indexOf("9")>= 0) {
            $('#budgetlines').show();
            // $('#progresslines').show();
        }else{
            $('#budgetlines').hide();
            // $('#progresslines').hide();
        }
        
        // Condition for Vulnerability Assessment Uploads: Councelling only
        
         if(res.indexOf("2")>= 0 ) {
            $('#uploads').show();
            
        }else{
            $('#uploads').hide();
           
        }

        /*End Francis Update*/

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

        if($('#intervention-intervention_type_id option[value=6]:selected').length > 0){
            $('.field-intervention-legal_representation_id').parent().fadeIn('slow')
        }else{
            $('.field-intervention-legal_representation_id').parent().fadeOut()
        }
    }).change();
    
    
    // FRANCIS: Add budget lines
    
    $('.add').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('clicking...');
        $('.modal').modal('show')
                        .find('.modal-body')
                        .load(url); 

     });
    
     
    /*Handle modal dismissal event  */
    
    $('.modal').on('hidden.bs.modal',function(){
        var reld = location.reload(true);
        setTimeout(reld,1000);
    }); 
    /*Initialize logic for lines view display*/
    function init() {
       
        let res = $('#intervention-intervention_type_id').val();
        
        if(res.indexOf("8")>= 0 || res.indexOf("9")>= 0) {
            $('#budgetlines').show();
           // $('#progresslines').show();
        }else{
            $('#budgetlines').hide();
           // $('#progresslines').hide();
        }
        
        // Condition for Vulnerability Assessment Uploads: Councelling only
        
         if(res.indexOf("2")>= 0 ) {
            $('#uploads').show();
            
        }else{
            $('#uploads').hide();
           
        }
    }
    
    
JS;

$this->registerJs($script);
