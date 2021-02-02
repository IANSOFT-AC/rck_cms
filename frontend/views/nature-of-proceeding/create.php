<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NatureOfProceeding */

$this->title = Yii::t('app', 'Create Nature Of Proceeding');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nature Of Proceedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="nature-of-proceeding-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
