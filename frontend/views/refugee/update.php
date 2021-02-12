<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */

$this->title = 'Update Client: ' . $model->fullNames;
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update Client';
?>
<div class="refugee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'IdTypes' =>  $IdTypes,
        'camps' => $camps ,
        'conflicts' => $conflicts,
        'countries' => $countries,
        'gender' => $gender,
        'rck_offices' => $rck_offices,
        'modeOfEntry' => $modeOfEntry,
        'asylum_types' => $asylum_types,
        'sourceOfIncome' => $sourceOfIncome,
        'sourceOfInfo' => $sourceOfInfo,
        'formOfTorture' => $formOfTorture,
        'disabilityType' => $disabilityType,
        'languages' => $languages
    ]) ?>

</div>

<?php
