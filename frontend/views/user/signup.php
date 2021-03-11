<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup - '.Yii::$app->params['generalTitle'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

<div class="card">
    <div class="card-header">
        <h1 class="card-title"><?= Html::encode($this->title) ?></h1>
        
    </div>
    <div class="card-body">
    
    <p class="card-subtitle">Please fill out the following fields to signup:</p>
<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin(['action' => 'signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'passwordConfirm')->passwordInput() ?>

            <?= $form->field($model, 'role')->dropDownList($roles, ['prompt' => '--Select Role--']) ?>

            <div class="row">
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

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
    </div>

</div>
    

    
