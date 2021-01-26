<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SourceOfInfo */

$this->title = Yii::t('app', 'Create Source Of Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Of Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-of-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
