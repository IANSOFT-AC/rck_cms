<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Languages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Language'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'created_at:datetime',
            'updated_at:datetime',
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
    ]); ?>


</div>
