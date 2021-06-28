<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\RckRepresentation */

$this->title = 'Create Rck Representation';
$this->params['breadcrumbs'][] = ['label' => 'Rck Representations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rck-representation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
