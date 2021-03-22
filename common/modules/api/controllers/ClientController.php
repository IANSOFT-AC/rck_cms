<?php

namespace common\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\Refugee;

/**
 * Default controller for the `api` module
 */
class ClientController extends ActiveController 
{
    public $modelClass = Refugee::class;
}
