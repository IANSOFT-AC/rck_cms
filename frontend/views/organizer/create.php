<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organizer */

$this->title = Yii::t('app', 'Create Organizer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizer-create">
    <div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card-body">

        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>



</div>
