<?php

namespace frontend\modules\api\v1\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;

class TrainingController extends \yii\rest\ActiveController
{
    public $modelClass = \app\models\Training::class;


    public function behaviors(){
        return ArrayHelper::merge(
            parent::behaviors(), [
                'authenticator' => [
                    'class' => CompositeAuth::className(),
                    //'except' => ['create', 'login', 'resetpassword'],
                    'authMethods' => [
                        HttpBasicAuth::className(),
                        HttpBearerAuth::className(),
                    ],
                ],
            ]
        );
    }
}
