<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Add Country';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">
    <div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
    </div>



</div>
