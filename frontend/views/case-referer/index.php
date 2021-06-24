<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CaseRefererSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Case Referers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-referer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Case Referer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'referer',
            'created_at:datetime',
            'updated_at:datetime',
            [
                    'label'=> 'Created By',
                    'value' => function($model) {
                        return $model->user->username;
                    }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
