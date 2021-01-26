<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaseUpdate */

$this->title = Yii::t('app', 'Create Case Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Case Updates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-update-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
