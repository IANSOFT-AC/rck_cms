<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionProgressLines */

$this->title = 'Update Intervention Progress Lines: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Intervention Progress Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="intervention-progress-lines-update">

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
