<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModeOfEntry */

$this->title = Yii::t('app', 'Update Mode Of Entry: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mode Of Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="mode-of-entry-update">

	<div class="card">
		<div class="card-header">
			<h1><?= Html::encode($this->title) ?></h1>
		</div>
		<div class="card-body">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>




</div>
