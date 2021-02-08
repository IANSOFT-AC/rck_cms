<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DisabilityType */

$this->title = Yii::t('app', 'Create Disability Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disability Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disability-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
