<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Casetype */

$this->title = 'Update Casetype: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Casetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="casetype-update">
<div class="card">
	<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
	<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>




</div>
