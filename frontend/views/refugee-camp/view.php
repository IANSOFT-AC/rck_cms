<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeCamp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Camps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Camp', 'url' => ['view','id' => $model->id]];
\yii\web\YiiAsset::register($this);
?>
<div class="refugee-camp-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'county',
            'subcounty',
            'locality_description:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
