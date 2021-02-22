<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCaseProceeding */

$this->title = Yii::t('app', 'Create Court Case Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Case Update'), 'url' => ['list', 'id' => $court->id]];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="court-case-proceeding-create">

<div class="card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
</div>
    

    <?= $this->render('_form', [
        'model' => $model,
        'court' => $court
    ]) ?>

</div>
