<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group',
            'description:ntext',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn','buttons' => [

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
