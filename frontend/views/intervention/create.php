<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */


$this->title = 'Create Intervention';
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['client','id' => array_key_first($client)]];
$this->params['breadcrumbs'][] = ['label' => $this->title,'url' => '#'];
?>
<div class="intervention-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'interventionType'=> $interventionType,
        'cases' => $cases,
        'police_cases' => $police_cases,
        'court_cases' => $court_cases,
        'client' => $client
    ]) ?>

</div>


