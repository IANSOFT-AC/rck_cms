<?php

namespace frontend\controllers;

use app\models\Counties;
use app\models\Subcounties;
use Yii;
use app\models\RefugeeCamp;
use app\models\RefugeeCampSearch;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'counties' => $counties,
            'subCounties' => $subCounties
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'counties' => $counties,
            'subCounties' => $subCounties
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
