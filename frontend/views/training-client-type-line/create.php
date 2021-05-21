<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientTypeLines */

$this->title = 'Create Training Client Type Lines';
$this->params['breadcrumbs'][] = ['label' => 'Training Client Type Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-client-type-lines-create">

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
