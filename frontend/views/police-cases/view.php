<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PoliceCases;
/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = $model->name;
is_null($model->refugee_id) ? null : $this->params['breadcrumbs'][] = ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = is_null($model->refugee_id) ? ['label' => 'Police Cases', 'url' => ['index']] : ['label' => 'Police Cases', 'url' => ['client', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title];
yii\web\YiiAsset::register($this);

?>
<div class="police-cases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Police Case Updates'), ['/police-case-proceeding\list', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Attachments', ['files', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <button type="button" class="btn bg-maroon margin" style="" id="print"><i class="nav-icon fa fa-print"></i> Print</button>
    </p>


    <div class="card">
        <div class="card-body print">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <img src="/images/rck-logo.jpg" width="50px" class="print-logo">
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
                            <?= ($model->police_station_id) ? $model->rPoliceStation->name : $model->policestation ?>
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
                            <?= ($model->offence_id) ? $model->rOffence->name : $model->offence ?>
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
                            <strong data-speechify-sentence=""><i class="fas fa-file"></i> <?= ($file->policeUploads) ? $file->policeUploads->name : "Other" ?></strong>

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
