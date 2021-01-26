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
                'demographics' => $demographics,
                'gender' => $gender,
                'rck_offices' => $rck_offices,
                'modeOfEntry' => $modeOfEntry 
            ]) ?>
        </div>
    </div>

</div>

<?php

$script = <<<JS

    //Hide fields initially
    $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').hide()
    $('.field-refugee-disability_desc, .field-refugee-form_of_torture').hide()

    $('#refugee-asylum_status').on('change', function() {
      //alert( this.value );
      if(this.value == 1){
        $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').fadeIn('slow')
      }else{
        $('.field-refugee-reason_for_rsd_appointment, .field-refugee-rsd_appointment_date').fadeOut('slow')
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
    })
JS;

$this->registerJs($script);