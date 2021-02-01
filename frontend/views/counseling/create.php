<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counseling */

$this->title = Yii::t('app', 'Create Counseling');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counselings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="counseling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'intervention' => $intervention
    ]) ?>

</div>
