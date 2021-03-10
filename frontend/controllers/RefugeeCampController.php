<?php

namespace frontend\controllers;

use app\models\Counties;
use app\models\Subcounties;
use Yii;
use app\models\RefugeeCamp;
use app\models\RefugeeCampSearch;
use app\models\RckOffices;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefugeeCampController implements the CRUD actions for RefugeeCamp model.
 */
class RefugeeCampController extends Controller
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
                    'class' => \common\components\AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete',  'index'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            \common\models\User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            \common\models\User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        // Allow moderators and admins to update
                        'roles' => [
                            \common\models\User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            \common\models\User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all RefugeeCamp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RefugeeCampSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RefugeeCamp model.
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
     * Creates a new RefugeeCamp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RefugeeCamp();

        $counties = ArrayHelper::map(Counties::find()->all(),'CountyID','CountyName');
        $subCounties = ArrayHelper::map(Subcounties::find()->all(),'SubCountyID','SubCountyName');
        $rckOffices = ArrayHelper::map(RckOffices::find()->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'counties' => $counties,
            'subCounties' => $subCounties,
            'rckOffices' => $rckOffices
        ]);
    }

    /**
     * Updates an existing RefugeeCamp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $counties = ArrayHelper::map(Counties::find()->all(),'CountyID','CountyName');
        $subCounties = ArrayHelper::map(Subcounties::find()->all(),'SubCountyID','SubCountyName');
        $rckOffices = ArrayHelper::map(RckOffices::find()->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'counties' => $counties,
            'subCounties' => $subCounties,
            'rckOffices' => $rckOffices
        ]);
    }

    /*  Get subcounties of a particular county */

    public function actionSubcounties($county)
    {
       $subCountiesCount = Subcounties::find()->where(['CountyID' => $county])->count();

       $subCounties = Subcounties::find()->where(['countyID' => $county])->all();

       if($subCountiesCount > 0 )
       {
            foreach($subCounties  as $sb )
            {
                echo "<option value='$sb->SubCountyID'>".$sb->SubCountyName."</option>";
            }
       }else{
            echo "<option>No Sub-Counties Available</option>";
       }
    }

    /**
     * Deletes an existing RefugeeCamp model.
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
     * Finds the RefugeeCamp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RefugeeCamp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RefugeeCamp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
