<?php

namespace frontend\modules\api\v1\controllers;

class TrainingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo "changes to us";
        exit();
        
        return $this->render('index');
    }

}
