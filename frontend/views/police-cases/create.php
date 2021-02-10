<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = Yii::t('app', 'Add Police Case');
$this->params['breadcrumbs'][] = is_null($refugee_id) ? null : ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $refugee_id]];
$this->params['breadcrumbs'][] = is_null($refugee_id) ? ['label' => 'Police Cases', 'url' => ['index']] : ['label' => 'Police Cases', 'url' => ['client', 'id' => $refugee_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="police-cases-create">
	
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'policeStations' => $policeStations,
        'offences' => $offences
    ]) ?>

</div>
