<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeDocsUpload */

$this->title = Yii::t('app', 'Create Refugee Docs Upload');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Refugee Docs Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refugee-docs-upload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
