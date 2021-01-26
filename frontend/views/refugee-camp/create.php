<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefugeeCamp */

$this->title = 'Create Camp';
$this->params['breadcrumbs'][] = ['label' => 'Camps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refugee-camp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'counties' => $counties,
        'subCounties' => $subCounties,
        'rckOffices' => $rckOffices
    ]) ?>

</div>
