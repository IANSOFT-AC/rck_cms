<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Test` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $modelClass = 'app\models\Training';
    public function actionIndex()
    {
        //return $this->render('index');
        echo "testing";
        exit;
    }
}
