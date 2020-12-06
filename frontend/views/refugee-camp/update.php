<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeCamp */

$this->title = 'Update Refugee Camp: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Refugee Camps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refugee-camp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'counties' => $counties,
        'subCounties' => $subCounties
    ]) ?>

</div>
