<?php

namespace frontend\modules\api\v1\controllers;

use Yii;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = 'app\models\Training';
    
    public function actionIndex(){
        echo "testing";
        exit;
    }
}