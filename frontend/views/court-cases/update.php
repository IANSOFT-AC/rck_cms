<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */

$this->title = Yii::t('app', 'Update Court Cases: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = is_null($model->refugee_id) ? null : ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = is_null($model->refugee_id) ? ['label' => 'Court Cases', 'url' => ['index']] : ['label' => 'Court Cases', 'url' => ['client', 'id' => $model->refugee_id]];
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
