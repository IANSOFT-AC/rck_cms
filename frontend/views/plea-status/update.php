<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PleaStatus */

$this->title = 'Update Plea Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plea Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plea-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>