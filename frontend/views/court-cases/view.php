<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="court-cases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Court Case Proceedings'), ['/court-case-proceeding\list', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'View Client Biodata'), ['/refugee\view', 'id' => $model->refugee_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card">
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

                      <p class="text-muted" data-speechify-sentence=""><?= $model->offence ?></p>

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

                      <p class="text-muted" data-speechify-sentence=""><?= $model->legalOfficer->lawfirmName ?></p>

                      <hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <i class="fas fa-pills"></i> Counsellor</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->counsellor->counsellor ?></p>

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
                            <strong data-speechify-sentence=""><i class="fas fa-file"></i> <?= $file->courtUploads->name ?></strong>

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
