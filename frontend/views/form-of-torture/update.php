<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormOfTorture */

$this->title = Yii::t('app', 'Update Form Of Torture: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Of Tortures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="form-of-torture-update">
<div class="card">
	<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
	<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>




</div>
