<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCaseProceeding */

$this->title = Yii::t('app', 'Create Court Case Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Court Case Update'), 'url' => ['list', 'id' => $court->id]];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="court-case-proceeding-create">

<div class="card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
</div>
    

    <?= $this->render('_form', [
        'model' => $model,
        'court' => $court
    ]) ?>

</div>
<?php

$script = <<<JS

    $('#courtcaseproceeding-case_status').on('change', function(e){
        if(e.target.value == "open"){
            $('.field-courtcaseproceeding-next_court_date').fadeIn('slow')
        }else{
            $('.field-courtcaseproceeding-next_court_date').fadeOut('slow')
        }
    });
JS;

$this->registerJs($script);
?>