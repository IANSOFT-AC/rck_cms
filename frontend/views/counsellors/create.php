<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counsellors */

$this->title = Yii::t('app', 'Add Counsellor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counsellors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counsellors-create">
<div class="card">
<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
<div class="card-body">    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>



</div>
