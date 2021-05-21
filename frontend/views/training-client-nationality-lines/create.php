<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingClientNationalityLines */

$this->title = 'Create Training Client Nationality Lines';
$this->params['breadcrumbs'][] = ['label' => 'Training Client Nationality Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-client-nationality-lines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
