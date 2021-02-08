<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */

$this->title = 'Update Client BioData: ' . $model->fullNames;
$this->params['breadcrumbs'][] = ['label' => 'Client Biodata', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refugee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'IdTypes' =>  $IdTypes,
        'camps' => $camps ,
        'conflicts' => $conflicts,
        'countries' => $countries,
        'gender' => $gender,
        'rck_offices' => $rck_offices,
        'modeOfEntry' => $modeOfEntry,
        'asylum_types' => $asylum_types,
        'sourceOfIncome' => $sourceOfIncome,
        'sourceOfInfo' => $sourceOfInfo,
        'formOfTorture' => $formOfTorture,
        'disabilityType' => $disabilityType
    ]) ?>

</div>

<?php

$script = <<<JS

    //Hide fields initially
    $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').hide()
    $('.field-refugee-disability_desc, .field-refugee-form_of_torture, .field-refugee-id_no').hide()

    $('#refugee-asylum_status').on('change', function() {
      //alert( this.value );
      if(this.value == 1){
        $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').fadeIn('slow');
      }else{
        $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').fadeOut('slow')
      }

      if(this.value == 3){
        $('.field-refugee-id_no').fadeIn('slow');
      }else{
        $('.field-refugee-id_no').fadeOut('slow');
      }
    });

    $('#refugee-has_work_permit').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-arrested_due_to_lack_of_work_permit, .field-refugee-interested_in_work_permit, .field-refugee-interested_in_citizenship').fadeOut('slow');
        }else{
            $('.field-refugee-arrested_due_to_lack_of_work_permit, .field-refugee-interested_in_work_permit, .field-refugee-interested_in_citizenship').fadeIn('slow');
        }
    });

    $('#refugee-has_disability').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-disability_desc').fadeIn('slow');
        }else{
            $('.field-refugee-disability_desc').fadeOut('slow');
        }
    });

    $('#refugee-victim_of_turture').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-form_of_torture').fadeIn('slow');
        }else{
            $('.field-refugee-form_of_torture').fadeOut('slow');
        }
    });
JS;

$this->registerJs($script);