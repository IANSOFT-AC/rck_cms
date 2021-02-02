<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RckOffices */

$this->title = Yii::t('app', 'Add RCK Office');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rck Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rck-offices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
