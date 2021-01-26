<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Refugee Uploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refugee-uploads-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Refugee Uploads'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'desc:ntext',
            'type',
            [
                'label' => 'Upload Type',
                'attribute' => 'type',
                'value' => function ($model, $key, $index, $column) {
                    return $model->type == 1 ? 'Asylum' : 'Refugee';
                }
            ],
            'created_at:datetime',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
