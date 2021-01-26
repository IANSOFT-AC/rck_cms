<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dependant */

$this->title = Yii::t('app', 'Update Dependant: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dependants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dependant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'relationships' => $relationships
    ]) ?>

</div>
