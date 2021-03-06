<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\GenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Genders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-index">
<div class="card">
        <div class="card-header"></div>
        <div class="card-body"></div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gender', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'gender',
            //'created_at:datetime',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn',

                'buttons' => [

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

                ],

            ],
        ],
    ]); ?>


</div>
