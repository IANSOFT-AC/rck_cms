<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionProgressLines */

$this->title = 'Create Intervention Progress Lines';
$this->params['breadcrumbs'][] = ['label' => 'Intervention Progress Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-progress-lines-create">

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
