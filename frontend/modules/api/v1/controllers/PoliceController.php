<?php

namespace frontend\modules\api\v1\controllers;

class PoliceController extends \yii\rest\ActiveController
{
    public $modelClass = \app\models\PoliceCases::class;

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

