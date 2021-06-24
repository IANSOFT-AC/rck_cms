<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseReferer */

$this->title = 'Update Case Referer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Case Referers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="case-referer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
