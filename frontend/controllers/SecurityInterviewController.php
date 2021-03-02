<?php

namespace frontend\controllers;

use Yii;
use app\models\SecurityInterview;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Gender;
use app\models\Country;
use yii\helpers\ArrayHelper;

/**
 * SecurityInterviewController implements the CRUD actions for SecurityInterview model.
 */
class SecurityInterviewController extends Controller
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
     * Lists all SecurityInterview models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SecurityInterview::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'id' => $id
        ]);
    }

    /**
     * Displays a single SecurityInterview model.
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
     * Creates a new SecurityInterview model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new SecurityInterview();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $gender = ArrayHelper::map(Gender::find()->all(),'id','gender');
        $countries = ArrayHelper::map(Country::find()->all(),'id','country');

        return $this->render('create', [
            'model' => $model,
            'intervention_id' => $id,
            'gender' => $gender,
            'countries' => $countries
        ]);
    }

    /**
     * Updates an existing SecurityInterview model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $gender = ArrayHelper::map(Gender::find()->all(),'id','gender');
        $countries = ArrayHelper::map(Country::find()->all(),'id','country');

        return $this->render('update', [
            'model' => $model,
            'gender' => $gender,
            'countries' => $countries
        ]);
    }

    /**
     * Deletes an existing SecurityInterview model.
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
     * Finds the SecurityInterview model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SecurityInterview the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SecurityInterview::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
