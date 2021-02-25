<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CounsellingIntake */

$this->title = Yii::t('app', 'Create Counselling Intake');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselling Intakes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counselling-intake-create">
<div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'intervention' => $intervention,
                'counsellors' => $counsellors,
            ]) ?>
        </div>
    </div>
</div>
