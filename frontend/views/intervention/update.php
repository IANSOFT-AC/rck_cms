<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */

$this->title = 'Update Intervention: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['refugee/view', 'id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['client','id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id];
?>
<?php
/*if(Yii::$app->session->hasFlash('info')){
    print ' <div class="alert alert-info alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
 ';
    echo Yii::$app->session->getFlash('info');
    print '</div>';
}else if(Yii::$app->session->hasFlash('error')){
    print ' <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-times"></i> Error!</h5>
                                ';
    echo Yii::$app->session->getFlash('error');
    print '</div>';
}*/
?>
<div class="intervention-update">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'cases' => $cases,
        'client' => $client,
        'interventionType'=> $interventionType,
        'police_cases' => $police_cases,
        'court_cases' => $court_cases,
        'rck_offices' => $rck_offices,
        'agencies' => $agencies,
        'sgbvTypes' => $sgbvTypes,
        'legalRepresentation' => $legalRepresentation
    ]) ?>

</div>
