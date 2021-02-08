<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refugee */

$this->title = 'Add Client Biodata';
$this->params['breadcrumbs'][] = ['label' => 'Client Biodata List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Refugee Bio Data', 'url' => ['create']];
?>
<div class="refugee-create">

    <div class="card">
        <div class="card-header">
            <h1 class="header-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'IdTypes' =>  $IdTypes,
                'camps' => $camps ,
                'conflicts' => $conflicts,
                'countries' => $countries,
                'gender' => $gender,
                'rck_offices' => $rck_offices,
                'modeOfEntry' => $modeOfEntry ,
                'asylum_types' => $asylum_types,
                'sourceOfIncome' => $sourceOfIncome,
                'sourceOfInfo' => $sourceOfInfo,
                'formOfTorture' => $formOfTorture,
                'disabilityType' => $disabilityType
            ]) ?>
        </div>
    </div>

</div>

<?php

$script = <<<JS

    //Hide fields initially
    $('.field-refugee-disability_desc, \
        .field-refugee-form_of_torture, \
        .field-refugee-id_no, \
        .field-refugee-disability_type_id,\
        .field-refugee-reason_for_rsd_appointment, \
        .field-refugee-rsd_appointment_date,\
        .field-refugee-source_of_info_abt_rck,\
        .field-refugee-source_of_income,\
        .field-refugee-form_of_torture_id').hide()

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
            $('.field-refugee-disability_type_id').fadeIn('slow');
        }else{
            $('.field-refugee-disability_type_id').fadeOut('slow');
        }
    });

    $('#refugee-disability_type_id').on('change', function(){
        if(this.value == 0){
            $('.field-refugee-disability_desc').fadeIn('slow');
        }else{
            $('.field-refugee-disability_desc').fadeOut('slow');
        }
    });

    $('#refugee-victim_of_turture').on('change', function(){
        if(this.value == 1){
            $('.field-refugee-form_of_torture_id').fadeIn('slow');
        }else{
            $('.field-refugee-form_of_torture_id').fadeOut('slow');
        }
    });

    $('#refugee-form_of_torture_id').on('change', function(){
        if($('#refugee-form_of_torture_id option[value=0]:selected').length > 0){
            $('.field-refugee-form_of_torture').fadeIn('slow');
        }else{
            $('.field-refugee-form_of_torture').fadeOut('slow');
        }
    });

    $('#refugee-source_of_info_id').on('change', function(){
        
        if(this.value == 0){
            $('.field-refugee-source_of_info_abt_rck').fadeIn('slow');
        }else{
            $('.field-refugee-source_of_info_abt_rck').fadeOut('slow');
        }
    });

    $('#refugee-source_of_income_id').on('change', function(){
        if($('#refugee-source_of_income_id option[value=0]:selected').length > 0){
            $('.field-refugee-source_of_income').fadeIn('slow');
        }else{
            $('.field-refugee-source_of_income').fadeOut('slow');
        }
    });
    
JS;

$this->registerJs($script);