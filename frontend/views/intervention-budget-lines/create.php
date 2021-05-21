<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionBudgetLines */

$this->title = 'Create Intervention Budget Lines';
$this->params['breadcrumbs'][] = ['label' => 'Intervention Budget Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-budget-lines-create">

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
