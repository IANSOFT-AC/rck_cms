<?php

namespace frontend\modules\api\v1\controllers;

class CourtController extends \yii\rest\ActiveController
{
    public $modelClass = \app\models\CourtCases::class;

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

