<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\FormOfTorture;
use app\models\SourceOfIncome;
use app\models\Language;
use app\models\DisabilityType;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */

$this->title = "RCK: ".$model->fullNames;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View'];
\yii\web\YiiAsset::register($this);
?>
<div class="refugee-view card">

    <div class="card-header pr-3">
        <h1 class="card-title lead"><?= Html::encode($this->title) ?></h1>



        <div class="btn-group ml-5">
            <button type="button" class="btn btn-default">Actions</button>
            <button type="button" id="dropdownSubMenu1" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div aria-labelledby="dropdownSubMenu1" class="dropdown-menu" role="menu">
                <?='<li>'. Html::a( '<i class="fa fa-plus"></i> Add Client', ['create'], ['class' => 'dropdown-item']).'</li>' ?>
                <?= Html::a('<i class="fa fa-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                <?= Html::a('<i class="fa fa-hands-helping"></i> Interventions', ['/intervention/client', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                <?= Html::a('<i class="fa fa-balance-scale"></i> Police Cases', ['/police-cases/client', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                <?= Html::a('<i class="fa fa-gavel"></i> Court Cases', ['/court-cases/client', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                <?= Html::a('<i class="fa fa-upload"></i> Attachments', ['files', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                <?= Html::a('<i class="fa fa-eye"></i> view All', ['index'], ['class' => 'dropdown-item']) ?>
            </div>
        </div>


    </div>

    <div class="card-body">
        <div class="row print">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <img src="/images/rck-logo.jpg" width="50px" class="print-logo">
                                <h3 class="box-title" data-speechify-sentence="">About This Client</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body row" data-read-aloud-multi-block="true">
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Name</strong>

                                    <p class="text-muted" data-speechify-sentence="">
                                        <?= $model->first_name. " " .$model->middle_name. " ".$model->last_name ?>
                                    </p>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> RSD appointment date</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->rsd_appointment_date ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> Physical address</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->physical_address ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Languages Spoken</strong>
                                    <div class="btn-group">
                                        <?php
                                        $spoken = explode(",", $model->spoken_languages);
                                        foreach ($spoken as $key => $value) {
                                            # code...
                                            $record = Language::findOne($value);
                                            if($record){
                                                ?>
                                                <button type="button" class="btn btn-default" style="">
                                                    <?= $record->name; ?>
                                                </button>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                    <hr>
                                </div>


                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""><i class="fas fa-exclamation-circle"></i> Phone Number</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->cell_number ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Email</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->email_address ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Is interpreter needed</strong>

                                    <p class="text-muted" data-speechify-sentence="">
                                        <?=
                                        ($model->interpreter == 1) ? '<button type="button" class="btn btn-danger btn-sm" style="">YES</button>' : '<button type="button" class="btn btn-success btn-sm" style="">No</button>';
                                        ?></p>

                                    <hr>
                                </div>

                                <?php
                                $incomes = explode(",", $model->languages);
                                if(!empty($incomes[0])){
                                    ?>
                                    <div class="col-md-6">
                                        <strong data-speechify-sentence=""> Languages That need an Interpreter</strong>
                                        <div class="btn-group">
                                            <?php
                                            foreach ($incomes as $key => $value) {
                                                # code...
                                                $record = Language::findOne($value);
                                                if($record){
                                                    ?>
                                                    <button type="button" class="btn btn-default" style="">
                                                        <?= $record->name; ?>
                                                    </button>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>

                                        <hr>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Dependants</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->dependants ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> NHCR Case No</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->nhcr_case_no ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> RCK Office</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->rckOffice->name ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> RCK No</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->rck_no ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Old RCK No</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->old_rck ?></p>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> D.O.B</strong>
                                    <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->date_of_birth) ?></p>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Identification Type</strong>
                                    <p class="text-muted" data-speechify-sentence=""><?= isset($model->idType) ? $model->idType->identification : "None"; ?></p>
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Reason for Fleeing</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= isset($model->rconflict) ? $model->rconflict->conflict : "None" ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Return Refugee</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= ($model->return_refugee == 1 ? "Yes" : "No") ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Arrival Date</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->arrival_date) ?></p>

                                    <hr>
                                </div>

                                <?php
                                if($model->has_disability){
                                    ?>

                                    <?php
                                    $incomes = explode(",", $model->disability_type_id);
                                    if(!empty($incomes[0])){
                                        ?>
                                        <div class="col-md-6">
                                            <strong data-speechify-sentence=""> Disability</strong>
                                            <?php // print_r($incomes) ?>
                                            <div class="btn-group">
                                                <?php
                                                foreach ($incomes as $key => $value) {
                                                    # code...
                                                    $record = DisabilityType::findOne($value);
                                                    if($record){
                                                        ?>
                                                        <button type="button" class="btn btn-default" style="">
                                                            <?= $record->name; ?>
                                                        </button>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <hr>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="col-md-6">
                                            <strong data-speechify-sentence=""> Disability Description</strong>

                                            <p class="text-muted" data-speechify-sentence=""><?= $model->disability_desc ?></p>

                                            <hr>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Asylum Status </strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->asylumType->name ?></p>

                                    <hr>
                                </div>

                                <?php
                                if($model->asylum_status == 1){
                                    ?>
                                    <div class="col-md-6">
                                        <strong data-speechify-sentence=""> RSD Appointment Date</strong>

                                        <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->rsd_appointment_date) ?></p>

                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong data-speechify-sentence=""> Reason for RSD Appointment</strong>

                                        <p class="text-muted" data-speechify-sentence=""><?= $model->reason_for_rsd_appointment ?></p>

                                        <hr>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> How the client learnt about RCK </strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->source_of_info_abt_rck ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Mode of Entry </strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->modeOfEntry->name ?></p>

                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Torture Manifestation </strong>
                                    <p class="text-muted" data-speechify-sentence=""><?= $model->torture_manifestation ?></p>
                                </div>
                                <?php
                                if($model->victim_of_turture){
                                    ?>
                                    <div class="col-md-6">
                                        <strong data-speechify-sentence=""> Form of Torture</strong>
                                        <div class="btn-group">
                                            <?php

                                            $tortures = explode(",", $model->form_of_torture_id);
                                            foreach ($tortures as $key => $value) {
                                                # code...
                                                ?>
                                                <button type="button" class="btn btn-default" style=""><?php
                                                    $record = FormOfTorture::findOne($value);
                                                    if($record){
                                                        ?>
                                                        <?= $record->name; ?>
                                                        <?php
                                                    }
                                                    ?></button>
                                                <?php
                                            }

                                            ?>
                                        </div>

                                        <hr>
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $incomes = explode(",", $model->source_of_income_id);
                                if(!empty($incomes[0])){
                                    ?>
                                    <div class="col-md-6">
                                        <strong data-speechify-sentence=""> Sources of Income</strong>
                                        <div class="btn-group">
                                            <?php
                                            foreach ($incomes as $key => $value) {
                                                # code...
                                                $record = SourceOfIncome::findOne($value);
                                                if($record){
                                                    ?>
                                                    <button type="button" class="btn btn-default" style="">
                                                        <?= $record->name; ?>
                                                    </button>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>

                                        <hr>
                                    </div>
                                    <?php
                                }
                                ?>


                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Job Details</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= $model->job_details ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Has work permit?</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= ($model->has_work_permit == 1) ? "Yes" : "No" ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Arrested due to lack of work permit?</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= ($model->arrested_due_to_lack_of_work_permit == 1) ? "Yes" : "No" ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Interested in getting a work permit?</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= ($model->interested_in_work_permit == 1) ? "Yes" : "No" ?></p>

                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong data-speechify-sentence=""> Interested in Kenyan citizenship?</strong>

                                    <p class="text-muted" data-speechify-sentence=""><?= ($model->interested_in_citizenship == 1) ? "Yes" : "No" ?></p>

                                    <hr>
                                </div>


                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <!--Add Dependancts-->
                <div class="card">
                    <div class="card-header">
                        <h4>Dependants</h4>
                    </div>
                    <div class="card-body">
                        <?= $this->render('_dependant', [
                            'model' => $dependant,
                            'dependants' => $dependants,
                            'relationships' => $relationships,
                            'refugee' => $model
                        ]) ?>
                        <table id="dependants" class="table">
                            <thead>
                            <th>Id</th>
                            <th>Names</th>
                            <th>Relationship</th>
                            <th>Date Created</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($dependants as $key => $d) {
                                # code...
                                echo "<tr>";
                                echo "<td>".$d->id."</td>";
                                echo "<td>".$d->names."</td>";
                                echo "<td>".$d->relationship->name."</td>";
                                echo "<td>".date("l M j, Y",$d->created_at)."</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php if(count($model->uploads) > 0){ ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Files</h4>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title" data-speechify-sentence="">Uploads for this Client</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body row" data-read-aloud-multi-block="true">

                                    <?php if($model->consent_scan){
                                        echo '<div class="col-md-6">'. Html::a('<i class="fas fa-file"></i> Consent Document',['read','id'=> $model->id],['class' => 'btn btn-info']).'</div>';
                                    }
                                    ?>



                                    <?php
                                    foreach ($model->uploads as $file) {
                                        ?>
                                        <div class="col-md-6">
                                            <strong data-speechify-sentence=""><i class="fas fa-file"></i> <?= (!empty($file->upload->desc) ? $file->upload->desc :"Öther" ) ?></strong>

                                            <p class="text-muted" data-speechify-sentence="">
                                                <?= Html::a('Preview Document: '.$file->filename, [$file->doc_path], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
                                                <?= Html::a(' Delete <i class="fa fa-trash"></i>',
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
                <?php } ?>


            </div>
        </div>
    </div>

</div>

<?php

$script = <<<JS

    $('#dependants').DataTable({
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ],
        order: [[0, "desc"]]
    });

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
