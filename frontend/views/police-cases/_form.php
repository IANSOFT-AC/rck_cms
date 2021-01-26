<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Policestation;
use app\models\Lawyer;

/* @var $this yii\web\View */
/* @var $model app\models\PoliceCases */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-select-picker');
?>

<div class="police-cases-form">

 <?php $form = ActiveForm::begin(); ?>
    <div class="card">

        <div class="card-body">
            <div class="row">
                



                <div class="col-md-6">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gender')->dropDownList(['male' => 'Male', 'female' => 'Female', 'other' => 'Others'],
                        ['prompt' => '-- Gender --']) ?>

                    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'age')->textInput(['type' => 'number']) ?>

                    <?= $form->field($model, 'police_station_id')->dropDownList($policeStations,
                        ['prompt'=> '-- Select Police Station --']) ?>

                    <?= $form->field($model, 'investigating_officer')->textInput(['maxlength' => true])->label('Names ofInvestigation Officer') ?>
                        
                    <?= $form->field($model, 'investigating_officer_contacts')->textInput(['maxlength' => true]) ?>

                </div>


                <div class="col-md-6">
                    <?= $form->field($model, 'ob_number')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'ob_details')->textarea() ?>

                    <?= $form->field($model, 'offence')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'complainant')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'first_instance_interview')->textarea() ?>

                    <?= $form->field($model, 'refugee_id')->dropDownList($refugees,
                            ['prompt' => '-- Choose Client --','data-live-search' => 'true' ]) ?>

                </div>



                
            </div>
        </div>

    </div>

   

    
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end();
    $this->registerJsFile(
        'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    ); ?>

</div>

<?php
$script = <<<JS

    $('#policecases-refugee_id').selectpicker();
    
JS;

$this->registerJs($script);
?>
