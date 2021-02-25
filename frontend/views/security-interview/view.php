<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityInterview */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Security Interviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="security-interview-view">
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
        <div class="card-body"><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'sex',
            'unhcr_case_no',
            'refugee_no',
            'nationality',
            'telephone',
            'dob',
            'education_level',
            'place_of_birth',
            'religion',
            'names_of_parents:ntext',
            'siblings',
            'ethnicity',
            'marital_status',
            'dependants:ntext',
            'reason_for_flight:ntext',
            'flight',
            'life_in_country_of_asylum:ntext',
            'assessment:ntext',
            'intervention_id',
            'created_by',
            'updated_by',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?></div>
    </div>


    

</div>
