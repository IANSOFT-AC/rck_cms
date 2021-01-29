<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="training-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                  <h3 class="box-title" data-speechify-sentence="">About This Training</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Organizer</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->organizer ?>
                        </p>
                        <hr>
                    </div>
                  
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-venus-mars"></i> Date</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?=  date("l M j, Y",$model->date) ?>
                        </p>
                        <hr>
                    </div> 
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="far fa-address-book"></i> Topic</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->topic ?>
                        </p>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Venue</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->venue ?>
                        </p>
                        <hr>
                    </div> 
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Facilitators</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->facilitators ?>
                        </p>
                        <hr>
                    </div>  
                    <div class="col-md-6">
                        <strong data-speechify-sentence="">  No. of Participants</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->no_of_participants ?>
                        </p>
                        <hr>
                    </div>  
                    
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""><i class="fas fa-calendar-day"></i> Created On</strong>

                      <p data-speechify-sentence=""><?= date("H:ia l M j, Y",$model->created_at)?></p>
                    </div>

                    <div class="col-md-12">
                      <strong data-speechify-sentence=""><i class="fas fa-calendar-day"></i> Participants</strong>

                      <p data-speechify-sentence=""><img src="/uploads/training/<?= $model->participants_scan ?>" width="300px"></p>
                    </div>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>

    <?php if(count($model->trainingUploads) > 0){ ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Files</h4>
            </div>
            <div class="card-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title" data-speechify-sentence="">Uploads for this Training</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body row" data-read-aloud-multi-block="true">
                        <?php
                        foreach ($model->trainingUploads as $file) {
                        ?>
                            <div class="col-md-6">
                                <strong data-speechify-sentence=""><i class="fas fa-file"></i> </strong>

                                <p class="text-muted" data-speechify-sentence="">
                                    <?= Html::a('Preview Document: '.$file->filename, ['/uploads/multiple/training/'.$file->filename], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
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
