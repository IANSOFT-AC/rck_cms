<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Intervention Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="intervention-type-view">
<div class="card">
    <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('View All', ['index'], ['class' => 'btn btn-warning']) ?>
    </p></div>
    <div class="card-body">    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'intervention_type',
            'description:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            'created_by',
            'updated_by',
        ],
    ]) ?></div>
</div>




</div>
