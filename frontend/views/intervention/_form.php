<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Intervention */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervention-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'case_id')->dropDownList($cases,['prompt' => '-- Select Case or Issue --']) ?>

    <?= $form->field($model, 'client_id')->dropDownList($clients,['prompt' => 'Select Court Case']) ?>

    <?= $form->field($model, 'intervention_type_id')->dropDownList($interventionType,['prompt' => 'Select ...','multiple'=>'multiple']) ?>

    <?= $form->field($model, 'court_case')->dropDownList($court_cases,['prompt' => 'Select Court Case']) ?>

    <?= $form->field($model, 'police_case')->dropDownList($police_cases,['prompt' => 'Select Police Case']) ?>

    <?= $form->field($model, 'situation_description')->textarea(['rows' => 6]) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<<JS

    //hide initially
    $('.field-intervention-court_case, .field-intervention-police_case').hide();

    $('#intervention-case_id').on('change', function(e){
        //Hide elements on change
        $('.field-intervention-court_case, .field-intervention-police_case').fadeOut('slow');

        //Then make necessary changes
        if(e.target.value == "11"){
            $('.field-intervention-court_case').fadeIn('slow')
        }else if(e.target.value == "12"){
            $('.field-intervention-police_case').fadeIn('slow')
        }
    });
JS;

$this->registerJs($script);
