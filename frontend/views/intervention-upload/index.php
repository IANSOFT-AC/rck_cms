<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Intervention Uploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-upload-index">
<div class="card">
    <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Intervention Upload'), ['create'], ['class' => 'btn btn-success']) ?>
    </p></div>
    <div class="card-body">    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'label'=> 'Issue Id',
              'attribute' => 'issue_id',
              'format' => 'raw',
              'value' => function ($model, $key, $index, $column) {
                if(isset($model->issue)){
                    return $model->issue->type;
                }else{

                }
              }
            ],
            [
              'label'=> 'Intervention Type',
              'attribute' => 'intervention_type',
              'format' => 'raw',
              'value' => function ($model, $key, $index, $column) {
                if(isset($model->interventionType)){
                    return $model->interventionType->intervention_type;
                }else{

                }
              }
            ],
            'name',
            'description:ntext',
            'created_by',
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
