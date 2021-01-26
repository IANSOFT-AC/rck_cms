<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dependant */

$this->title = Yii::t('app', 'Create Dependant');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dependants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dependant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'relationships' => $relationships
    ]) ?>

</div>
