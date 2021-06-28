<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PleaStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plea Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plea-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plea Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'status',
            [
                    'attribute' => 'created_by',
                    'value' => function($model) {
                        return $model->creator->username;
                    }
            ],
            [
                'attribute' => 'updated_by',
                'value' => function($model) {
                    return $model->updator->username;
                }
            ],
            'created_at:datetime',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
