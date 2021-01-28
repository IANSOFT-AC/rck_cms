<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */

$this->title = 'Create Intervention';
$this->params['breadcrumbs'][] = ['label' => 'Interventions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'interventionType'=> $interventionType,
        'cases' => $cases,
        'clients' => $clients,
        'police_cases' => $police_cases,
        'court_cases' => $court_cases
    ]) ?>

</div>


