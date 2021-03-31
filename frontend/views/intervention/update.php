<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */

$this->title = 'Update Intervention: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['refugee/view', 'id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['client','id' => $model->client_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id];
?>
<div class="intervention-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cases' => $cases,
        'client' => $client,
        'interventionType'=> $interventionType,
        'police_cases' => $police_cases,
        'court_cases' => $court_cases,
        'rck_offices' => $rck_offices,
        'agencies' => $agencies,
        'sgbvTypes' => $sgbvTypes
    ]) ?>

</div>
