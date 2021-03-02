<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityInterview */

$this->title = Yii::t('app', 'Create Security Interview');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Security Interviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-interview-create">
<div class="card">
        <div class="card-header">    
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">    
            <?= $this->render('_form', [
                'model' => $model,
                'interventionid' => $intervention_id,
                'gender' => $gender,
                'countries' => $countries
            ]) ?></div>
    </div>




</div>
