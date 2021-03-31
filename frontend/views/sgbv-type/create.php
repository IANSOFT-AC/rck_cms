<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SGBVType */

$this->title = Yii::t('app', 'Create Sgbv Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sgbv Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgbvtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
