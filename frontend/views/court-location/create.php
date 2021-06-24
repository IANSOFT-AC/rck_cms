<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CourtLocation */

$this->title = 'Create Court Location';
$this->params['breadcrumbs'][] = ['label' => 'Court Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
