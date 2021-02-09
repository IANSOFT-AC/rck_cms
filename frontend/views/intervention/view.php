<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\InterventionType;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['client','id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
\yii\web\YiiAsset::register($this);
?>
<div class="intervention-view">

    

    <div class="card">
        <div class="card-header">
            <h1 class="header-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <div class="box-header with-border">
                  <h3 class="box-title" data-speechify-sentence="">About This Intervention Case</h3>
                </div>
    </p>
        </div>
        <div class="card-body">
            <div class="box box-primary">
                
            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Case Type</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= $model->casetype->type ?>
                        </p>
                        <br>
                    </div>
                  
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> Created At</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= date("H:ia l M j, Y",$model->created_at)?></p>

                      <br>
                    </div>

                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> Interventions</strong>
                        <ul>
                        <?php 

                        $interventions = explode(",", $model->intervention_type_id);
                        foreach ($interventions as $key => $value) {
                            # code...
                            ?>
                            <li><?php
                             if(InterventionType::findOne($value)->id == 2){
                                ?>
                                <?= Html::a('Counselling ', ['/counseling/index', 'id' => $model->id ], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> 'Counselling details']) ?>
                                <?php
                             }else{
                                echo InterventionType::findOne($value)->intervention_type;
                             }
                             ?></li>
                            <?php
                        }

                        ?>
                        </ul>
                        
                      <br>
                    </div>

                    <?php 
                    if($model->police_case){
                        ?>
                        <div class="col-md-6">
                            <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> Police Case</strong>

                          <p><?= Html::a('Link to Police Case', ['police-cases/view', 'id' => $model->police_case], ['class' => 'profile-link']) ?></p>

                          <br>
                        </div>
                        <?php
                    }
                    ?>

                    <?php 
                    if($model->court_case){
                        ?>
                        <div class="col-md-6">
                            <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> Court Case</strong>

                          <p><?= Html::a('Link to Court Case', ['court-cases/view', 'id' => $model->court_case], ['class' => 'profile-link']) ?></p>

                          <br>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="col-md-12">
                        <strong data-speechify-sentence=""><i class="fas fa-calculator"></i> Situation</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->situation_description?></p>

                      <br>
                    </div>

                    
            <!-- /.box-body -->
            </div>
        </div>
    </div>


    <?php if(count($model->interventionAttachments) > 0){ ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Files</h4>
            </div>
            <div class="card-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title" data-speechify-sentence="">Uploads for this Intervention</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body row" data-read-aloud-multi-block="true">
                        <?php
                        foreach ($model->interventionAttachments as $file) {
                        ?>
                            <div class="col-md-6">
                                <strong data-speechify-sentence=""><i class="fas fa-file"></i> <?=  (!empty($file->upload) ? $file->upload->name :"Öther" ) ?></strong>

                                <p class="text-muted" data-speechify-sentence="">
                                    <?= Html::a('Preview Document: '.$file->filename, [$file->doc_path], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> $file->filename]) ?>
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
