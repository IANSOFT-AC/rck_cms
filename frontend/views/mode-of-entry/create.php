<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModeOfEntry */

$this->title = Yii::t('app', 'Create Mode Of Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mode Of Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mode-of-entry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
