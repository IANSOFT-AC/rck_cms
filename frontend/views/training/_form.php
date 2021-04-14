<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-form">


            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'organizer_id')->dropDownList($organizers,['prompt' => '-- Select Organizer? --']) ?>
                </div>
                <div class="col-md-6">
                  <?= $form->field($model, 'organizer')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6">
                    <?= $form->field($model, 'type')->dropDownList($trainingTypes,['prompt' => '-- Select Type of Training? --']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'donor')->dropDownList($donors,['prompt' => '-- Select the Donor? --']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'date')->textInput(['type' => 'date','class' => 'form-control no-future','value' => $model->isNewRecord ? null : Yii::$app->formatter->asDate($model->date, 'yyyy-MM-dd')]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'facilitators')->textarea(['rows' => 3]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'no_of_participants')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, '0_9')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, '10_19')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, '20_24')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, '25_59')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, '60+')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'boys')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'girls')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'men')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'women')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <div class="custom-file">
                        <?= $form->field($model, 'participants_scan',[
                            'options' => [
                                'class' => 'custom-file has-icon has-label',
                            ],
                            'labelOptions' => [ 'class' => 'custom-file-label' ]
                        ])->fileInput(['class' => 'custom-file-input']) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-file">
                        <?= $form->field($model, 'photos[]',[
                            'options' => [
                                'class' => 'custom-file has-icon has-label',
                            ],
                            'labelOptions' => [ 'class' => 'custom-file-label','value' => 'photos' ]
                            ])->fileInput(['multiple'=> true, 'class' => 'custom-file-input uploadform-imagefile'])->label('Photos') ?>
                    </div>
                </div>

                    <?php $form->field($model, 'created_by')->textInput() ?>

                    <?php $form->field($model, 'updated_by')->textInput() ?>

                    <?php $form->field($model, 'created_at')->textInput() ?>

                    <?php $form->field($model, 'updated_at')->textInput() ?>

                <div class="form-group mx-sm-3 mb-2 mt-3 col-md-12 pull-right">
                    <?= Html::submitButton(Yii::t('app', '<i class="fa fa-check"></i> save'), ['class' => 'btn btn-success']); ?>
                    <?= Html::a(' Cancel <i class="fa fa-eraser"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

</div>
<?php


$script = <<<JS

    //Hide fields initially
    $('.field-training-donor, .field-training-type, .field-training-organizer').parent().hide()

    $('#training-0_9, #training-10_19, #training-20_24, #training-25_59, #training-boys, #training-girls, #training-men, #training-women, #training-no_of_participants').val(0)
    $('#training-60+').val(0)

    $('#training-organizer_id').on('change', function(){
        if(this.value == 0){
            $('.field-training-organizer').parent().fadeIn('slow');
        }else{
            $('.field-training-organizer').parent().fadeOut('slow');
        }

        if(this.value == 1){
            $('.field-training-donor, .field-training-type').parent().show()
        }else{
            $('.field-training-donor, .field-training-type').parent().hide()
        }
    });

    $('#training-participants_scan').on('change', function() {
        var file = $(this)[0].files[0].name;
        let title = $(this).siblings( "label" ).text();
        $(this).siblings( "label" ).text(" ("+ file + ") File selected");
    });

    $('#training-photos').on('change', function() {
        let count =0
        count = $(this)[0].files.length;
        var file = $(this)[0].files[0].name;
        let title = $(this).siblings( "label" ).text();
        file = (count == 1) ? file : count
        $(this).siblings( "label" ).text(" ("+ file + ") File selected");
    });

JS;

$this->registerJs($script);
