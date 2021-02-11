<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Counties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counties-index">
    <div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Create Counties', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'CountyID',
                    'CountyName',
                    'Notes:ntext',
                    'RegionID',
                    'CreatedDate',
                    //'CreatedBy',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
