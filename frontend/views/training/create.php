<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = Yii::t('app', 'Add Training');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label'=> $this->title];
?>
<div class="training-create">
    <div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'organizers' => $organizers
            ]) ?>
        </div>
    </div>

</div>
