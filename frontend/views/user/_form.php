<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([0 => 'Deleted', 9 => 'In Active', 10 => 'Active'], ['prompt' => '--Select Status--']) ?>

    <?= $form->field($model, 'role')->dropDownList($roles, ['prompt' => '--Select Role--']) ?>

    <div class="row">
        <div class="col-12 col-md12 p-3 d-flex">
            <div class="form-group ">
                <label for="check-all">Check All Permissions</label>
                <?= Html::checkbox('check-all',false,['id'=> 'check-all','class' => 'mx-2']) ?>
            </div>
        </div>
    <?php 
    foreach ($permissions as $key => $value) {
        # code...
        ?>
        <div class="form-check m-1 col-md-3">
            <input class="form-check-input" type="checkbox" value=<?= $value->id ?> id=<?= $value->name ?> name="User[permissions][]" <?= in_array($value->id, explode(",",$model->permissions)) ? "checked" : "" ?>>
            <label class="form-check-label" for=<?= $value->name ?>>
                <?= $value->name ?>
            </label>
        </div>
        <?php
    }
    ?>
    </div>


        <div class="form-group m-2 p-2">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success form-control']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<<JS
    $('#check-all').on('click',(e) => {
        let status = $('#check-all').prop("selected",false);
        if(status[0].checked)
            {
                console.log('Check All');
                $('input[type=checkbox]').prop("checked", true);
            }else if(!status[0].checked) {
                console.log('UnCheck All');
                 $('input[type=checkbox]').prop("checked", false);
            }
    });
JS;

$this->registerJs($script);

