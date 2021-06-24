<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NatureOfSentenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nature Of Sentences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-sentence-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nature Of Sentence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nature',
            [
                    'attribute' => 'fine_amount',
                    'label' => 'Fine Amount',
                    'format' => [
                            'currency',
                            'KES'
                    ]
            ],
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
