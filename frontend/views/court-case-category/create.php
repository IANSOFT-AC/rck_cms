<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCaseCategory */

$this->title = Yii::t('app', 'Create Court Case Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Case Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-case-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
