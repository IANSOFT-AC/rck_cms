<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Lawyer;
use app\models\Magistrate;
use app\models\CourtProceeding;
use app\models\Counsellors;
use app\models\CourtCaseCategory;
use yii\helpers\Url;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $model app\models\CourtCases */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
], 'css-select-picker');
?>

<div class="court-cases-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-header"><h5 class="card-title">Court Case</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                        <?= $form->field($model, 'no_of_refugees')->textInput() ?>

                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'offence')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'first_instance_interview')->textarea() ?>

                        <?= $form->field($model, 'magistrate')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'court_proceeding_id')->dropDownList($natureOfProceedings,
                            ['prompt' => '-- Nature of Proceeding --']) ?>

                        <?= $form->field($model, 'date_of_arrainment')->textInput(['type' => 'date']) ?>
                </div>
                <div class="col-md-6">
                        <?= $form->field($model, 'case_status')->dropDownList(['open' => 'Open', 'closed' => 'Closed'],
                            ['prompt' => '-- Select Case Status --']) ?>

                        <?= $form->field($model, 'next_court_date')->textInput(['type' => 'date']) ?>

                        <?= $form->field($model, 'legal_officer_id')->dropDownList($lawyers,
                            ['prompt' => '-- Choose Legal Office --']) ?>

                        <?= $form->field($model, 'counsellor_id')->dropDownList($counsellors,
                            ['prompt' => '-- Choose Counsellor --']) ?>

                        <?= $form->field($model, 'court_case_category_id')->dropDownList($courtCaseCategories,
                            ['prompt' => '-- Choose Court Category --','onchange'=>'
                                 $.get( "'.Url::toRoute('court-cases/catlists').'", { id: $(this).val() } )
                                                .done(function( data )
                                       {
                                                  $( "select#courtcases-court_case_subcategory_id" ).html( data );
                                                });
                                            ']) ?>

                        <?= $form->field($model, 'court_case_subcategory_id')->dropDownList([],['prompt' => '--Select SubCategory']) ?>

                        <?= $form->field($model, 'refugee_id')->dropDownList($refugees,
                            ['prompt' => '-- Choose Client --','data-live-search' => 'true' ]) ?>

                </div>
            </div>
        </div>
        <div class="card-footer">
            
        </div>
    </div>

    <div class="form-group p-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg form-control']) ?>
    </div>

    <?php 

    ActiveForm::end(); 
    $this->registerJsFile(
        'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    );

    ?>

</div>

<?php

$script = <<<JS

    $('#courtcases-refugee_id').selectpicker();
    $('.field-courtcases-name, .field-courtcases-next_court_date').hide();

    $('#courtcases-no_of_refugees').on('focusout', function(e){
        if(e.target.value > 1){
            $('.field-courtcases-name').fadeOut('slow')
        }else{
            $('.field-courtcases-name').fadeIn('slow')
        }
    });

    $('#courtcases-case_status').on('change', function(e){
        if(e.target.value == "open"){
            $('.field-courtcases-next_court_date').fadeIn('slow')
        }else{
            $('.field-courtcases-next_court_date').fadeOut('slow')
        }
    });
JS;

$this->registerJs($script);
?>
