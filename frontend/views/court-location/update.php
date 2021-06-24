<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CourtLocation */

$this->title = 'Update Court Location: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Court Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="court-location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
