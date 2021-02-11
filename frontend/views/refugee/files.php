<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */

$this->title = Yii::t('app', 'Upload Client Files');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Refugees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="police-cases-create">
	
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_files', [
        'list' => $list,
        'model' => $model
    ]) ?>



</div>
<hr>

<?php

$this->registerJsFile(
    '@web/js/uploadRefugeeFiles.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>