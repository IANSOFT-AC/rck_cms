<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionUpload */

$this->title = Yii::t('app', 'Create Intervention Upload');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Intervention Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-upload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'casetypes' => $casetypes
    ]) ?>

</div>
