<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsylumType */

$this->title = Yii::t('app', 'Create Asylum Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asylum Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asylum-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
