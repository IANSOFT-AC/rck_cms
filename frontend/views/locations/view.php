<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locations */

$this->title = $model->LocationID;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="locations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
                      <?= Html::a(Yii::t('app', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->LocationID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->LocationID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'LocationID',
            'LocationName',
            'SubCountyID',
            'Notes:ntext',
            'CreatedDate',
            'CreatedBy',
            'Deleted',
        ],
    ]) ?>

</div>
