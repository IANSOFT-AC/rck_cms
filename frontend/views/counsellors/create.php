<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Counsellors */

$this->title = Yii::t('app', 'Create Counsellors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Counsellors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="counsellors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
