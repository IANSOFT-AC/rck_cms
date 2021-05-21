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
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'organizer')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-6">
                <?= $form->field($model, 'type')->dropDownList($trainingTypes,['prompt' => '-- Select Type of Training? --']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'donor')->dropDownList($donors,['prompt' => '-- Select the Donor? --']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'date')->textInput(['type' => 'date','class' => 'form-control no-future','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->date, 'yyyy-MM-dd')]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'rck_office_id')->dropDownList($offices,['prompt' => '-- Select RCK Office? --']) ?>
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
                <?= $form->field($model, 't0_9')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 't10_19')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 't20_24')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 't25_59')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 't60plus')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'boys')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'girls')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'men')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'women')->textInput() ?>
            </div>
            <div class="col-md-6">
                <div class="custom-file">
                    <?= $form->field($model, 'participants_scan',[
                        'options' => [
                            'class' => 'custom-file has-icon has-label',
                        ],
                        'labelOptions' => [ 'class' => 'custom-file-label' ]
                    ])->fileInput(['class' => 'custom-file-input']) ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-file">
                    <?= $form->field($model, 'photos[]',[
                        'options' => [
                            'class' => 'custom-file has-icon has-label',
                        ],
                        'labelOptions' => [ 'class' => 'custom-file-label','value' => 'photos' ]
                    ])->fileInput(['multiple'=> true, 'class' => 'custom-file-input uploadform-imagefile'])->label('Photos') ?>
                </div>
            </div>

            <?php $form->field($model, 'created_by')->textInput() ?>

            <?php $form->field($model, 'updated_by')->textInput() ?>

            <?php $form->field($model, 'created_at')->textInput() ?>

            <?php $form->field($model, 'updated_at')->textInput() ?>

            <div class="form-group mx-sm-3 mb-2 mt-3 col-md-12 pull-right">
                <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
                <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<!--Add Lines-->
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="lead text-center">Additional Training Data</h2>
            </div>
            <div class="card-body">

                <div class="row"><!--Start Line row-->
                    <div class="col-md-6">

                        <!--Client Type BD div-->

                        <div id="client Type">

                            <p class="lead text-center">Client Type Lines</p>

                            <?= Html::a('<i class="fa fa-plus-square"></i> Add',['training-client-type-line/create','iid' => $model->id],['class' => 'btn btn-sm btn-warning add text-white']) ?>



                            <table class="table my-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Type</th>
                                    <th>Number (Attendance)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($model->clienttype)): ?>

                                    <?php $i=0; foreach($model->clienttype as $ln): ++$i; ?>

                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ln->type->name ?></td>
                                            <td><?= $ln->number ?></td>
                                            <td>
                                                <?= Html::a('<i class="fa fa-edit"></i>',['training-client-type-line/update','id' => $ln->id],['class' => 'btn btn-sm btn-outline-primary add']) ?>
                                                <?= Html::a('<i class="fa fa-trash"></i>',['training-client-type-line/delete','id' => $ln->id],['class' => 'btn btn-sm btn-outline-danger delete','data' => [
                                                    'params' => ['id' => $ln->id],
                                                    'confirm' => 'Are you sure you want to delete this record? ',
                                                    'method' => 'post']]) ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!--Client Type BD div-->


                    </div><!--/col one-->
                    <div class="col-md-6">



                        <!--Nationality BD div-->

                        <div id="Nationality">

                            <p class="lead text-center">Nationality Break Down Lines</p>

                            <?= Html::a('<i class="fa fa-plus-square"></i> Add',['training-client-nationality-lines/create','iid' => $model->id],['class' => 'btn btn-sm btn-warning add text-white']) ?>



                            <table class="table my-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nationality</th>
                                    <th>Number (Attendance)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($model->nationality)): ?>

                                    <?php $i=0; foreach($model->nationality as $n): ++$i; ?>

                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $n->country->country ?></td>
                                            <td><?= $n->number ?></td>
                                            <td>
                                                <?= Html::a('<i class="fa fa-edit"></i>',['training-client-nationality-lines/update','id' => $n->id],['class' => 'btn btn-sm btn-outline-primary add']) ?>
                                                <?= Html::a('<i class="fa fa-trash"></i>',['training-client-nationality-lines/delete','id' => $n->id],['class' => 'btn btn-sm btn-outline-danger delete','data' => [
                                                    'params' => ['id' => $n->id],
                                                    'confirm' => 'Are you sure you want to delete this record? ',
                                                    'method' => 'post']]) ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!--Nationality BD div-->

                        <!--M&E Uploads-->


                        <div id="uploads">

                            <p class="lead text-center">M&E Documents</p>

                            <?= Html::a('<i class="fa fa-plus-square"></i> Add',['training-attachment-lines/create','iid' => $model->id],['class' => 'btn btn-sm btn-warning add text-white']) ?>


                            <div class="table-responsive">
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
                                    <?php $i=0; if(is_array($model->documents)):  ++$i; ?>

                                        <?php foreach($model->documents as $doc): ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $doc->description ?></td>
                                                <td><?= $doc->creator->username ?></td>
                                                <td><?= date('Y-m-d H:i:s',$doc->created_at) ?></td>
                                                <td>
                                                    <?= Html::a('<i class="fa fa-eye"></i>',['training/read','id' => $doc->id],['class' => 'btn btn-sm btn-outline-info']) ?>
                                                    <?= Html::a('<i class="fa fa-edit"></i>',['training-attachment-lines/update','id' => $doc->id],['class' => 'btn btn-sm btn-outline-primary add']) ?>
                                                    <?= Html::a('<i class="fa fa-trash"></i>',['training-attachment-lines/delete','id' => $doc->id],['class' => 'btn btn-sm btn-outline-danger delete','data' => [
                                                        'params' => ['id' => $doc->id],
                                                        'confirm' => 'Are you sure you want to delete this record? ',
                                                        'method' => 'post']]) ?>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <!--/ M&E Uploads-->


                    </div><!--/col Two-->
                </div><!--End card row-->

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
                    <h4 class="modal-title" id="myModalLabel" style="position: absolute">Training Management</h4>
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

    //Hide fields initially
    $('.field-training-donor, .field-training-type, .field-training-organizer').parent().hide()

    $('#training-organizer_id').on('change', function(){
        if(this.value == 0){
            $('.field-training-organizer').parent().fadeIn('slow');
        }else{
            $('.field-training-organizer').parent().fadeOut('slow');
        }

        if(this.value == 1){
            $('.field-training-donor, .field-training-type').parent().show()
        }else{
            $('.field-training-donor, .field-training-type').parent().hide()
        }
    });

    $('#training-participants_scan').on('change', function() {
        var file = $(this)[0].files[0].name;
        let title = $(this).siblings( "label" ).text();
        $(this).siblings( "label" ).text(" ("+ file + ") File selected");
    });

    $('#training-photos').on('change', function() {
        let count =0
        count = $(this)[0].files.length;
        var file = $(this)[0].files[0].name;
        let title = $(this).siblings( "label" ).text();
        file = (count == 1) ? file : count
        $(this).siblings( "label" ).text(" ("+ file + ") File selected");
    });
    
    
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

JS;

$this->registerJs($script);