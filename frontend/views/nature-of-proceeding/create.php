<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NatureOfProceeding */

$this->title = Yii::t('app', 'Create Nature Of Proceeding');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nature Of Proceedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="nature-of-proceeding-create">
<div class="card">
    <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
    <div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>


</div>
