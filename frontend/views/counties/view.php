<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Counties */

$this->title = $model->CountyID;
$this->params['breadcrumbs'][] = ['label' => 'Counties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="counties-view">
<div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                              <?= Html::a(Yii::t('app', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->CountyID], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->CountyID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'CountyID',
                    'CountyName',
                    'Notes:ntext',
                    'RegionID',
                    'CreatedDate',
                    'CreatedBy',
                ],
            ]) ?>
        </div>
    </div>
</div>
