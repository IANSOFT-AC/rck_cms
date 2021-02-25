<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Security Interviews');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-interview-index">
<div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a(Yii::t('app', 'Create Security Interview'), ['create'], ['class' => 'btn btn-success']) ?>
</p></div>
        <div class="card-body"><?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'sex',
            'unhcr_case_no',
            'refugee_no',
            //'nationality',
            //'telephone',
            //'dob',
            //'education_level',
            //'place_of_birth',
            //'religion',
            //'names_of_parents:ntext',
            //'siblings',
            //'ethnicity',
            //'marital_status',
            //'dependants:ntext',
            //'reason_for_flight:ntext',
            //'flight',
            //'life_in_country_of_asylum:ntext',
            //'assessment:ntext',
            //'intervention_id',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

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
