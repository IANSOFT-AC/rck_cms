<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agency */

$this->title = Yii::t('app', 'Create Agency');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Agencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-create">
    <div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
    </div>




</div>
