<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CounsellingIntake */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselling Intakes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="counselling-intake-view">
<div class="card">
        <div class="card-header">    <h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p></div>
        <div class="card-body">    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ic_presenting_problem:ntext',
            'observation_of_ic_behaviour:ntext',
            'other_interventions_given_elsewhere:ntext',
            'how_you_supported_the_client:ntext',
            'skills_used:ntext',
            'next_appointment_if_any:datetime',
            'counselor_comment:ntext',
            'date_of_referal:datetime',
            'referred_to',
            'counsellor_id',
            'intervention_id',
            'created_at:datetime',
            'updated_at:datetime',
            'created_by',
            'updated_by',
        ],
    ]) ?></div>
    </div>




</div>