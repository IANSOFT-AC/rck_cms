<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */

$this->title = Yii::t('app', 'Add Court Case');
 is_null($refugee_id) ? null : ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $refugee_id]];
$this->params['breadcrumbs'][] = is_null($refugee_id) ? ['label' => 'Court Cases', 'url' => ['index']] : ['label' => 'Court Cases', 'url' => ['client', 'id' => $refugee_id]];
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
        'offences' => $offences,
        'refugee_id' => $refugee_id,
        'locations' => $locations,
        'courts' => $courts,
        'languages' => $languages,
        'case_referer' => $case_referer,
        'outcomes' => $outcomes,
        'sentences' => $sentences
    ]) ?>

</div>
