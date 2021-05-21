<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientTypeLines */

$this->title = 'Create Training Client Type Lines';
$this->params['breadcrumbs'][] = ['label' => 'Training Client Type Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-client-type-lines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
