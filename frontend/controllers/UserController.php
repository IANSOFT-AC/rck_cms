<?php

namespace frontend\controllers;

use Yii;
use app\models\User;
use app\models\Permission;
use app\models\UserGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        $data = User::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'data' => $data
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if(isset(Yii::$app->request->post()['User']['permissions'])){
            if(Yii::$app->request->post()['User']['permissions']){
                $model->permissions = implode(",",Yii::$app->request->post()['User']['permissions']);
            }else{
                $model->permissions = null;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $roles = ArrayHelper::map(UserGroup::find()->all(),'id','group');
        $permissions = Permission::find()->all();

        return $this->render('create', [
            'model' => $model,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function actionSignup()
    {
        //$this->layout = 'login';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // echo "<pre>";
            // print_r(Yii::$app->request->post());
            // exit();
            if(isset(Yii::$app->request->post()['User']['permissions'])){
                $model->permissions = implode(",",Yii::$app->request->post()['User']['permissions']);
            }else{
                $model->permissions = null;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $roles = ArrayHelper::map(UserGroup::find()->all(),'id','group');
        $permissions = Permission::find()->all();

        return $this->render('update', [
            'model' => $model,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
