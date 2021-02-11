<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Court Case Subcategories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-case-subcategory-index">
    <div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Create Court Case Subcategory'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    ['label'=>'Category', 'attribute'=>'category_id','value'=>function ($model, $index, $widget) { return $model->category->name; }],
                    'created_at:datetime',
                    'updated_at:datetime',
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
    </div>
</div>
