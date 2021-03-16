<?php

namespace frontend\controllers;

use Yii;
use app\models\Counseling;
use app\models\Intervention;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use common\models\User;
use common\components\AccessRule;

/**
 * CounselingController implements the CRUD actions for Counseling model.
 */
class CounselingController extends Controller
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
                            User::COUNSELING_CREATE,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::COUNSELING_INDEX,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['files'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::COUNSELING_FILES,
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
                            User::COUNSELING_UPDATE,
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
     * Lists all Counseling models.
     * @return mixed
     */

    public function actionIndex($id)
    {
        //index page is awesome, testing permissions. Now fully working cd workflow

        $data = Counseling::find()->where(['intervention_id' => $id])->all();
        $model = new Intervention();
        $intervention = Intervention::findOne($id);

        return $this->render('index', [
            'data' => $data,
            'intervention' => $intervention,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Counseling model.
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
     * Creates a new Counseling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Counseling();
        $intervention = Intervention::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'intervention' => $intervention->id
        ]);
    }

    public function actionUpload(){
        $intervention = Intervention::findOne(Yii::$app->request->post()['Intervention']['intervention_id']);
        if($intervention){
            $model = new Intervention();

            $upload = new UploadForm();
            $upload->imageFile = UploadedFile::getInstance($model, 'counseling_intake_form');
            $rst = $upload->upload("counseling", $intervention->id, 0 );
            if($rst){
                Yii::$app->session->setFlash('success', "You have successfully uploaded the files and created a record");
                return $this->redirect(['index', 'id' => $intervention->id]);
            }else{
                Yii::$app->session->setFlash('error', "You have an error in your upload process, kindly try again");
                return $this->redirect(['index', 'id' => $intervention->id]);
            }
        }else{
            Yii::$app->session->setFlash('error', "You have an error: No intervention found");
                return $this->redirect(['index', 'id' => Yii::$app->request->post()['Intervention']['intervention_id']]);
        }
    }

    /**
     * Updates an existing Counseling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $upload = new UploadForm();
            $upload->imageFile = UploadedFile::getInstance($model, 'counseling_intake_form');
            $rst = $upload->upload("counseling", $model->id, 0 );

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'intervention' => $model->intervention_id
        ]);
    }

    /**
     * Deletes an existing Counseling model.
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
     * Finds the Counseling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Counseling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Counseling::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
