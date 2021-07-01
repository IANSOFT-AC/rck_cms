<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */

$this->title = $model->name;
is_null($model->refugee_id) ? null : $this->params['breadcrumbs'][] = ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = is_null($model->refugee_id) ? ['label' => 'Court Cases', 'url' => ['index']] : ['label' => 'Court Cases', 'url' => ['client', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title];

\yii\web\YiiAsset::register($this);
?>
<div class="court-cases-view">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
      <div class="card-header">
        <h1 class="header-title"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a(Yii::t('app', 'Court Case Updates'), ['/court-case-proceeding\list', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'View Client Biodata'), ['/refugee\view', 'id' => $model->refugee_id], ['class' => 'btn btn-warning']) ?>
            <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Attachments', ['files', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
            <button type="button" class="btn bg-maroon margin" style="" id="print"><i class="nav-icon fa fa-print"></i> Print</button>
        </p>
      </div>
        <div class="card-body print">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <img src="/images/rck-logo.jpg" width="50px" class="print-logo">
                  <h3 class="box-title" data-speechify-sentence="">About This Court Case</h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'court_case_category_id')->dropDownList($courtCaseCategories,
                            ['prompt' => '-- Choose Court Category --','readonly'=>'true','disabled' => true]) ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">

                        <?= $form->field($model, 'court_case_number')->textInput(['readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'court_location')->dropDownList($locations,['prompt' => 'Select ...','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'court_id')->dropDownList($courts,['prompt' => 'Select ...','readonly'=>'true','disabled' => true]) ?>


                        <?= $form->field($model, 'court_number')->textInput(['readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'first_instance_interview')->textarea(['rows' => 2,'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'court_proceeding_id')->dropDownList($natureOfProceedings,
                            ['prompt' => '-- Nature of Proceeding --','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'case_details')->textarea(['rows' => 2,'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'date_of_court_appearance')->textInput(['type' => 'date',
                            'value' =>  Yii::$app->formatter->asDate($model->next_court_date, 'yyyy-MM-dd'),
                            'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'interpreter_required')->dropDownList([0 => 'No', 1 => 'Yes'],['prompt' => 'Select','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'interpreter_language')->dropDownList($languages,['prompt' => 'Select...','readonly'=>'true','disabled' => true]) ?>


                        <?= $form->field($model, 'case_referer')->dropDownList($case_referer,['prompt' => 'Select...','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'prosecutor_name')->textInput(['maxlength' => 100,'readonly'=>'true','disabled' => true]) ?>




                    </div>
                    <div class="col-md-6">

                        <?= $form->field($model, 'contacts')->textInput(['maxlength' =>  '15','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'magistrate')->textInput(['maxlength' => true,'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'legal_officer_id')->dropDownList($lawyers,
                            ['prompt' => '-- Choose Legal Office --','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'counsellor_id')->dropDownList($counsellors,
                            ['prompt' => '-- Choose Counsellor --','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'case_status')->dropDownList(['open' => 'Open', 'closed' => 'Closed'],
                            ['prompt' => '-- Select Case Status --','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'next_court_date')->textInput([
                                'class' => 'form-control no-past',
                                'value' =>  Yii::$app->formatter->asDate($model->next_court_date, 'yyyy-MM-dd'),
                                'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'case_outcome_id')->dropDownList( $outcomes,
                            ['prompt' => '-- Select Case Status --','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'outcome_details')->textarea(['rows' => 2,'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'nature_of_sentence_id')->dropDownList( $sentences,
                            ['prompt' => 'Select ...','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'no_of_refugees')->textInput(['readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'offence_type')->dropDownList([1 => 'Civil',2 => 'Criminal'],['prompt' => '--Offence Type? --'//after prompt
                            ,'readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'offence_id')->dropDownList($offences,
                            ['prompt' => '-- Choose Offence --','readonly'=>'true','disabled' => true]) ?>

                        <?= $form->field($model, 'offence')->textInput(['maxlength' => true,'readonly'=>'true','disabled' => true]) ?>






                        <?= $form->field($model, 'date_of_arrainment')->textInput([
                                'type' => 'date','value' =>  Yii::$app->formatter->asDate($model->date_of_arrainment, 'yyyy-MM-dd'),'readonly'=>'true','disabled' => true]) ?>




                        <?= $form->field($model, 'legal_officer')->textInput(['readonly'=>'true','disabled' => true]) ?>



                        <?= $form->field($model, 'counsellor')->textInput(['readonly'=>'true','disabled' => true]) ?>





                        <?php $form->field($model, 'court_case_subcategory_id')->dropDownList([],['prompt' => '--Select SubCategory']) ?>

                        <?php
                        echo $form->field($model, 'refugee_id')->hiddenInput(['value' => $model->isNewRecord ? null : $model->refugee_id ])->label(false);
                        ?>

                    </div>
                </div>


                <!--General Court Cases -->

                <?php if($model->court_case_category_id == 1): ?>

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

                <?php endif; ?>

                <!--SGBV Cases-->


                <?php if($model->court_case_category_id == 2): ?>
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

                <?php endif; ?>
                <!--Immigration  Cases-->

                <?php if($model->court_case_category_id == 4): ?>
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
                <?php endif; ?>

                <!--Child and Custody cases-->
                <?php if($model->court_case_category_id == 3): ?>
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
                <?php endif; ?>
                <?php

                ActiveForm::end();


                ?>

            </div>
        </div>
    </div>



    <div class="card my-3">
        <div class="card-header">
            <h4 class="card-title">Files</h4>
        </div>
        <div class="card-body">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" data-speechify-sentence="">Uploads for this Court Case</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <?php
                    foreach ($model->uploads as $file) {
                    ?>
                        <div class="col-md-6">
                            <strong data-speechify-sentence=""><i class="fas fa-file"></i>
                            <?php
                              if($file->courtCaseSubcategory || $file->courtUploads){
                                echo isset($file->courtUploads) ? $file->courtUploads->desc : null ;
                                echo isset($file->courtCaseSubcategory) ? $file->courtCaseSubcategory->name : null ;
                              }else{
                                echo "Other";
                              }
                            ?></strong>

                            <p class="text-muted" data-speechify-sentence="">
                                <?= Html::a('Preview Document: '.$file->filename, [$file->doc_path], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
                                <?= Html::a(' | <i class="fa fa-trash"></i>',
                                  ['delete-file', 'id' => $file->id],
                                  [
                                    'title' => 'delete the file?',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                  ]) ?>
                            </p>
                            <hr>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


</div>

<?php

$script = <<<JS

    $("#print").on('click', function(){
      Popup($('.print').html());
    })

    function Popup(data)
    {
         var MainWindow = window.open('', '', 'height=500,width=800');
         MainWindow.document.write('<html><head><title></title>');
         MainWindow.document.write("<link rel=\"stylesheet\" href=\"/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css\" type=\"text/css\"/>");
         MainWindow.document.write("<link rel=\"stylesheet\" href=\"/dist/css/adminlte.css\" type=\"text/css\"/>");
         MainWindow.document.write("<link rel=\"stylesheet\" href=\"/css/custom.css\" type=\"text/css\"/>");
         MainWindow.document.write('</head><body onload="window.print();window.close()">');
         MainWindow.document.write(data);
         MainWindow.document.write('</body></html>');
         MainWindow.document.close();
         setTimeout(function () {
             MainWindow.print();
         }, 500)
         return true;
    }
JS;

$this->registerJs($script);
