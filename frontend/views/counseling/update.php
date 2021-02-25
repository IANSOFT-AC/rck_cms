<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counseling */

$this->title = Yii::t('app', 'Update Counseling: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="counseling-update">
<div class="card">
        <div class="card-header"></div>
        <div class="card-body"></div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,        
        'intervention' => $intervention
    ]) ?>

</div>
