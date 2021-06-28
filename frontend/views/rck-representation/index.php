<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RckRepresentationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rck Representations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rck-representation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rck Representation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'representation',
            'case_category',
            [
                    'attribute' => 'created_by',
                    'value' =>  function($model)
                    {
                        return $model->creator->username;
                    }
            ],
            [
                'attribute' => 'updated_by',
                'value' =>  function($model)
                {
                    return $model->updator->username;
                }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
