<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientNationalityLines */

$this->title = 'Update Training Client Nationality Lines: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Training Client Nationality Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="training-client-nationality-lines-update">



    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'country' => $country,
            ]) ?>
        </div>
    </div>

</div>
