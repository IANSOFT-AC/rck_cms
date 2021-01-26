<?php

namespace frontend\controllers;

use Yii;
use app\models\PoliceCases;
use app\models\PoliceCasesSearch;
use app\models\PoliceUploads;
use app\models\Policestation;
use app\models\PoliceDocsUpload;
use app\models\Lawyer;
use app\models\UploadForm;
use app\models\Refugee;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * PoliceCasesController implements the CRUD actions for PoliceCases model.
 */
class PoliceCasesController extends Controller
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
                    'upload' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all PoliceCases models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoliceCasesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpload()
    {
        // return json_encode($_POST);
        // die();
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            $rst = $model->upload("police_cases", Yii::$app->request->post()['id'], Yii::$app->request->post()['police_upload_id']);

            if ($rst) {
                //Yii::$app->session->setFlash('success', "You have successfully uploaded the files and created a record");
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->statusCode = 200;
                return $this->asJson(['msg' => "file uploaded successfully"]);
            }else{
                //Yii::$app->session->setFlash('error', "Sorry, something went wrong. Try again");
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->statusCode = 400;
                return $this->asJson(['msg' => "file upload failed"]);
            }
        }
        
        //return $this->redirect(['police-cases/index']);
    }


        public function actionList()
    {
        $cases = PoliceCases::find()
            ->joinWith('policeStation')
            ->asArray()
            ->all();

         // echo "<pre>";
         // print_r($cases);
         // exit;

        $result =[];

        foreach ($cases as $case) {
            # code...
            $result['data'][] = [
                'id' => $case['id'],
                'name' => $case['name'],
                'gender' => $case['gender'],
                'contacts' => $case['contacts'],
                'age' => $case['age'],
                'offence' => $case['offence'],
                'complainant' => $case['complainant'],
                'policeStation' => $case['policeStation']['name'],
                'first_instance_interview' => $case['first_instance_interview'] == 1 ? true : false,                
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $result;



       // print '<pre>'; print_r($cases);

    }

    /**
     * Displays a single PoliceCases model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model= $this->findModel($id);

        // print '<pre>';
        // print_r($model->uploads); 
        // exit;


        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }


    //Previewing a file upload
    public function actionPreview($name)
    {

        $model= PoliceDocsUpload::find()->where(['doc_path' => $name])->one();

        // print '<pre>';
        // print_r($model); 
        // exit;

        // return $this->render('preview', [
        //     'model' => $model
        // ]);

        // This will need to be the path relative to the root of your app.
        $filePath = '/your/file/path';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias('@webroot'.$model->doc_path);

        return Yii::$app->response->sendFile($completePath, $model->filename);
    }

    /**
     * Creates a new PoliceCases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PoliceCases();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['files', 'id' => $model->id]);
        }

        $policeStationsArray = ArrayHelper::map(Policestation::find()->all(), 'id', 'name');
        $lawyersArray = ArrayHelper::map(Lawyer::find()->all(), 'id', 'full_names');
        $refugees = ArrayHelper::map(Refugee::find()->all(), 'id', 'fullNames');

        return $this->render('create', [
            'model' => $model,
            'lawyers' => $lawyersArray,
            'policeStations' => $policeStationsArray,
            'refugees' => $refugees
        ]);
    }

    public function actionFiles($id)
    {
        $uploads = PoliceUploads::find()->all();
        $model = $this->findModel($id);
        

        //HANDLE POST OF FILES.
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('files', [
            'list' => $uploads,
            'model' => $model
        ]);
    }

    /**
     * Updates an existing PoliceCases model.
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

        $policeStationsArray = ArrayHelper::map(Policestation::find()->all(), 'id', 'name');
        $lawyersArray = ArrayHelper::map(Lawyer::find()->all(), 'id', 'full_names');
        $refugees = ArrayHelper::map(Refugee::find()->all(), 'id', 'fullNames');

        return $this->render('update', [
            'model' => $model,
            'lawyers' => $lawyersArray,
            'policeStations' => $policeStationsArray,
            'refugees' => $refugees
        ]);
    }

    /**
     * Deletes an existing PoliceCases model.
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
     * Finds the PoliceCases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PoliceCases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PoliceCases::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
