<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */

$this->title = "RCK: ".$model->fullNames;
$this->params['breadcrumbs'][] = ['label' => 'Client Biodata', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View Biodata', 'url' => ['view']];
\yii\web\YiiAsset::register($this);
?>
<div class="refugee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('view All', ['index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
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
                                  <strong data-speechify-sentence=""> NHCR Case No</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->nhcr_case_no ?></p>

                                  <hr>
                            </div>

                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> RCK No</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->rck_no ?></p>

                                  <hr>
                            </div>

                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> D.O.B</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->date_of_birth ?></p>

                                  <hr>
                            </div>

                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Identification Type</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->idType->identification; ?></p>

                                  <hr>
                            </div>
                            
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Reason for Fleeing</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->rconflict->conflict ?></p>

                                  <hr>
                            </div>

                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Return Refugee</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= ($model->return_refugee == 1 ? "true" : "false") ?></p>

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
                                <div class="col-md-6">
                                      <strong data-speechify-sentence=""> Disability Description</strong>

                                      <p class="text-muted" data-speechify-sentence=""><?= $model->disability_desc ?></p>

                                      <hr>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if($model->asylum_status){
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
                            <?php
                            if($model->victim_of_turture){
                            ?>
                                <div class="col-md-6">
                                      <strong data-speechify-sentence=""> Form of Torture</strong>

                                      <p class="text-muted" data-speechify-sentence=""><?= $model->form_of_torture ?></p>

                                      <hr>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Form of Torture</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->form_of_torture ?></p>

                                  <hr>
                            </div>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Source of Income</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->source_of_income ?></p>

                                  <hr>
                            </div>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Job Details</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= $model->job_details ?></p>

                                  <hr>
                            </div>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Has work permit?</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= ($model->has_work_permit == 1) ? "true" : "false" ?></p>

                                  <hr>
                            </div>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Arrested due to lack of work permit?</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= ($model->arrested_due_to_lack_of_work_permit == 1) ? "true" : "false" ?></p>

                                  <hr>
                            </div>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Interested in getting a work permit?</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= ($model->interested_in_work_permit == 1) ? "true" : "false" ?></p>

                                  <hr>
                            </div>
                            <div class="col-md-6">
                                  <strong data-speechify-sentence=""> Interested in Kenyan citizenship?</strong>

                                  <p class="text-muted" data-speechify-sentence=""><?= ($model->interested_in_citizenship == 1) ? "true" : "false" ?></p>

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
                <div class="card-body">
                    <?= $this->render('_dependant', [
                        'model' => $dependant,
                        'dependants' => $dependants,
                        'relationships' => $relationships,
                        'refugee' => $model
                    ]) ?>
                    <hr>
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
                          <?php
                          foreach ($model->uploads as $file) {
                          ?>
                              <div class="col-md-6">
                                  <strong data-speechify-sentence=""><i class="fas fa-file"></i> <?= $file->upload->desc ?></strong>

                                  <p class="text-muted" data-speechify-sentence="">
                                      <?= Html::a('Preview Document: '.$file->filename, ['/uploads/refugees/'.$file->filename], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
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
JS;

$this->registerJs($script);
