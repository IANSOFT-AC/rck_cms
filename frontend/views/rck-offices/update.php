<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RckOffices */

$this->title = Yii::t('app', 'Update RCK Office: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rck Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rck-offices-update">

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
