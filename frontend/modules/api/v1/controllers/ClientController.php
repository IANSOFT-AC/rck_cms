<?php

namespace frontend\modules\api\v1\controllers;

class ClientController extends \yii\rest\ActiveController
{
    public $modelClass = \app\models\Refugee::class;

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

