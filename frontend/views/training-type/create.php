<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingType */

$this->title = Yii::t('app', 'Create Training Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Training Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
