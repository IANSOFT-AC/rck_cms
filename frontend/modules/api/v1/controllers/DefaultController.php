<?php

namespace frontend\modules\api\v1\controllers;

use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        echo "test this";
        exit;
        
        return $this->render('index');
    }
}
