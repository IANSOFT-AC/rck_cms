<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LegalRepresentation */

$this->title = Yii::t('app', 'Create Legal Representation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Legal Representations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="legal-representation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
