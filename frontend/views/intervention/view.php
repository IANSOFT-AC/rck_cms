<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\InterventionType;
use app\models\Casetype;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */

$this->title = $model->client->first_name.' '.$model->client->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['refugee/view', 'id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['client','id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title];
\yii\web\YiiAsset::register($this);
?>
<div class="intervention-view">

    <div class="card card-primary m-2">
        <div class="card-header">

            <div class="card-title">
                <p class="lead text-left"><?= Html::encode($this->title) ?></p>
            </div>


            <div class="card-tools">
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Attachments', ['files', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
                    <?php Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <button type="button" class="btn bg-maroon margin" style="" id="print"><i class="nav-icon fa fa-print"></i> Print</button>
                    <?php

                    $interventions = explode(",", $model->intervention_type_id);
                    foreach ($interventions as $key => $value) {
                        # code...
                        if(InterventionType::findOne($value)->id == 2){
                            echo  Html::a('<i class="fa fa-wheelchair"></i> Counselling ', ['/counseling/index', 'id' => $model->id ], ['class' => 'btn btn-danger m-1', 'title'=> 'Counselling details']);
                        }else if(InterventionType::findOne($value)->id == 4){
                            echo  Html::a('<i class="fa fa-security"></i> Security Interview ', ['/security-interview/index', 'id' => $model->id ], ['class' => 'btn btn-warning m-1',  'title'=> 'Security Interview     ']);
                        }
                    }

                    ?>

                </p>
            </div>

        </div>
        <div class="card-body print">
          <div class="box-header with-border">
                    <img src="/images/rck-logo.jpg" width="50px" class="print-logo">
                      <h3 class="box-title" data-speechify-sentence="">About This Intervention Case</h3>
                  </div>
            <div class="box box-primary">

            <!-- /.box-header -->
                <div class="box-body row" data-read-aloud-multi-block="true">
                    <div class="col-md-6">
                        <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Case Type</strong>

                        <p class="text-muted" data-speechify-sentence="">
                            <?php
                                $cases = explode(",", $model->case_id);
                                foreach ($cases as $key => $value) {
                            ?>
    	                    <li>
                                <?php
                                    echo Casetype::findOne($value)->type;
                                ?>
                            </li>
                            <?php } ?>
                        </p>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Created At</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= date("H:ia l M j, Y",$model->created_at)?></p>

                      <br>
                    </div>

                    <div class="col-md-6">
                        <strong data-speechify-sentence=""> Interventions</strong>
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
                             }else if(InterventionType::findOne($value)->id == 4){
                                echo Html::a('Security Interview Assessment ', ['/security-interview/index', 'id' => $model->id ], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> 'Security Interview Assessment details']);
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
                            <strong data-speechify-sentence=""> Police Case</strong>

                          <p><?= Html::a('Link to Police Case', ['police-cases/view', 'id' => $model->police_case], ['class' => 'profile-link']) ?></p>

                          <br>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if($model->office_id){
                        ?>
                        <div class="col-md-6">
                            <strong data-speechify-sentence=""><i class="fas fa-office"></i> RCK Office Relocation</strong>

                          <p><?= $model->office->name ?></p>

                          <br>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if(!is_null($model->agency_id)){
                        ?>
                        <div class="col-md-6">
                            <strong data-speechify-sentence=""><i class="fas fa-office"></i> Referred Agency</strong>

                          <p><?php //$model->agency->name ?></p>

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
                        <strong data-speechify-sentence=""> Situation Description</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->situation_description?></p>

                      <br>
                    </div>



                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> Intervention Details</strong>

                      <p class="text-muted" data-speechify-sentence=""><?= $model->intervention_details?></p>

                      <br>
                    </div>


            <!-- /.box-body -->
            </div>
        </div>
    </div>




     <!--Lines Cards-->


        <!--Budget Lines div-->

<?php if($model->case_id == 15): ?>
        <div class="card card-primary m-2" id="budgetlines">

            <div class="card-header">
                <p class="lead text-center">Social Assistance Disbursement Lines</p>
            </div>
            <div class="card-body">
                <table class="table my-2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Year</th>
                        <th>Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($model->budget)): ?>

                        <?php $i=0; foreach($model->budget as $ln): $i++; ?>

                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $ln->year ?></td>
                                <td><?= $ln->amount ?></td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

<?php endif; ?>
        <!--Budget Lines div-->


        <!--Progress Lines-->

        <div class="card card-primary m-2" id="progresslines">
            <div class="card-header">
                <p class="lead text-center">Intervention Progress Lines</p>
            </div>
            <div class="card-body">
                <table class="table my-2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Progress</th>
                        <th>Date Created</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; if(is_array($model->progress)):  ?>

                        <?php foreach($model->progress as $pro):  ++$i; ?>

                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $pro->progress_update ?></td>
                                <td><?= date('Y-m-d H:i:s',$pro->created_at) ?></td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!--/ Progress Lines-->

        <!--Vulnerability Assessment Uploads-->


        <div class="card card-primary m-2" id="vul-uploads">
            <div class="card-header">
                <p class="lead text-center">Vulnerability Assement Uploads</p>
            </div>

            <table class="table my-2">
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


        <!--/ Vulnerability Asssment Lines-->

    <?php if(count($model->interventionAttachments) > 0){ ?>
        <div class="card card-primary m-2">
            <div class="card-header">
                <p class="lead text-md-center">Files</p>
                <h2 class="card-subtitle text-sm-center">Other Intervention Related Uploads</h2>
            </div>
            <div class="card-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title" data-speechify-sentence="">Uploads for this </h3>
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
         return true;
    }
JS;

$this->registerJs($script);
