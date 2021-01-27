<?php

namespace frontend\controllers;

use app\models\InterventionType;
use Yii;
use app\models\Intervention;
use app\models\Casetype;
use app\models\Refugee;
use app\models\CourtCases;
use app\models\PoliceCases;
use app\models\InterventionSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InterventionController implements the CRUD actions for Intervention model.
 */
class InterventionController extends Controller
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
     * Lists all Intervention models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InterventionSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    public function actionClient($id)
    {
        return $this->render('index', [
            'refugee_id' => $id,
        ]);
    }

    public function actionClientList($id)
    {
        $cases = Intervention::find()
            ->where([
                'intervention.client_id'=>$id
            ])
            ->joinWith('casetype')
            ->joinWith('client')
            ->asArray()
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->prepareDatatable($cases);
    }

    public function actionList(){
        $cases = Intervention::find()
            ->joinWith('casetype')
            ->joinWith('client')
            ->asArray()
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->prepareDatatable($cases);
    }

    /**
     * Displays a single Intervention model.
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
     * Creates a new Intervention model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Intervention();

        if ($model->load(Yii::$app->request->post())) {

            $model->intervention_type_id = implode(",",Yii::$app->request->post()['Intervention']['intervention_type_id']);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $cases = ArrayHelper::map(Casetype::find()->all(),'id','type');
        $interventionType = ArrayHelper::map(InterventionType::find()->all(),'id','intervention_type');
        $clients = ArrayHelper::map(Refugee::find()->all(),'id','fullNames');
        $court_cases = ArrayHelper::map(CourtCases::find()->all(),'id','name');
        $police_cases = ArrayHelper::map(PoliceCases::find()->all(),'id','name');

        return $this->render('create', [
            'model' => $model,
            'interventionType'=> $interventionType,
            'cases' => $cases,
            'clients' => $clients,
            'police_cases' => $police_cases,
            'court_cases' => $court_cases
        ]);
    }

    /**
     * Updates an existing Intervention model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->intervention_type_id = implode(",",Yii::$app->request->post()['Intervention']['intervention_type_id']);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $cases = ArrayHelper::map(Casetype::find()->all(),'id','type');
        $interventionType = ArrayHelper::map(InterventionType::find()->all(),'id','intervention_type');
        $clients = ArrayHelper::map(Refugee::find()->all(),'id','fullNames');
        $court_cases = ArrayHelper::map(CourtCases::find()->all(),'id','name');
        $police_cases = ArrayHelper::map(PoliceCases::find()->all(),'id','name');

        return $this->render('update', [
            'model' => $model,
            'interventionType'=> $interventionType,
            'cases' => $cases,
            'clients' => $clients,
            'police_cases' => $police_cases,
            'court_cases' => $court_cases
        ]);
    }

    /**
     * Deletes an existing Intervention model.
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
     * Finds the Intervention model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Intervention the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Intervention::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function prepareDatatable($data){
        $result =[];

        foreach ($data as $case) {
            # code...
            $result['data'][] = [
                'id' => $case['id'],
                'name' => $case['casetype']['type'],
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        return $result;
    }
}
