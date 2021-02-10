<?php

namespace frontend\controllers;

use Yii;
use app\models\Training;
use app\models\Organizer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\helpers\ArrayHelper;

/**
 * TrainingController implements the CRUD actions for Training model.
 */
class TrainingController extends Controller
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
     * Lists all Training models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList(){
        $cases = Training::find()
            ->joinWith('rOrganizer')
            ->asArray()
            ->all();
            
        $newCases=[];
        foreach ($cases as $key => $value) {
            # code...
            if(isset($value['organizer_id'])){
                $cases[$key]['organizer'] = $cases[$key]['rOrganizer']['name'];
                $newCases[$key] = $cases[$key];
            }else{
                $newCases[$key] = $cases[$key];
            }
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->prepareDatatable($cases);
    }

    /**
     * Displays a single Training model.
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
     * Creates a new Training model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Training();
        $upload = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            
            //Upload participants scan
            $upload->imageFile = UploadedFile::getInstance($model, 'participants_scan');
            $rst = $upload->upload("training",$model->id, 2 );
            
            //Upload photos scans
            $upload->multipleFiles = UploadedFile::getInstances($model, 'photos');
            $rst2 = $upload->multipleUpload("training",$model->id, 2 );

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $organizers = ArrayHelper::map(Organizer::find()->all(), 'id', 'name');
        $organizers[0] = 'other';

        return $this->render('create', [
            'model' => $model,
            'organizers' => $organizers
        ]);
    }

    /**
     * Updates an existing Training model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            
            //Upload participants scan
            $upload->imageFile = UploadedFile::getInstance($model, 'participants_scan');
            $rst = $upload->upload("training",$model->id, 2 );
            
            //Upload photos scans
            $upload->multipleFiles = UploadedFile::getInstances($model, 'photos');
            $rst2 = $upload->multipleUpload("training",$model->id, 2 );
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $organizers = ArrayHelper::map(Organizer::find()->all(), 'id', 'name');
        $organizers[0] = 'other';

        return $this->render('update', [
            'model' => $model,
            'organizers' => $organizers
        ]);
    }

    /**
     * Deletes an existing Training model.
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
     * Finds the Training model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Training the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Training::findOne($id)) !== null) {
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
                'organizer' => $case['organizer'],
                'date' => date("l M j, Y",$case['date']),
                'topic' => $case['topic'],
                'venue' => $case['venue'],
                'facilitators' => $case['facilitators'],
                'no_of_participants' => $case['no_of_participants'],               
                'created_at' => date("H:ia l M j, Y",$case['created_at'])
            ];
        }

        return $result;
    }
}
