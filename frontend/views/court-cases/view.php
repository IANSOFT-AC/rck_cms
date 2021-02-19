<?php

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
        </p>
      </div>
        <div class="card-body">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" data-speechify-sentence="">About This Court Case</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Name</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->name ?>
                        </p>
                        <hr>
                    </div>
                  
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> No. of Refugees</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->no_of_refugees ?></p>

                      <hr>
                    </div>

                    <div class="col-md-6">
                      <strong data-speechify-sentence=""><i class="fas fa-exclamation-circle"></i> Offence</strong>

                      <p class="text-muted" data-speechify-sentence="">
                      <?= is_null($model->offence_id) ? $model->offence : $model->rOffence->name ?>
                      </p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                          <strong data-speechify-sentence=""><i class="fas fa-question"></i> First Instance Interview</strong>

                          <p class="text-muted" data-speechify-sentence=""><?= $model->first_instance_interview == 1 ? "true": "false" ?></p>

                          <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""><i class="fas fa-gavel"></i> Magistrate</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->magistrate ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> Court Proceeding</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->courtProceeding->name ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <i class="fas fa-calendar-day"></i> Date of Arrainment</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->date_of_arrainment) ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <i class="fas fa-calendar-day"></i> Next Court Date</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->next_court_date) ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <i class="fas fa-calendar-day"></i> Case Status</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->case_status ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <i class="fas fa-balance-scale"></i> Legal Officer</strong>

                      <p class="text-muted" data-speechify-sentence="">
                        <?= is_null($model->legal_officer_id) ? $model->legal_officer : $model->rLegalOfficer->lawfirmName ?>
                      </p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <i class="fas fa-pills"></i> Counsellor</strong>

                      <p class="text-muted" data-speechify-sentence="">
                      <?= is_null($model->counsellor_id) ? $model->counsellor : $model->rCounsellor->counsellor ?>
                      </p>

                      <hr>
                  </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> </i> Case Category</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->courtCaseCategory->name ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""><i class="fas fa-calendar-day"></i> Created On</strong>

                      <p data-speechify-sentence=""><?= date("H:ia l M j, Y",$model->created_at)?></p>
                    </div>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>



    <div class="card">
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
                                <?= Html::a('Preview Document: '.$file->filename, ['/uploads/court_cases/'.$file->filename], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
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
