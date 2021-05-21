<?php

namespace frontend\controllers;

use Yii;
use app\models\InterventionBudgetLines;
use app\models\InterventionBudgetLinesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InterventionBudgetLinesController implements the CRUD actions for InterventionBudgetLines model.
 */
class InterventionBudgetLinesController extends Controller
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
     * Lists all InterventionBudgetLines models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InterventionBudgetLinesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InterventionBudgetLines model.
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
     * Creates a new InterventionBudgetLines model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InterventionBudgetLines();
        $model->intervention_id = Yii::$app->request->get('iid');
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
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InterventionBudgetLines model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            Yii::$app->session->setFlash('info','Line Updated  Successfully.');
            return $this->redirect(Yii::$app->request->referrer);
        }

        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InterventionBudgetLines model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        // return $this->redirect(['index']);
        Yii::$app->session->setFlash('info','Line Deleted  Successfully.');
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the InterventionBudgetLines model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InterventionBudgetLines the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InterventionBudgetLines::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
