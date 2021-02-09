<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relationship */

$this->title = Yii::t('app', 'Create Relationship');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relationship-create">
<div class="card">
<div class="card-header">    <h1><?= Html::encode($this->title) ?></h1></div>
<div class="card-body">
<?= $this->render('_form', [
        'model' => $model,
    ]) ?></div>
</div>




</div>
