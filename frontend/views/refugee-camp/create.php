<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeCamp */

$this->title = 'Create Camp';
$this->params['breadcrumbs'][] = ['label' => 'Camps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="refugee-camp-create">

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

</div>
