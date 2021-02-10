<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizer-index">
    <div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a(Yii::t('app', 'Create Organizer'), ['create'], ['class' => 'btn btn-success']) ?>
</p></div>
        <div class="card-body">
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>






</div>
