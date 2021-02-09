<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = Yii::t('app', 'Upload Files to Intervention');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interventions'), 'url' => ['client','id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="intervention-create">
    <div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <?= $this->render('_files', [
                'list' => $list,
                'model' => $model
            ]) ?>
        </div>
    </div>
    

    

</div>
<hr>

<?php

$this->registerJsFile(
    '@web/js/uploadInterventionFiles.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>