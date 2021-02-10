<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = Yii::t('app', 'Update Police Cases: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = is_null($model->refugee_id) ? null : ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = is_null($model->refugee_id) ? ['label' => 'Police Cases', 'url' => ['index']] : ['label' => 'Police Cases', 'url' => ['client', 'id' => $model->refugee_id]];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="police-cases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'policeStations' => $policeStations,
        'offences' => $offences,
        'refugee_id' => $model->refugee_id
    ]) ?>

</div>
