<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityInterview */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Security Interviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="security-interview-view">
<div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1>

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
        <div class="card-body">
          <div class="card-body print">
            <p><img src="/images/rck-logo.jpg" width="50px" class="print-logo">
            <h1>Security Interview: <?= Html::encode($this->title) ?></h1></p>
            <hr>
              <div class="row">
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('name') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->name ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('sex') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->sex ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('unhcr_case_no') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->unhcr_case_no ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('refugee_no') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->refugee_no ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('nationality') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->nationality ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('telephone') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->telephone ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('dob') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->dob) ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('education_level') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->education_level ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('place_of_birth') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->place_of_birth ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('religion') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->religion ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('names_of_parents') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->names_of_parents ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('siblings') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->siblings ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('ethnicity') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->ethnicity ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('marital_status') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->marital_status ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('dependants') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->dependants ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('reason_for_flight') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->reason_for_flight ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('flight') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->flight ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('life_in_country_of_asylum') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->life_in_country_of_asylum ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('assessment') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->assessment ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('intervention_id') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><a href="/intervention/view?id=<?= $model->intervention_id ?>"><?= $model->intervention->situation_description ?></a></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('dob') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->dob ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('dob') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= $model->dob ?></p>
                  </div>
                  <div class="col-md-6">
                      <strong data-speechify-sentence=""> <?= $model->getAttributeLabel('created_at') ?> </strong>
                      <p class="text-muted" data-speechify-sentence=""><?= date("l M j, Y",$model->created_at) ?></p>
                  </div>
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
