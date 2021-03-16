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
use app\models\Offence;
use common\models\User;
use common\components\AccessRule;

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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete', 'files', 'index', 'upload', 'deleteFile'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::POLICE_CREATE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::POLICE_INDEX,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['files'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::POLICE_FILES,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['upload'],
                        'allow' => true,
                        'roles' => [
                            User::FILE_UPLOAD,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['deleteFile'],
                        'allow' => true,
                        'roles' => [
                            User::FILE_DELETE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow moderators and admins to update
                        'roles' => [
                            User::POLICE_UPDATE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
                
                'denyCallback' => function($rule, $action) {
                    Yii::$app->response->redirect(['site/login']); 
                },
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
            $rst = 5;
            
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->imageFile){
                $rst = $model->upload("police_cases", Yii::$app->request->post()['id'], Yii::$app->request->post()['police_upload_id']); 
            }   

            $model->multipleFiles = UploadedFile::getInstances($model, 'multipleFiles');
            if($model->multipleFiles){
                $rst = $model->multipleUpload("police_cases", Yii::$app->request->post()['id'], 0);
            }

            if ($rst == true) {
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
            ->joinWith('rPoliceStation')
            ->joinWith('rOffence')
            ->asArray()
            ->all();

        foreach ($cases as $key => $value) {
            # code...
            // if(isset($value['organizer_id'])){
            //     $cases[$key]['organizer'] = $cases[$key]['rOrganizer']['name'];
            // }
        }

        // echo "<pre>";
        // print_r($cases);
        // exit();
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->prepareDatatable($cases);
    }


    public function actionClientList($id)
    {
        $cases = PoliceCases::find()
            ->where([
                'police_cases.refugee_id'=>$id
            ])
            ->joinWith('rPoliceStation')
            ->joinWith('rOffence')
            ->asArray()
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->prepareDatatable($cases);
    }

    public function actionClient($id)
    {
        return $this->render('index', [
            'refugee_id' => $id,
        ]);
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

        $refugee_id = is_null(Yii::$app->request->get('id')) ? null : Yii::$app->request->get('id');

        $policeStationsArray = ArrayHelper::map(Policestation::find()->all(), 'id', 'name');
        $offences = ArrayHelper::map(Offence::find()->all(), 'id', 'name');
        $policeStationsArray[0] = 'other';
        $offences[0] = 'other';

        return $this->render('create', [
            'model' => $model,
            'policeStations' => $policeStationsArray,
            'offences' => $offences,
            'refugee_id' => $refugee_id
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
        $offences = ArrayHelper::map(Offence::find()->all(), 'id', 'name');
        $policeStationsArray[0] = 'other';
        $offences[0] = 'other';

        return $this->render('update', [
            'model' => $model,
            'policeStations' => $policeStationsArray,
            'offences' => $offences
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

    public function actionDeleteFile($id)
    {
        $model = new UploadForm();
        $data = PoliceDocsUpload::findOne($id);
        $rst = $model->deleteFile("police_cases",$id);

        return $this->redirect(['view','id'=> $data->police_case_id]);
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

    protected function prepareDatatable(&$data){
        $result =[];

        foreach ($data as $case) {
            # code...
            $result['data'][] = [
                'id' => $case['id'],
                'name' => $case['name'],
                'gender' => $case['gender'],
                'contacts' => $case['contacts'],
                'age' => $case['age'],
                'offence' => is_null($case['offence_id']) ? $case['offence'] : $case['rOffence']['name'],
                'complainant' => $case['complainant'],
                'policeStation' => is_null($case['police_station_id']) ? $case['policestation'] : $case['rPoliceStation']['name'],
                'first_instance_interview' => $case['first_instance_interview'] == 1 ? true : false,                
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        return $result;
    }
}
