<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/27/2021
 * Time: 9:09 PM
 */

namespace console\controllers;


use common\models\User;
use Yii;
use yii\helpers\Console;

class UserController extends \yii\console\Controller
{
    public function actionAddUser($username,$password,$email)
    {
        $security = Yii::$app->security;

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password_hash = $security->generatePasswordHash($password);
       // $user->access_token = $security->generateRandomString(512);
        $user->auth_key = $security->generateRandomString();
        $user->verification_token = $security->generateRandomString(). '_' . time();
        $user->status = 10;
        $user->role = 2;
        $user->permissions = '4,5,7,8,9';


        if ($user->save())
        {
            Console::output('User Saved');
        }
        else{
            var_dump($user->errors);
            Console::output('User Not Saved.');
        }

    }
}