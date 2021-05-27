<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Training */
if( isset($model->rOrganizer->name) && isset($model->tType->name) )
{
    $this->title = ucwords($model->rOrganizer->name.' '.$model->tType->name. ' Training');
}else{
    $this->title = 'Training '.$model->id;
}

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="training-view">

    <div class="card card-primary">
        <div class="card-header">

            <div class="card-title">
                <h2 class="lead text-left"><?= Html::encode($this->title) ?></h2>
            </div>


            <div class="card-tools">
                <?= Html::a(Yii::t('app', '<i class="fa fa-plus-square"></i>'), ['create'], ['class' => 'btn btn-success','title' => 'Add a New Training.']) ?>
                <?= Html::a(Yii::t('app', '<i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary','title' => 'Update a Training.']) ?>
                <?= Html::a(Yii::t('app', '<i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id,'title' => 'Delete a training.'], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this record?'),
                        'method' => 'post',
                    ],
                ]) ?>
                <button type="button" class="btn bg-maroon margin" style="" id="print" title="Print this page"><i class="nav-icon fa fa-print"></i></button>
            </div>
        </div>
        <div class="card-body print">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <img src="/images/rck-logo.jpg" width="50px" class="print-logo">
                  <h3 class="box-title" data-speechify-sentence="">About This Training</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Organizer</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?= ($model->organizer_id == null) ? $model->organizer : $model->rOrganizer->name ?>
                        </p>
                        <hr>
                    </div>

                    <?php if($model->organizer_id == 1){ ?>
                      <?php if($model->donor_id){ ?>
                        <div class="col-md-6">
                          <strong data-speechify-sentence=""><i class="far fa-address-book"></i> <?= $model->getAttributeLabel('donor') ?></strong>

                          <p class="text-muted" data-speechify-sentence="">
                              <?= $model->donor->name ?>
                          </p>
                          <hr>
                      </div>
                      <?php  } ?>
                      <?php if($model->type){ ?>
                      <div class="col-md-6">
                          <strong data-speechify-sentence=""><i class="far fa-address-book"></i> <?= $model->getAttributeLabel('type') ?></strong>

                          <p class="text-muted" data-speechify-sentence="">
                              <?= $model->tType->name ?>
                          </p>
                          <hr>
                      </div>
                      <?php  } ?>
                  <?php  } ?>

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

                      <p data-speechify-sentence=""><?= date("H:ia l M j, Y",$model->created_at)?></p><hr>
                    </div>

                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('t0_9') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->t0_9 ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('t10_19') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->t10_19 ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('t20_24') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->t20_24 ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('t25_59') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->t25_59 ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('t60plus') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->t60plus ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('boys') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->boys ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('girls') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->girls ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('men') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->men ?></p><hr>
                    </div>
                    <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('women') ?></strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->women ?></p><hr>
                    </div>

                    <div class="col-md-12">
                      <strong data-speechify-sentence=""><i class="fas fa-calendar-day"></i> Participants</strong>

                      <p data-speechify-sentence=""><img src="/uploads/training/<?= $model->participants_scan ?>" width="300px"></p>
                    </div>
                </div>
            <!-- /.box-body -->
            </div>
        </div>



       <!--Line Cards-->

        <!--Client Type BD div-->

        <div class="card card-primary m-2" id="client Type">

            <div class="card-header">
                <p class="lead text-center">Client Type Lines</p>
            </div>
            <div class="card-body">
                <table class="table my-2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Type</th>
                        <th>Number (Attendance)</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($model->clienttype)): ?>

                        <?php $i=0; foreach($model->clienttype as $ln): ++$i; ?>

                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $ln->type->name ?></td>
                                <td><?= $ln->number ?></td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!--Client Type BD div-->


        <!--Nationality BD div-->

        <div class="card card-primary m-2" id="Nationality">

            <div class="card-header">
                <p class="lead text-center">Nationality Break Down Lines</p>


            </div>
            <div class="card-body">
                <table class="table my-2 ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nationality</th>
                        <th>Number (Attendance)</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($model->nationality)): ?>

                        <?php $i=0; foreach($model->nationality as $n): ++$i; ?>

                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $n->country->country ?></td>
                                <td><?= $n->number ?></td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!--Nationality BD div-->

        <!--M&E Uploads-->


        <div class="card card-primary m-2" id="uploads">

            <div class="card-header">
                <p class="lead text-center">M&E Documents</p>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table my-2 justify-content-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Created At</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0; if(is_array($model->documents)):   ?>

                            <?php foreach($model->documents as $doc): ++$i; ?>

                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= Html::a('<i class="fa fa-eye"></i> '.$doc->description,['read','id' => $doc->id],['class' => 'btn btn-sm btn-warning']) ?></td>
                                    <td><?= $doc->creator->username ?></td>
                                    <td><?= date('Y-m-d H:i:s',$doc->created_at) ?></td>

                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <!--/ M&E Uploads-->



        <!--/ Line Cards-->




    </div><!--/Main Card-->

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
                                    <?= Html::a(' |<i class="fa fa-trash"></i>',
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
         return false;
    }
JS;

$this->registerJs($script);
