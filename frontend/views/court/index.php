<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CourtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Court', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'court',
            [
                    'label' => 'Location',
                    'value' => function($model) {
                        return $model->courtLocation->location;
                    }
            ],
            'created_at:datetime',
            'updated_at:datetime',
            //'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
