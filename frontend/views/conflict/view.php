<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Conflict */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reasons for fleeing', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="conflict-view">

    <div class="card">
        <div class="card-header">
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

        </div>
        <div class="card-body">
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'conflict',
                'created_at:datetime',
                'updated_at:datetime',
                //'created_by',
                //'updated_by',
            ],
        ]) ?>
        </div>
    </div>



</div>
