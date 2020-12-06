<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Policestation */

$this->title = 'Update Policestation: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Policestations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="policestation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
