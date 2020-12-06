<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InterventionAttachmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Intervention Attachments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-attachment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Intervention Attachment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'intervention_id',
            'filename',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',
            //'mime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
