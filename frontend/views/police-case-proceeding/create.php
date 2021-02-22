<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCaseProceeding */

$this->title = Yii::t('app', 'Create Police Case Updates');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Police Case Updates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="police-case-proceeding-create">
<div class="card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
            'police' => $police
        ]) ?>
    </div>
</div>

</div>
