<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PleaStatus */

$this->title = 'Create Plea Status';
$this->params['breadcrumbs'][] = ['label' => 'Plea Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plea-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
