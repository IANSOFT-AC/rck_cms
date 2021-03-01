<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourtCaseProceeding */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-case-proceeding-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-header"><h5 class="card-title">Court Case</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                
                    <?= $form->field($model, 'court_case_id')->hiddenInput(['value' => $model->isNewRecord ? $court->id : $model->court_case_id ])->label(false) ?>
                <div class="col-md-6">
                    <?= $form->field($model, 'case_status')->dropDownList(['open' => 'Open', 'closed' => 'Closed'],
                                            ['prompt' => '-- Select Case Status --']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'next_court_date')->textInput(['type' => 'date','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->next_court_date, 'yyyy-MM-dd')]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?php $form->field($model, 'created_at')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?php $form->field($model, 'updated_at')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?php $form->field($model, 'created_by')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?php $form->field($model, 'updated_by')->textInput() ?>
                </div>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
                        <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$script = <<<JS

    $('#courtcaseproceeding-case_status').on('change', function(e){
        if(e.target.value == "open"){
            $('.field-courtcaseproceeding-next_court_date').fadeIn('slow')
        }else{
            $('.field-courtcaseproceeding-next_court_date').fadeOut('slow')
        }
    }).change();
JS;

$this->registerJs($script);
?>