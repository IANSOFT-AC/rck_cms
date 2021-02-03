<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IdentificationType */

$this->title = 'Update Identification Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Identification Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Update', 'url' => '#'];
?>
<div class="identification-type-update">

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
