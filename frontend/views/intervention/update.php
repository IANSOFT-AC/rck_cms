<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */

$this->title = 'Update Intervention: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="intervention-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cases' => $cases,
        'clients' => $clients,
        'interventionType'=> $interventionType,
        'police_cases' => $police_cases,
        'court_cases' => $court_cases
    ]) ?>

</div>
