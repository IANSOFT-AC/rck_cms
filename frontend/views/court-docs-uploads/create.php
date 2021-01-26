<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtDocsUploads */

$this->title = Yii::t('app', 'Create Court Docs Uploads');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Docs Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-docs-uploads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
