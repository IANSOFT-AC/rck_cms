<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Policestation */

$this->title = 'Update Police Station: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Police stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="policestation-update">
<div class="card">
	<div class="card-header">
    <h1><?= Html::encode($this->title) ?></h1></div>
	<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>



</div>
