<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SourceOfInfo */

$this->title = Yii::t('app', 'Create Source Of Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Of Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="source-of-info-create">
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
