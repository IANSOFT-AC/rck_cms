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
        ];
    }

    /**
     * Lists all CourtCase Sub Categories on Category change.
     * @return mixed
     */

    public function actionCatlists($id)
    {
        $posts = CourtCaseSubcategory::find()
         ->where(['category_id' => $id])
         ->orderBy('id DESC')
         ->all();

         if($posts){
         echo "<option>--Select Sub Category--</option>";
         foreach($posts as $post){
            echo "<option value='".$post->id."'>".$post->name."</option>";
         }
         }
         else{
            echo "<option>-</option>";
         }

    }

    /**

        Upload case court case files
    */
    public function actionFiles($id)
    {
        $uploads = CourtUploads::find()->all();
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

    //Upload files
    public function actionUpload()
    {
        // return json_encode($_POST);
        // die();
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            $rst = $model->upload("court_cases", Yii::$app->request->post()['id'], Yii::$app->request->post()['court_upload_id'] );

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

    public function actionIndex()
    {

        return $this->render('index', [
           //  'dataProvider' => $dataProvider,
        ]);
    }


    public function actionList()
    {
        $cases = CourtCases::find()
            ->joinWith('legalOfficer')
            ->joinWith('counsellor')
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
            ->joinWith('legalOfficer')
            ->joinWith('counsellor')
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

        $natureOfProceedings = ArrayHelper::map(NatureOfProceeding::find()->all(), 'id', 'name');
        $lawyers = ArrayHelper::map(Lawyer::find()->all(), 'id', 'full_names');
        $counsellors = ArrayHelper::map(Counsellors::find()->all(), 'id', 'counsellor');
        $courtCaseCategories = ArrayHelper::map(CourtCaseCategory::find()->all(), 'id', 'name');
        $refugees = ArrayHelper::map(Refugee::find()->all(), 'id', 'fullNames');
        $offences = ArrayHelper::map(Offence::find()->all(), 'id', 'name');

        return $this->render('create', [
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

    protected function prepareDatatable($data){
        $result =[];

        foreach ($data as $case) {
            # code...
            $result['data'][] = [
                'id' => $case['id'],
                'name' => $case['name'],
                'no_of_refugees' => $case['no_of_refugees'],
                'first_instance_interview' => $case['first_instance_interview'] == 1 ? true : false,
                'next_court_date' => date("l M j, Y",$case['next_court_date']),
                'offence' => $case['offence'],
                //'magistrate' => $case['magistrate']['names'],
                //'counsellor' => $case['counsellor']['counsellor'],
                //'legal_officer' => $case['legalOfficer']['lawfirmName'],
                'date_of_arrainment' => date("l M j, Y",$case['date_of_arrainment']),
                //'case_status' => $case['case_status'],
                'court_case_category' => $case['courtCaseCategory']['name'],
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        return $result;
    }
}
