<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\NatureOfSentence */

$this->title = 'Update Nature Of Sentence: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Sentences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nature-of-sentence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
