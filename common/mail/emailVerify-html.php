<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

// $verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/request-password-reset']);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Username: <b><?= Html::encode($user->username) ?></b></p>
    <p>Password Reset Email <b><?= Html::encode($user->email) ?></b></p>

    <p>Follow the link below to reset your password and gain access to the CMS :</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>
