<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CourtLocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Court Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-location-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Court Location', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'location',
            'created_at:datetime',
            'updated_at:datetime',
            [
                    'attribute' => 'created_by',
                    'label' => 'Created By',
                    'value' => function($model) {
                        return $model->creator->username;
                    }
            ],
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
