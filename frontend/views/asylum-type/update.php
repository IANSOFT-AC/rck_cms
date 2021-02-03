<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsylumType */

$this->title = Yii::t('app', 'Update Asylum Type: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asylum Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asylum-type-update">
<div class="card">
	<div class="card-header"></div>
	<div class="card-body"></div>
</div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
