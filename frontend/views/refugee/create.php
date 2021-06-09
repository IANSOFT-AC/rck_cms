<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */

$this->title = 'New Client';
$this->params['breadcrumbs'][] = ['label' => 'Client List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'New Client'];
?>
<div class="refugee-create">

    <div class="card">
        <div class="card-header">
            <h1 class="header-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'IdTypes' =>  $IdTypes,
                'camps' => $camps ,
                'conflicts' => $conflicts,
                'countries' => $countries,
                'gender' => $gender,
                'rck_offices' => $rck_offices,
                'modeOfEntry' => $modeOfEntry ,
                'asylum_types' => $asylum_types,
                'sourceOfIncome' => $sourceOfIncome,
                'sourceOfInfo' => $sourceOfInfo,
                'formOfTorture' => $formOfTorture,
                'disabilityType' => $disabilityType,
                'languages' => $languages,
                'Attachmentmodel' => $Attachmentmodel
            ]) ?>
        </div>
    </div>

</div>

