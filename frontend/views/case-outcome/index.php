<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CaseOutcomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Case Outcomes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-outcome-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Case Outcome', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'outcome',
            'created_at:datetime',
            'updated_at:datetime',
            [
                    'label' => 'Created By',
                    'value' => function($model) {
                        return $model->user->username;
                    }
            ],
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
