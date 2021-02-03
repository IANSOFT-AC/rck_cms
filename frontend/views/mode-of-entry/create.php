<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModeOfEntry */

$this->title = Yii::t('app', 'Add Mode Of Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mode Of Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="mode-of-entry-create">

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
