<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Conflict */

$this->title = 'Update flee reason: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'reasons for fleeing', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conflict-update">

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
