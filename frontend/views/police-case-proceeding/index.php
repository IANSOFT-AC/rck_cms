<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Police Case Updates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="police-case-proceeding-index">

<div class="card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('app', 'Create Police Case Updates'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'desc:ntext',
                'police_case_id',
                'created_at',
                //'updated_at',
                //'created_by',
                //'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

</div>
