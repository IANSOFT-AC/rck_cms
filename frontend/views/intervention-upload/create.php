<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionUpload */

$this->title = Yii::t('app', 'Create Intervention Upload');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Intervention Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-upload-create">
<div class="card">
	<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
	<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
        'casetypes' => $casetypes,
				'interventiontypes' => $interventiontypes
    ]) ?></div>
</div>




</div>
