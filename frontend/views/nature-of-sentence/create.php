<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\NatureOfSentence */

$this->title = 'Create Nature Of Sentence';
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Sentences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-sentence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
