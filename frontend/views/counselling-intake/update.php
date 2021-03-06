<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CounsellingIntake */

$this->title = Yii::t('app', 'Update Counselling Intake: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselling Intakes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="counselling-intake-update">
<div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,            
            'intervention' => $model->intervention_id,
            'counsellors' => $counsellors,
        ]) ?>
        </div>
    </div>
</div>
