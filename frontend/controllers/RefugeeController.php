<?php

namespace frontend\controllers;

use app\models\Counties;
use app\models\Country;
use app\models\IdentificationType;
use app\models\RefugeeCamp;
use frontend\models\Conflict;
use frontend\models\Gender;
use app\models\Dependant;
use app\models\Relationship;
use app\models\UploadForm;
use app\models\AsylumType;
use yii\web\UploadedFile;
use app\models\RefugeeUploads;
use Yii;
use app\models\Refugee;
use app\models\RefugeeSearch;
use app\models\Language;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ModeOfEntry;
use app\models\RckOffices;
use app\models\SourceOfIncome;
use app\models\SourceOfInfo;
use app\models\FormOfTorture;
use app\models\DisabilityType;
use DateTime;

/**
 * RefugeeController implements the CRUD actions for Refugee model.
 */
class RefugeeController extends Controller
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
     * Lists all Refugee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefugeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Refugee model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // print_r(Dependant::find()->where(['refugee_id' => $id])->all());
        // exit;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dependant' => new Dependant(),
            'dependants' => Dependant::find()->where(['refugee_id' => $id])->all(),
            'relationships' => ArrayHelper::map(Relationship::find()->all(),'id','name')  
        ]);
    }

    public function actionCamps($id)
    {
        $posts = RefugeeCamp::find()
         ->where(['rck_office' => $id])
         ->orderBy('id DESC')
         ->all();

         if($posts){
         echo "<option value=''>--Select Camp--</option>";
         foreach($posts as $post){
            echo "<option value='".$post->id."'>".$post->name."</option>";
         }
         }
         else{
         }

    }

    //Add Dependant
    public function actionDependant()
    {
        $model = new Dependant();

        

        if ($model->load(Yii::$app->request->post())) {
            $existingDependantsCount = Dependant::find()->where(['refugee_id' => Yii::$app->request->post()['refugee_id'] ])->count();
            $client = $this->findModel(Yii::$app->request->post()['refugee_id']);
            if($client->dependants > $existingDependantsCount){
                $model->save();
                Yii::$app->getSession()->setFlash('success', 'Dependant successfully added');
                return $this->redirect(['view', 'id' => Yii::$app->request->post()['refugee_id']]);
            }else{
                Yii::$app->getSession()->setFlash('error', 'You can only add upto '.$client->dependants.' dependants');
                return $this->redirect(['view', 'id' => Yii::$app->request->post()['refugee_id']]);
            }
            
        }
    }

    public function actionFiles($id){
        $model = $this->findModel($id);
        $uploads = RefugeeUploads::find()->where(['type'=> $model->asylum_status])->all();
        

        //HANDLE POST OF FILES.
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('files', [
            'list' => $uploads,
            'model' => $model
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
                $rst = $model->upload("refugees", Yii::$app->request->post()['id'], Yii::$app->request->post()['refugee_upload_id']); 
            }   

            $model->multipleFiles = UploadedFile::getInstances($model, 'multipleFiles');
            if($model->multipleFiles){
                $rst = $model->multipleUpload("refugees", Yii::$app->request->post()['id'], 0);
            }

            if ($rst) {
                //Yii::$app->session->setFlash('success', "You have successfully uploaded the files and created a record");
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->statusCode = 200;
                return $this->asJson(['msg' => "file uploaded successfully"]);
            }else{
                //Yii::$app->session->setFlash('error', "Sorry, something went wrong. Try again");
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                Yii::$app->response->statusCode = 400;
                return $this->asJson(['msg' => "file upload failed",'error'=> $rst]);
            }
        }
    }

    public function actionList()
    {
        $clients = Refugee::find()
            ->joinWith('rcountry')
            ->joinWith('rgender')
            ->asArray()
            ->all();

         // echo "<pre>";
         // print_r($clients);
         // exit;

        $result =[];

        foreach ($clients as $case) {
            # code...
            $result['data'][] = [
                'id' => $case['id'],
                'first_name' => $case['first_name'],
                'middle_name' => $case['middle_name'],
                'last_name' => $case['last_name'],
                'id_no' => $case['id_no'],
                'unhcr_case_no' => $case['nhcr_case_no'],
                'cell_number' => $case['cell_number'],
                'rck_no' => $case['rck_no'],
                'old_rck' => $case['old_rck'],
                'gender' => $case['rgender']['gender'],
                'email' => $case['email_address'],
                'country' => $case['rcountry']['country'],
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $result;
    }

    public function actionTest(){
        $date = new DateTime();
        $model = Refugee::findOne(2);
        // echo "<pre>";
        // print_r($model->rckOffice->code);
        // exit();
        $rck_no = $model->rckOffice->code ."-". $model->id."-".$date->format('Y');
        echo $rck_no;
    }

    /**
     * Creates a new Refugee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Refugee();
        $IdTypes = ArrayHelper::map(IdentificationType::find()->all(),'id','identification');
        $camps = ArrayHelper::map(RefugeeCamp::find()->all(),'id','name');
        $conflicts = ArrayHelper::map(Conflict::find()->all(),'id','conflict');
        $countries = ArrayHelper::map(Country::find()->all(),'id','country');
        $gender = ArrayHelper::map(Gender::find()->all(),'id','gender');
        $modeOfEntry = ArrayHelper::map(ModeOfEntry::find()->all(),'id','name');
        $rck_offices = ArrayHelper::map(RckOffices::find()->all(),'id','name');
        $asylum_types = ArrayHelper::map(AsylumType::find()->all(),'id','name');

        $sourceOfInfo = ArrayHelper::map(SourceOfInfo::find()->all(), 'id', 'name');
        $sourceOfIncome = ArrayHelper::map(SourceOfIncome::find()->all(), 'id', 'name');
        $formOfTorture = ArrayHelper::map(FormOfTorture::find()->all(), 'id', 'name');
        $disabilityType = ArrayHelper::map(DisabilityType::find()->all(), 'id', 'name');
        $languages = ArrayHelper::map(Language::find()->all(), 'id', 'name');
        $languages[0] = 'other';
        $formOfTorture[0] = 'other';
        $sourceOfInfo[0] = 'other';
        $sourceOfIncome[0] = 'other';
        $disabilityType[0] = 'other';

        if ($model->load(Yii::$app->request->post()) ) {

            $model->date_of_birth = date('Y-m-d',strtotime(Yii::$app->request->post()['Refugee']['date_of_birth']));
            if(isset(Yii::$app->request->post()['Refugee']['source_of_income_id'])){
                $model->source_of_income_id = implode(',',Yii::$app->request->post()['Refugee']['source_of_income_id']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['form_of_torture_id'])){
                $model->form_of_torture_id = implode(',',Yii::$app->request->post()['Refugee']['form_of_torture_id']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['disability_type_id'])){
                $model->disability_type_id = implode(',',Yii::$app->request->post()['Refugee']['disability_type_id']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['languages'])){
                $model->languages = implode(',',Yii::$app->request->post()['Refugee']['languages']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['spoken_languages'])){
                $model->spoken_languages = implode(',',Yii::$app->request->post()['Refugee']['spoken_languages']);
            }

            $model->save();
            
            return $this->redirect(['files', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'IdTypes' =>  $IdTypes,
            'camps' => $camps ,
            'conflicts' => $conflicts,
            'countries' => $countries,
            'gender' => $gender,
            'modeOfEntry' => $modeOfEntry,
            'rck_offices' => $rck_offices,
            'asylum_types' => $asylum_types,
            'sourceOfIncome' => $sourceOfIncome,
            'sourceOfInfo' => $sourceOfInfo,
            'formOfTorture' => $formOfTorture,
            'disabilityType' => $disabilityType,
            'languages' => $languages
        ]);
    }

    /***

        

    */

    /**
     * Updates an existing Refugee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $IdTypes = ArrayHelper::map(IdentificationType::find()->all(),'id','identification');
        $camps = ArrayHelper::map(RefugeeCamp::find()->all(),'id','name');
        $conflicts = ArrayHelper::map(Conflict::find()->all(),'id','conflict');
        $countries = ArrayHelper::map(Country::find()->all(),'id','country');
        $gender = ArrayHelper::map(Gender::find()->all(),'id','gender');
        $modeOfEntry = ArrayHelper::map(ModeOfEntry::find()->all(),'id','name');
        $rck_offices = ArrayHelper::map(RckOffices::find()->all(),'id','name');
        $asylum_types = ArrayHelper::map(AsylumType::find()->all(),'id','name');

        $sourceOfInfo = ArrayHelper::map(SourceOfInfo::find()->all(), 'id', 'name');
        $sourceOfIncome = ArrayHelper::map(SourceOfIncome::find()->all(), 'id', 'name');
        $formOfTorture = ArrayHelper::map(FormOfTorture::find()->all(), 'id', 'name');
        $disabilityType = ArrayHelper::map(DisabilityType::find()->all(), 'id', 'name');
        $languages = ArrayHelper::map(Language::find()->all(), 'id', 'name');
        $languages[0] = 'other';
        $formOfTorture[0] = 'other';
        $sourceOfInfo[0] = 'other';
        $sourceOfIncome[0] = 'other';
        $disabilityType[0] = 'other';

        if ($model->load(Yii::$app->request->post()) ) {
            // echo "<pre>";
            // print_r(Yii::$app->request->post()['Refugee']);
            // exit();
            $model->date_of_birth = date('Y-m-d',strtotime(Yii::$app->request->post()['Refugee']['date_of_birth']));
            if(isset(Yii::$app->request->post()['Refugee']['source_of_income_id'])){
                $model->source_of_income_id = implode(',',Yii::$app->request->post()['Refugee']['source_of_income_id']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['form_of_torture_id'])){
                $model->form_of_torture_id = implode(',',Yii::$app->request->post()['Refugee']['form_of_torture_id']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['disability_type_id'])){
                $model->disability_type_id = implode(',',Yii::$app->request->post()['Refugee']['disability_type_id']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['languages'])){
                $model->languages = implode(',',Yii::$app->request->post()['Refugee']['languages']);
            }
            if(isset(Yii::$app->request->post()['Refugee']['spoken_languages'])){
                $model->spoken_languages = implode(',',Yii::$app->request->post()['Refugee']['spoken_languages']);
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'IdTypes' =>  $IdTypes,
            'camps' => $camps ,
            'conflicts' => $conflicts,
            'countries' => $countries,
            'gender' => $gender,            
            'modeOfEntry' => $modeOfEntry,
            'rck_offices' => $rck_offices,
            'asylum_types' => $asylum_types,
            'sourceOfIncome' => $sourceOfIncome,
            'sourceOfInfo' => $sourceOfInfo,
            'formOfTorture' => $formOfTorture,
            'disabilityType' => $disabilityType,
            'languages' => $languages
        ]);
    }

    /**
     * Deletes an existing Refugee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Refugee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Refugee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Refugee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
