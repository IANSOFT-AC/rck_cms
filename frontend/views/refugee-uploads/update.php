<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeUploads */

$this->title = Yii::t('app', 'Update Refugee Uploads: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Refugee Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Refugee Uploads'), 'url' => ['index']];
?>
<div class="refugee-uploads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'asylum_types' => $asylum_types
    ]) ?>

</div>
