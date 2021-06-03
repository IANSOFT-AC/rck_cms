<?php

namespace frontend\controllers;

use app\models\TrainingAttachmentLines;
use Yii;
use app\models\Training;
use app\models\Organizer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use app\models\TrainingUpload;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\components\AccessRule;
use app\models\TrainingType;
use app\models\Donor;
use app\models\RckOffices;

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
                            User::TRAINING_CREATE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::TRAINING_INDEX,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['files'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::CLIENT_FILES,
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
                            User::CLIENT_UPDATE,
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

        foreach ($cases as $key => $value) {
            # code...
            if(isset($value['organizer_id'])){
                $cases[$key]['organizer'] = $cases[$key]['rOrganizer']['name'];
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

            if($model->save()){
                //Upload participants scan
                $imageFile = UploadedFile::getInstance($model, 'participants_scan');
                if($imageFile){
                  $upload->imageFile = $imageFile;
                  $rst = $upload->upload("training",$model->id, 2 );
                }

                //Upload photos scans
                $multipleFiles = UploadedFile::getInstances($model, 'photos');
                if($multipleFiles){
                  $upload->multipleFiles = $multipleFiles;
                  $rst2 = $upload->multipleUpload("training",$model->id, 2 );
                }
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['update','id' => $model->id]);
            }else{
              foreach ($model->getErrors() as $error){
                Yii::$app->session->setFlash('error', $error[0]);
              }
            }
        }

        $organizers = ArrayHelper::map(Organizer::find()->all(), 'id', 'name');
        $donors = ArrayHelper::map(Donor::find()->all(), 'id', 'name');
        $trainingTypes = ArrayHelper::map(TrainingType::find()->all(), 'id', 'name');
        $offices = ArrayHelper::map(RckOffices::find()->all(), 'id','name');
        $organizers[0] = 'other';

        return $this->render('create', [
            'model' => $model,
            'organizers' => $organizers,
            'donors' => $donors,
            'trainingTypes' => $trainingTypes,
            'offices' => $offices
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
        $upload = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {

            //Upload participants scan
            $scan = UploadedFile::getInstance($model, 'participants_scan');

            if($scan){
              $model->save();
              $upload->imageFile = $scan;
              $rst = $upload->upload("training",$model->id, 2 );
            }else{
              unset($model->participants_scan);
              $model->save();
            }


            if(!empty(UploadedFile::getInstances($model, 'photos'))){
              $upload->multipleFiles = UploadedFile::getInstances($model, 'photos');
              $rst2 = $upload->multipleUpload("training",$model->id, 2 );
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $organizers = ArrayHelper::map(Organizer::find()->all(), 'id', 'name');
        $donors = ArrayHelper::map(Donor::find()->all(), 'id', 'name');
        $trainingTypes = ArrayHelper::map(TrainingType::find()->all(), 'id', 'name');
        $offices = ArrayHelper::map(RckOffices::find()->all(), 'id','name');
        $organizers[0] = 'other';

        return $this->render('update', [
            'model' => $model,
            'organizers' => $organizers,
            'donors' => $donors,
            'trainingTypes' => $trainingTypes,
            'offices' => $offices
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

    public function actionDeleteFile($id)
    {
        $model = new UploadForm();
        $data = TrainingUpload::findOne($id);
        $rst = $model->deleteFile("training",$id);

        return $this->redirect(['view', 'id' => $data->training_id]);
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

    public function actionRead($id)
    {
        $model =  TrainingAttachmentLines::findOne(['id' => $id]);

        $content = base64_encode(file_get_contents($model->filename));

        return $this->render('read',[
            'content' => $content
        ]);
    }
}
