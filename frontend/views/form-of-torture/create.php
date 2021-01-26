<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormOfTorture */

$this->title = Yii::t('app', 'Create Form Of Torture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Of Tortures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-of-torture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
