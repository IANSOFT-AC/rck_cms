<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */

$this->title = Yii::t('app', 'Create Court Case');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="court-cases-create">

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
