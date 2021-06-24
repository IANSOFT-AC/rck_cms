<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseReferer */

$this->title = 'Create Case Referer';
$this->params['breadcrumbs'][] = ['label' => 'Case Referers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-referer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
