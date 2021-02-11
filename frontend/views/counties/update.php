<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counties */

$this->title = 'Update Counties: ' . $model->CountyID;
$this->params['breadcrumbs'][] = ['label' => 'Counties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CountyID, 'url' => ['view', 'id' => $model->CountyID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="counties-update">
<div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
