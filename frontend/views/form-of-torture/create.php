<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormOfTorture */

$this->title = Yii::t('app', 'Create Form Of Torture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Of Tortures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-of-torture-create">
<div class="card">
	<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
	<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>




</div>
