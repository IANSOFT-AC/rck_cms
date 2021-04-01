<?php

namespace frontend\controllers;

use Yii;
use app\models\CourtCases;
use app\models\CourtUploads;
use app\models\CourtCaseSubcategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Lawyer;
use app\models\Refugee;
use app\models\CourtCaseProceeding;
use app\models\Counsellors;
use app\models\CourtCaseCategory;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\NatureOfProceeding;
use app\models\Offence;
use app\models\CourtDocsUploads;
use common\models\User;
use common\components\AccessRule;

/**
 * CourtCasesController implements the CRUD actions for CourtCases model.
 */
class CourtCasesController extends Controller
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
                    'files' => ['POST','GET']
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
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::COURT_CREATE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::COURT_INDEX,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow moderators and admins to update
                        'roles' => [
                            User::COURT_UPDATE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['files'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::COURT_FILES,
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
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all CourtCase Sub Categories on Category change.
     * @return mixed
     */

    public function actionCatlists($id)
    {
        $posts = Offence::find()
         ->where(['offence_type' => $id])
         ->orderBy('id DESC')
         ->all();

         if($posts){
            echo "<option>--Select Offence--</option>";
            foreach($posts as $post){
                echo "<option value='".$post->id."'>".$post->name."</option>";
            }
         }
         else{
            echo "<option>--No offences--</option>";
         }

    }

    /**

        Upload case court case files
    */
    public function actionFiles($id)
    {
        $uploads = CourtUploads::find()->all();
        $model = $this->findModel($id);
        $categoryUploads = CourtCaseSubcategory::find()->where(['category_id' => $model->court_case_category_id])->all();
        

        //HANDLE POST OF FILES.
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('files', [
            'list' => $uploads,
            'model' => $model,
            'categoryUploads' => $categoryUploads
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
                //Edit here to accomodate subcategory uploads
                if(isset(Yii::$app->request->post()['court_upload_id'])){
                    $rst = $model->upload("court_cases", Yii::$app->request->post()['id'], Yii::$app->request->post()['court_upload_id']); 
                }else if(isset(Yii::$app->request->post()['subcat_upload_id'])){
                    $rst = $model->upload("court_cases", Yii::$app->request->post()['id'], Yii::$app->request->post()['subcat_upload_id'], 'subcat'); 
                }
            }

            $model->multipleFiles = UploadedFile::getInstances($model, 'multipleFiles');
            if($model->multipleFiles){
                $rst = $model->multipleUpload("court_cases", Yii::$app->request->post()['id'], 0);
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

    public function actionIndex()
    {

        return $this->render('index', [
           //  'dataProvider' => $dataProvider,
        ]);
    }


    public function actionList()
    {
        $cases = CourtCases::find()
            ->joinWith('rLegalOfficer')
            ->joinWith('rCounsellor')
            ->joinWith('rOffence')
            ->joinWith('courtCaseCategory')
            ->joinWith('courtCaseSubcategory')
            ->asArray()
            ->all();        

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->prepareDatatable($cases);
       // print '<pre>'; print_r($cases);

    }

    public function actionClientList($id)
    {
        $cases = CourtCases::find()
            ->where([
                'court_cases.refugee_id'=>$id
            ])
            ->joinWith('rLegalOfficer')
            ->joinWith('rCounsellor')
            ->joinWith('rOffence')
            ->joinWith('courtCaseCategory')
            ->joinWith('courtCaseSubcategory')
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
     * Displays a single CourtCases model.
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
     * Creates a new CourtCases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    


    public function actionCreate()
    {
        $model = new CourtCases();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$model->date_of_arrainment = strtotime(Yii::$app->request->post()['CourtCases']['date_of_arrainment']);
             //$model->save();
            return $this->redirect(['files', 'id' => $model->id]);
        }

        $refugee_id = is_null(Yii::$app->request->get('id')) ? null : Yii::$app->request->get('id');

        $natureOfProceedings = ArrayHelper::map(NatureOfProceeding::find()->all(), 'id', 'name');
        $lawyers = ArrayHelper::map(Lawyer::find()->all(), 'id', 'full_names');
        $counsellors = ArrayHelper::map(Counsellors::find()->all(), 'id', 'counsellor');
        $courtCaseCategories = ArrayHelper::map(CourtCaseCategory::find()->all(), 'id', 'name');
        $refugees = ArrayHelper::map(Refugee::find()->all(), 'id', 'fullNames');
        $offences = ArrayHelper::map(Offence::find()->all(), 'id', 'name');
        $offences[0] = 'other';
        $lawyers[0] = 'other';
        $counsellors[0] = 'other';

        return $this->render('create', [
            'model' => $model,
            'natureOfProceedings' => $natureOfProceedings,
            'lawyers' => $lawyers,
            'counsellors' => $counsellors,
            'courtCaseCategories' => $courtCaseCategories,
            'refugees' => $refugees,
            'offences' => $offences,
            'refugee_id' => $refugee_id
        ]);
    }

    /**
     * Updates an existing CourtCases model.
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

        $natureOfProceedings = ArrayHelper::map(NatureOfProceeding::find()->all(), 'id', 'name');
        $lawyers = ArrayHelper::map(Lawyer::find()->all(), 'id', 'full_names');
        $counsellors = ArrayHelper::map(Counsellors::find()->all(), 'id', 'counsellor');
        $courtCaseCategories = ArrayHelper::map(CourtCaseCategory::find()->all(), 'id', 'name');
        $refugees = ArrayHelper::map(Refugee::find()->all(), 'id', 'fullNames');
        $offences = ArrayHelper::map(Offence::find()->all(), 'id', 'name');
        $offences[0] = 'other';
        $lawyers[0] = 'other';
        $counsellors[0] = 'other';

        return $this->render('update', [
            'model' => $model,
            'natureOfProceedings' => $natureOfProceedings,
            'lawyers' => $lawyers,
            'counsellors' => $counsellors,
            'courtCaseCategories' => $courtCaseCategories,
            'refugees' => $refugees,
            'offences' => $offences
        ]);
    }

    /**
     * Deletes an existing CourtCases model.
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
        $data = CourtDocsUploads::findOne($id);
        $rst = $model->deleteFile("court_cases",$id);

        return $this->redirect(['view','id' => $data->court_case_id]);
    }

    /**
     * Finds the CourtCases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CourtCases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CourtCases::findOne($id)) !== null) {
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
                'no_of_refugees' => $case['no_of_refugees'],
                'first_instance_interview' => $case['first_instance_interview'] == 1 ? true : false,
                'next_court_date' => date("l M j, Y",$case['next_court_date']),
                'offence' => is_null($case['offence_id']) ? $case['offence'] : $case['rOffence']['name'],
                //'magistrate' => $case['magistrate']['names'],
                'counsellor' => is_null($case['counsellor_id']) ? $case['counsellor'] : $case['rCounsellor']['counsellor'],
                'legal_officer' => is_null($case['legal_officer_id']) ? $case['legal_officer'] : $case['rLegalOfficer']['lawfirmName'],
                'date_of_arrainment' => date("l M j, Y",$case['date_of_arrainment']),
                //'case_status' => $case['case_status'],
                'court_case_category' => $case['courtCaseCategory']['name'],
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }
        return $result;
    }
}
