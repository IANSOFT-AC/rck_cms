<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SourceOfIncome */

$this->title = Yii::t('app', 'Create Source Of Income');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Of Incomes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-of-income-create">
<div class="card">
	<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
	<div class="card-body"><?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>


    

</div>
