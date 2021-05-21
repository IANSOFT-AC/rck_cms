<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientTypeLines */

$this->title = 'Update Training Client Type Lines: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Training Client Type Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="training-client-type-lines-update">

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'types' => $types
            ]) ?>
        </div>
    </div>

</div>
