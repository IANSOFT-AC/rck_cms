<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php if(\Yii::$app->session->hasFlash('success')){ ?>
        <div class="alert alert-success"><?= Yii::$app->session->getFlash('success') ?></div>
    <?php } ?>

    <div class="card" style="padding: 1.2rem;" id="content-login">
        <div class="card-header">
            <h1 class="card-title"><?= Html::encode("RCK - ".$this->title) ?></h1>
        </div>

        <div class="card-body">


            <div class="m-1 p-2" id="login-status"></div>
            <div class="row">
                <div class="col-lg-12">

                    <p>Please fill out the following fields to login:</p>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group center">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary form-control', 'name' => 'login-button']) ?>
                        <?php Html::a('Sign up', '../site/signup',['class' => 'btn btn-warning', 'name' => 'login-button']) ?>
                    </div>
                    <hr>
                    <div style="color:#999;margin:1em 0">
                        <p class="center">If you forgot your password you can <?= Html::a('Reset it', ['site/request-password-reset'],[
                                'class' => 'pl-1',
                            ]) ?>.</p>

                        <p class="center">Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?></p>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
    <!--<div class="card m-1" id="loader">
        <div class="card-header center">
            <h1 class="card-title">Authenticating. Please Wait...</h1>
        </div>

        <div class="card-body center">
            <img src="/images/gif/loader.gif">
        </div>
    </div>-->

</div>

<?php

$script = <<<JS
/*
    $(function(){

        $("#loader").hide();

        $('form').on('beforeSubmit', function (e) {
            e.preventDefault();
            //to stop double execution 'stop executing any downstream chain of event handlers'
            e.stopImmediatePropagation()
            let form = e.target;

            $("#loader").fadeIn('slow');
            $("#content-login").hide();
            
            fetch('/site/login-api', {
                method: 'POST',
                body: JSON.stringify({"username": $("#loginform-username").val() , "password" : $("#loginform-password").val()}),
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then((response) => {
                try {
                    

                    //if (response.ok) {
                      return response.json();
                    //}
                    //return Promise.reject(response);
                } catch(error) {
                    console.log('Error happened here!')
                    console.error(error)
                }
            })
            .then(function (data) {
                console.log(data);
                $("#loader").hide();
                $("#content-login").fadeIn('slow');
                if(data.status == 200){
                    $('#login-status').html('<span class="center badge bg-green">'+data.msg+'</span>')

                    //REDIRECT TO HOMEPAGE ON SUCCESS
                    setTimeout(function(){ 
                        document.location.href="/";
                     }, 1000);

                    //STORE TOKEN IN LOCAL STORAGE
                    window.localStorage.setItem('auth_token', data.token)
                }else if(data.status == 401){
                    $('#login-status').html('<span class="center badge bg-red"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+data.error+'</span>')
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            return false
        });
    });
    
    */
JS;
$this->registerJs($script);
?>
