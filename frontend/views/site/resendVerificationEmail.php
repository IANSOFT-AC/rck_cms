<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email">
    <div class="card">
        <div class="card-header">
            <h1><?= Html::encode($this->title) ?></h1>

            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                <p>Please fill out your email. A verification email will be sent there.</p>
                    <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Send', ['class' => 'btn btn-primary form-control']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    
</div>
