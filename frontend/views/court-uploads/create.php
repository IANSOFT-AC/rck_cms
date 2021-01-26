<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtUploads */

$this->title = Yii::t('app', 'Create Court Uploads');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-uploads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
