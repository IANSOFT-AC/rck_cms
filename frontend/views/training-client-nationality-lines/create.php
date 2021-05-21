<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientNationalityLines */

$this->title = 'Create Training Client Nationality Lines';
$this->params['breadcrumbs'][] = ['label' => 'Training Client Nationality Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-client-nationality-lines-create">

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
