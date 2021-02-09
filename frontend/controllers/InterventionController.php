<?php

namespace frontend\controllers;

use app\models\InterventionType;
use app\models\InterventionUpload;
use app\models\UploadForm;
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
use yii\web\UploadedFile;

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
    public function actionCreate($id)
    {
        $model = new Intervention();

        if ($model->load(Yii::$app->request->post())) {

            // echo "<pre>";
            // print_r(Yii::$app->request->post()['Intervention']['intervention_type_id']);
            // if(in_array("2", Yii::$app->request->post()['Intervention']['intervention_type_id'])){
            //     echo "Counseling Found";
            //     return $this->redirect(['counseling/create', 'id' => $model->id]);
            // }else{
            //     echo "Counseling not found";
            // }
            // exit;
            $model->intervention_type_id = implode(",",Yii::$app->request->post()['Intervention']['intervention_type_id']);
            $model->save();
            //return $this->redirect(['counseling/create', 'id' => $model->id]);

            //check if the record has uploads in the interventions upload part
            $uploads = InterventionType::find()->where(['case_id' => Yii::$app->request->post()['Intervention']['case_id'] ]);
            if($uploads){
                return $this->redirect(['files', 'id' => $model->id, 'uploads' => $uploads]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        $cases = ArrayHelper::map(Casetype::find()->all(),'id','type');
        $interventionType = ArrayHelper::map(InterventionType::find()->all(),'id','intervention_type');
        $court_cases = ArrayHelper::map(CourtCases::find()->all(),'id','name');
        $police_cases = ArrayHelper::map(PoliceCases::find()->all(),'id','name');
        $client = ArrayHelper::map(Refugee::find()->where(['id'=>$id])->all(),'id','fullNames');

        return $this->render('create', [
            'model' => $model,
            'interventionType'=> $interventionType,
            'cases' => $cases,
            'police_cases' => $police_cases,
            'court_cases' => $court_cases,
            'client' => $client
        ]);
    }

    public function actionFiles($id)
    {
        $model = $this->findModel($id);
        $uploads = InterventionUpload::find()->where(['issue_id' => $model->case_id])->all();
        

        //HANDLE POST OF FILES.
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if(!$uploads){
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('files', [
            'list' => $uploads,
            'model' => $model
        ]);
    }

    //Upload files
    public function actionUpload()
    {
        // return json_encode($_POST);
        // die();
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $rst = 5;
            
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->imageFile){
                $rst = $model->upload("interventions", Yii::$app->request->post()['id'], Yii::$app->request->post()['intervention_upload_id']); 
            }   

            $model->multipleFiles = UploadedFile::getInstances($model, 'multipleFiles');
            if($model->multipleFiles){
                $rst = $model->multipleUpload("interventions", Yii::$app->request->post()['id'], 0);
            }

            if ($rst == true) {
                //Yii::$app->session->setFlash('success', "You have successfully uploaded the files and created a record");
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->statusCode = 200;
                return $this->asJson(['msg' => "file uploaded successfully",'error'=> $rst]);
            }else if($rst == false){
                //Yii::$app->session->setFlash('error', "Sorry, something went wrong. Try again");
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->statusCode = 400;
                return $this->asJson(['msg' => "file upload failed",'error'=> $rst]);
            }
        }
        //return $this->redirect(['police-cases/index']);
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
        $clients = ArrayHelper::map(Refugee::find()->where(['id' => $model->client_id])->all(),'id','fullNames');
        $court_cases = ArrayHelper::map(CourtCases::find()->all(),'id','name');
        $police_cases = ArrayHelper::map(PoliceCases::find()->all(),'id','name');

        return $this->render('update', [
            'model' => $model,
            'interventionType'=> $interventionType,
            'cases' => $cases,
            'client' => $clients,
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
                'client' => isset($case['client']) ? $case['client']['first_name']." ".$case['client']['middle_name']." ".$case['client']['last_name'] : "No client",
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        return $result;
    }
}
