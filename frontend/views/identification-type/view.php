<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IdentificationType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Identification Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);

?>
<div class="identification-type-view">

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
                    'identification',
                    'description:ntext',
                    'created_at',
                    'updated_at',
                    'created_by',
                    'updated_by',
                ],
            ]) ?>
        </div>
    </div>

</div>
