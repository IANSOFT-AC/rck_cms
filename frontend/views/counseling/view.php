<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Counseling */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="counseling-view">
    <div class="card">
        <div class="card-header">


            <p>
                <?= Html::a(Yii::t('app', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
                <button type="button" class="btn bg-maroon margin" style="" id="print"><i class="nav-icon fa fa-print"></i> Print</button>
            </p>
        </div>
        <div class="card-body print">
          <p><img src="/images/rck-logo.jpg" width="50px" class="print-logo">
          <h1>Counseling Session: <?= Html::encode($this->title) ?></h1></p>
          <hr>
            <div class="row">
                <div class="col-md-6">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('code') ?> </strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->code ?></p>
                </div>
                <div class="col-md-6">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('date') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?=  date("l M j, Y",$model->date) ?></p>
                </div>
                <div class="col-md-6">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('case_status') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->case_status ?></p>
                </div>
                <div class="col-md-6">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('next_appointment_date') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?=  date("l M j, Y",$model->next_appointment_date) ?></p>
                </div>
                <div class="col-md-6">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('session') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->session ?></p>
                </div>
                <div class="col-md-6">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('type') ?></strong>
                    <p class="text-muted" data-speechify-sentence="">
                      <?= $model->counselingType  ?></p>
                </div>
                <div class="col-md-12">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('presenting_problem') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->presenting_problem ?></p>
                </div>
                <div class="col-md-12">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('therapeutic') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->therapeutic ?></p>
                </div>
                <div class="col-md-12">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('conseptualization') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->conseptualization ?></p>
                </div>
                <div class="col-md-12">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('intervention') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->intervention ?></p>
                </div>
                <div class="col-md-12">
                    <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('counsellors') ?></strong>
                    <p class="text-muted" data-speechify-sentence=""><?= $model->counsellors ?></p>
                </div>

                <?php

                if($model->type != 1){
                ?>
                    <div class="col-md-12">
                      <strong data-speechify-sentence=""><?= $model->getAttributeLabel('other_clients') ?></strong>
                      <?php
                        foreach ($model->otherClients as $key => $value) {
                          // code...
                          ?><span class="label label-default"><?php
                          echo Html::a(Yii::t('app', $value->fullDetails), ['/refugee/view', 'id' => $value->id], ['class' => 'btn btn-default m-1 btn-sm']) ;
                          ?></span><?php
                        }
                      ?>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('session_goals') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->session_goals ?></p>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('key_tasks_achieved') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->key_tasks_achieved ?></p>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('challenges_emerging') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->challenges_emerging ?></p>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('interventions_by_facilitator') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->interventions_by_facilitator ?></p>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('achievement_of_goals') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->achievement_of_goals ?></p>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('stage') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->stage ?></p>
                    </div>
                    <div class="col-md-12">
                        <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('remarks') ?></strong>
                        <p class="text-muted" data-speechify-sentence=""><?= $model->remarks ?></p>
                    </div>
                <?php
                }
                ?>
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
