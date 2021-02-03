<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsylumType */

$this->title = Yii::t('app', 'Create Asylum Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asylum Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="asylum-type-create">
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
