<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 6/9/2021
 * Time: 10:50 PM
 */
namespace frontend\controllers;

use Yii;
use frontend\models\Attachment;
use yii\web\Controller;
use yii\web\UploadedFile;


class AttachmentController extends Controller
{
    public function actionUpload()
    {
        $model = new Attachment();



        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {

            $model->attachmentfile = UploadedFile::getInstanceByName('attachmentfile');
            $model->upload($model->Document_No);

        }

        return $this->redirect(['refugee/view','id' => $model->Document_No]);
    }
}