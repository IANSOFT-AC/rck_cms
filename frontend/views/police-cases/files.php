<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = Yii::t('app', 'Upload Files to Police Case');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Police Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="police-cases-create">
	
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_files', [
        'list' => $list,
        'model' => $model
    ]) ?>

</div>

<?= Html::a('Proceed to view page', ['view','id' => $model->id], ['class' => 'btn btn-success form-control']) ?>
<?php

$this->registerJsFile(
    '@web/js/uploadPoliceFiles.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>