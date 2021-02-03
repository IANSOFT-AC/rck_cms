<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeCamp */

$this->title = 'Update Camp: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Refugee Camps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refugee-camp-update">

	<div class="card">
        <div class="card-header">
    		<h1><?= Html::encode($this->title) ?></h1>
    	</div>

    	<div class="card-body">
		    <?= $this->render('_form', [
		        'model' => $model,
		        'counties' => $counties,
		        'subCounties' => $subCounties,
		        'rckOffices' => $rckOffices
		    ]) ?>
		</div>

</div>
