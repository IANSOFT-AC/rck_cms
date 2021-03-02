<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityInterview */

$this->title = Yii::t('app', 'Update Security Interview: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Security Interviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="security-interview-update">
<div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">    
            <?= $this->render('_form', [
                'model' => $model,
                'interventionid' => $model->intervention_id,
                'gender' => $gender,
                'countries' => $countries
            ]) ?>
        </div>
    </div>




</div>
