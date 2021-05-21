<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingAttachmentLines */

$this->title = 'Create Training Attachment Lines';
$this->params['breadcrumbs'][] = ['label' => 'Training Attachment Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-attachment-lines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
