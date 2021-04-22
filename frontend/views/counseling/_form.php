<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Counseling */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="counseling-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'code')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'date')->textInput(['type' => 'date','class' => 'form-control no-future','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->date, 'yyyy-MM-dd')]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'case_status')->dropDownList(['open' => 'Open', 'closed' => 'Closed'],
                                            ['prompt' => '-- Select Case Status --']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'next_appointment_date')->textInput(['type' => 'date','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->next_appointment_date, 'yyyy-MM-dd')]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'session')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'type')->dropDownList([1 => 'Individual',2 => 'Family', 3 => 'Group', 4 => 'Couple' ],['prompt' => '--Select Type--']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'other_clients[]')->dropDownList($clients, ['prompt' => '--Select Other Clients--','multiple data-live-search' => "true",'class' => 'form-control selectpicker','options' => $model->isNewRecord ? [] : Helper::selectedGroups($model->other_clients)]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'presenting_problem')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'therapeutic')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'conseptualization')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'intervention')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'counsellors')->textarea(['rows' => 6]) ?>
                </div>


                <!-- FOR GROUP AND FAMILY -->

                <div class="col-md-12">
                    <?= $form->field($model, 'session_goals')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'key_tasks_achieved')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'challenges_emerging')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'interventions_by_facilitator')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'achievement_of_goals')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'stage')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
                </div>

                <!--  END OF GROUP AND FAMILY  -->

                <div class="col-md-12">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="consentSwitch" name="Refugee[consent]">
                      <label class="custom-control-label" for="consentSwitch">Client Consent</label>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'intervention_id')->hiddenInput(['value' => $intervention])->label(false) ?>

            <div class="form-group"  id="actions">
                <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
                <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
            </div>

            <?php ActiveForm::end(); ?>

</div>
<?php

$script = <<<JS

    $('.field-counseling-next_appointment_date').parent().fadeOut()

    $('.field-counseling-session_goals, .field-counseling-key_tasks_achieved, .field-counseling-challenges_emerging, .field-counseling-interventions_by_facilitator,\
            .field-counseling-achievement_of_goals, .field-counseling-stage, .field-counseling-remarks, .field-counseling-other_clients')
    .parent().fadeOut('slow');

    $('#counseling-type').on('change', function(){
        if($('#counseling-type option[value=1]:selected').length > 0 || this.value == 0){
            $('.field-counseling-session_goals, .field-counseling-key_tasks_achieved, .field-counseling-challenges_emerging, .field-counseling-interventions_by_facilitator,\
                .field-counseling-achievement_of_goals, .field-counseling-stage, .field-counseling-remarks, .field-counseling-other_clients')
            .parent().fadeOut('slow');
        }else{
            $('.field-counseling-session_goals, .field-counseling-key_tasks_achieved, .field-counseling-challenges_emerging, .field-counseling-interventions_by_facilitator,\
                .field-counseling-achievement_of_goals, .field-counseling-stage,.field-counseling-remarks, .field-counseling-other_clients').parent().fadeIn('fast');
        }
    }).change();

    $('#actions').hide();

    $('input#consentSwitch').on('change', function(){
        if ($(this).is(':checked')) {
            $('#actions').show();
        }else{
            $('#actions').hide();
        }
    })

    $('#counseling-case_status').on('change', function(e){
        if(e.target.value == "open"){
            $('.field-counseling-next_appointment_date').parent().fadeIn('slow')
        }else{
            $('.field-counseling-next_appointment_date').parent().fadeOut('slow')
        }
    }).change();
JS;

$this->registerJs($script);
?>
