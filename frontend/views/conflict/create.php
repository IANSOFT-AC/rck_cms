<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Conflict */

$this->title = 'Create Reason for Fleeing';
$this->params['breadcrumbs'][] = ['label' => 'Fleeings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Register flee reason', 'url' => ['create']];
?>
<div class="conflict-create">


    <div class="card">
        <div class="card-header">
            <h1 class="card-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>




</div>
