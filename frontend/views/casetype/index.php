<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasetypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Case Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casetype-index">
<div class="card">
    <div class="card-header"><h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Casetype', ['create'], ['class' => 'btn btn-success']) ?>
    </p></div>
    <div class="card-body">    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'type',
            'description:ntext',
            'created_at:datetime',
            //'updated_at:datetime',
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
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




</div>
