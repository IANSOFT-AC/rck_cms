<?php

namespace frontend\modules\api\v1\controllers;

class InterventionController extends \yii\rest\ActiveController
{
    public $modelClass = \app\models\Intervention::class;

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