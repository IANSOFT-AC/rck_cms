<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counseling */

$this->title = Yii::t('app', 'Create Counseling');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="counseling-create">
    <div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
        'intervention' => $intervention,
        'clients' => $clients
    ]) ?></div>
    </div>




</div>
