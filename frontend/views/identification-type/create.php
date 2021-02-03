<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IdentificationType */

$this->title = 'Create Identification Type';
$this->params['breadcrumbs'][] = ['label' => 'Identification Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="identification-type-create">

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
