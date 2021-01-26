<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PoliceCases;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Police Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
yii\web\YiiAsset::register($this);

?>
<div class="police-cases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


    <div class="card">
        <div class="card-body">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" data-speechify-sentence="">About This Police Case</h3>
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
                        <strong data-speechify-sentence=""><i class="fas fa-venus-mars"></i> Gender</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->gender ?>
                        </p>
                        <hr>
                    </div> 
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="far fa-address-book"></i> Contacts</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->gender ?>
                        </p>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Age</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->age ?>
                        </p>
                        <hr>
                    </div> 
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Police Station</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->policeStation->name ?>
                        </p>
                        <hr>
                    </div>  
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Investigating Officer</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->investigating_officer ?>
                        </p>
                        <hr>
                    </div>  
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Investigating Officer Contacts</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->investigating_officer_contacts ?>
                        </p>
                        <hr>
                    </div> 
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Ob Number</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->ob_number ?>
                        </p>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Ob Details</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->ob_details ?>
                        </p>
                        <hr>
                    </div> 
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Offence</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->offence ?>
                        </p>
                        <hr>
                    </div>  
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Complainant</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->complainant ?>
                        </p>
                        <hr>
                    </div>   
                    <div class="col-md-6">
                          <strong data-speechify-sentence=""><i class="fas fa-question"></i> First Instance Interview</strong>

                          <p class="text-muted" data-speechify-sentence=""><?= $model->first_instance_interview == 1 ? "true": "false" ?></p>

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
                  <h3 class="box-title" data-speechify-sentence="">Uploads for this Police Case</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <?php
                    foreach ($model->uploads as $file) {
                    ?>
                        <div class="col-md-6">
                            <strong data-speechify-sentence=""><i class="fas fa-file"></i> <?= $file->policeUploads->name ?></strong>

                            <p class="text-muted" data-speechify-sentence="">
                                <?= Html::a('Preview Document: '.$file->filename, ['/uploads/police_cases/'.$file->filename], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
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
