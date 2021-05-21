<?php

namespace frontend\controllers;

use app\models\Country;
use Yii;
use app\models\TrainingClientNationalityLines;
use app\models\TrainingClientNationalityLinesSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrainingClientNationalityLinesController implements the CRUD actions for TrainingClientNationalityLines model.
 */
class TrainingClientNationalityLinesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TrainingClientNationalityLines models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrainingClientNationalityLinesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrainingClientNationalityLines model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TrainingClientNationalityLines model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrainingClientNationalityLines();
        $model->training_id = Yii::$app->request->get('iid');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()){
                Yii::$app->session->setFlash('info','Line Added Successfully.');
                return $this->redirect(Yii::$app->request->referrer);

            }else{
                Yii::$app->session->setFlash('error','Error Adding Record.');
                return $this->redirect(Yii::$app->request->referrer);

            }
        }

        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('create', [
                'model' => $model,
                'country' => $this->Country()
            ]);
        }

        return $this->render('create', [
            'model' => $model,
            'country' => $this->Country()
        ]);
    }

    /**
     * Updates an existing TrainingClientNationalityLines model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('info','Line Updated  Successfully.');
            return $this->redirect(Yii::$app->request->referrer);
        }

        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('update', [
                'model' => $model,
                'country' => $this->Country()
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TrainingClientNationalityLines model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrainingClientNationalityLines model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrainingClientNationalityLines the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrainingClientNationalityLines::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function Country()
    {
        $result = Country::find()->all();
        return ArrayHelper::map($result,'id','country');
    }
}
