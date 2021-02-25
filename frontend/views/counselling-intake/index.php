<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Counselling Intakes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counselling-intake-index">
<div class="card">
        <div class="card-header">    
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ic_presenting_problem:ntext',
            'observation_of_ic_behaviour:ntext',
            //'other_interventions_given_elsewhere:ntext',
            'how_you_supported_the_client:ntext',
            'skills_used:ntext',
            'next_appointment_if_any',
            //'counselor_comment:ntext',
            //'referred_to',
            //'counsellor_id',
            //'intervention_id',
            'created_at:datetime',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn',                'buttons' => [

                'view' => function( $url )
                {
                    return Html::a('<i class="fa fa-eye"></i>', $url,[]);
                },

                'update' => function( $url )
                {
                    return Html::a('<i class="fa fa-edit"></i>', $url,[]);
                },

                'delete' => function( $url )
                {
                    return Html::a('<i class="fa fa-trash"></i>', $url,[

                        'data' => [
                            'confirm' => 'Are you sure you wanna delete this record ?',
                            'method' => 'POST',
                            'params' => [
                                '_csrf-frontend' => Yii::$app->request->csrfToken
                            ]

                        ]
                    ]);
                }

            ],],
        ],
    ]); ?></div>
    </div>
</div>
