<?php

namespace frontend\controllers;

use app\models\Casetype;
use app\models\Lawyer;
use Yii;
use frontend\models\CaseRegister;
use frontend\models\CaseRegisterSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaseRegisterController implements the CRUD actions for CaseRegister model.
 */
class CaseRegisterController extends Controller
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
     * Lists all CaseRegister models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaseRegisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CaseRegister model.
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
     * Creates a new CaseRegister model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CaseRegister();
        $lawyers = ArrayHelper::map(Lawyer::find()->all(),'id','full_names');
        $casetypes = ArrayHelper::map(Casetype::find()->all(), 'id','type');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->case_type = 2;
        return $this->render('create', [
            'model' => $model,
            'lawyers' => $lawyers,
            'casetypes' => $casetypes
        ]);
    }

    /**
     * Updates an existing CaseRegister model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $lawyers = ArrayHelper::map(Lawyer::find()->all(),'id','full_names');
        $casetypes = ArrayHelper::map(Casetype::find()->all(), 'id','type');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->case_type = 2;
        return $this->render('update', [
            'model' => $model,
            'lawyers' => $lawyers,
            'casetypes' => $casetypes
        ]);
    }

    /**
     * Deletes an existing CaseRegister model.
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
     * Finds the CaseRegister model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CaseRegister the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CaseRegister::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
