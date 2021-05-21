<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionBudgetLines */

$this->title = 'Update Intervention Budget Lines: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Intervention Budget Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="intervention-budget-lines-update">

   <!-- <h1><?/*= Html::encode($this->title) */?></h1>-->


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
