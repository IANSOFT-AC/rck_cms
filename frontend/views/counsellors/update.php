<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counsellors */

$this->title = Yii::t('app', 'Update Counsellor: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counsellor'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="counsellors-update">
<div class="card">
<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>




</div>
