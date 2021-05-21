<?php

namespace frontend\controllers;

use app\models\AsylumType;
use Yii;
use app\models\TrainingClientTypeLines;
use frontend\models\TrainingClientTypeLinesSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrainingClientTypeLineController implements the CRUD actions for TrainingClientTypeLines model.
 */
class TrainingClientTypeLineController extends Controller
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
     * Lists all TrainingClientTypeLines models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrainingClientTypeLinesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrainingClientTypeLines model.
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
     * Creates a new TrainingClientTypeLines model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrainingClientTypeLines();
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
                'types' => $this->Asylumtype()
            ]);
        }

        return $this->render('create', [
            'model' => $model,
            'types' => $this->Asylumtype()
        ]);
    }

    /**
     * Updates an existing TrainingClientTypeLines model.
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
                'types' => $this->Asylumtype()
            ]);
        }

        return $this->render('update', [
            'model' => $model,
            'types' => $this->Asylumtype()
        ]);
    }

    /**
     * Deletes an existing TrainingClientTypeLines model.
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
     * Finds the TrainingClientTypeLines model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrainingClientTypeLines the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrainingClientTypeLines::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function Asylumtype()
    {
        $result = AsylumType::find()->all();
        return ArrayHelper::map($result,'id','name');
    }
}
