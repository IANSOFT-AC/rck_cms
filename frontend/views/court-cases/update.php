<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */

$this->title = Yii::t('app', 'Update Court Cases: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="court-cases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'natureOfProceedings' => $natureOfProceedings,
        'lawyers' => $lawyers,
        'counsellors' => $counsellors,
        'courtCaseCategories' => $courtCaseCategories,
        'refugees' => $refugees,
        'offences' => $offences
    ]) ?>

</div>
