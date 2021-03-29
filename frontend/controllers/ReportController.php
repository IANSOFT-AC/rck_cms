<?php

namespace frontend\controllers;

use Yii;
use app\models\Relationship;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Refugee;
use app\models\Country;
use Carbon\Carbon;
use app\models\RckOffices;
use app\models\SourceOfInfo;
use app\models\FormOfTorture;

class ReportController extends \yii\web\Controller
{
    //COMPUTATIONS BY COUNTRIES
    public function actionByCountry()
    {
        if (Yii::$app->request->post()) {
            //Refugee::find()->where(['between', 'created_at', Yii::$app->request->post()['start_date'], Yii::$app->request->post()['end_date']])->all();
            $countries = Country::find()->all();
            $data = [];
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
            foreach ($countries as $key => $country):
                $count = 0;
                //male and is refugee
                $data[$key] = [];
                $num = Refugee::find()->select('COUNT(*) AS count')
                    ->where([
                        'country_of_origin' => $country->id,
                        'gender' => 1,
                        'asylum_status' => 2
                    ])
                    ->andWhere(['between', 'created_at', $start_date, $end_date])
                    ->asArray()->all()[0]['count'];
                $data[$key][0] = $country->country;
                $data[$key][1] = $num;
                $count += $num;

                //male and is asylum seeker
                $num = Refugee::find()->select('COUNT(*) AS count')
                ->where([
                    'country_of_origin' => $country->id,
                    'gender' => 1,
                    'asylum_status' => 1
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray()->all()[0]['count'];
                $data[$key][2] = $num;
                $count += $num;

                //female and is refugee
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'country_of_origin' => $country->id,
                    'gender' => 2,
                    'asylum_status' => 2
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray()->all()[0]['count'];
                $data[$key][3] = $num;
                $count += $num;

                //female and is asylum seeker
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'country_of_origin' => $country->id,
                    'gender' => 2,
                    'asylum_status' => 1
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray()->all()[0]['count'];
                $data[$key][4] = $num;
                $count += $num;

                //Do Subtotals
                $data[$key][5] = $count;
                //reset the counter for subtotals
                $count = 0;
            endforeach;

            //return $this->asJson(['msg' => "formatted data",'data'=> $data]);
            return $this->render('index', [
                'data' => $data,
                'type' => 'country',
                'title' => 'Pull Report by Country',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }

        return $this->render('index', [
            'title' => 'Pull Report by Country'
        ]);
    }












    //COMPUTATIONS BY COUNTRIES
    public function actionByOffice()
    {
        if (Yii::$app->request->post()) {
            Refugee::find()->where(['between', 'created_at', $start, $end])->all();
        }

        $offices = RckOffices::find()->all();
        $data = [];
        foreach ($offices as $key => $office):
            $count = 0;
            //male and is refugee
            $data[$key] = [];
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'rck_office_id' => $office->id,
                'gender' => 1,
                'asylum_status' => 2
            ])->asArray()->all()[0]['count'];
            $data[$key][0] = $office->name;
            $data[$key][1] = $num;
            $count += $num;

            //male and is asylum seeker
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'rck_office_id' => $office->id,
                'gender' => 1,
                'asylum_status' => 1
            ])->asArray()->all()[0]['count'];
            $data[$key][2] = $num;
            $count += $num;

            //female and is refugee
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'rck_office_id' => $office->id,
                'gender' => 2,
                'asylum_status' => 2
            ])->asArray()->all()[0]['count'];
            $data[$key][3] = $num;
            $count += $num;

            //female and is asylum seeker
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'rck_office_id' => $office->id,
                'gender' => 2,
                'asylum_status' => 1
            ])->asArray()->all()[0]['count'];
            $data[$key][4] = $num;
            $count += $num;

            //Do Subtotals
            $data[$key][5] = $count;
            //reset the counter for subtotals
            $count = 0;
        endforeach;

        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return $this->asJson(['msg' => "formatted data",'data'=> $data]);
        return $this->render('index', [
            'data' => $data,
            'title' => 'Pull Report by Office'
        ]);
    }





    //BY SOURCE OF INFO
    public function actionBySourceOfInfo()
    {
        if (Yii::$app->request->post()) {
            Refugee::find()->where(['between', 'created_at', $start, $end])->all();
        }

        $sources = SourceOfInfo::find()->all();
        $data = [];
        foreach ($sources as $key => $source):
            $count = 0;
            //male
            $data[$key] = [];
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'source_of_info_id' => $source->id,
                'gender' => 1,
            ])->asArray()->all()[0]['count'];
            $data[$key][0] = $source->name;
            $data[$key][1] = $num;
            $count += $num;

            //female
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'source_of_info_id' => $source->id,
                'gender' => 2,
            ])->asArray()->all()[0]['count'];
            $data[$key][3] = $num;
            $count += $num;


            //Do Subtotals
            $data[$key][5] = $count;
            //reset the counter for subtotals
            $count = 0;
        endforeach;

        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return $this->asJson(['msg' => "formatted data",'data'=> $data]);
        return $this->render('index', [
            'data' => $data,
            'title' => 'Pull Report by Source of Information'
        ]);
    }






    //BY FORMS OF TORTURE
    public function actionByFormsOfTorture()
    {
        if (Yii::$app->request->post()) {
            Refugee::find()->where(['between', 'created_at', $start, $end])->all();
        }

        $forms = FormOfTorture::find()->all();
        $data = [];
        foreach ($forms as $key => $form):
            $count = 0;
            //male
            $data[$key] = [];
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'form_of_torture_id' => $form->id,
                'gender' => 1,
            ])->asArray()->all()[0]['count'];
            $data[$key][0] = $form->name;
            $data[$key][1] = $num;
            $count += $num;

            //female
            $num = Refugee::find()->select('COUNT(*) AS count')->where([
                'form_of_torture_id' => $form->id,
                'gender' => 2,
            ])->asArray()->all()[0]['count'];
            $data[$key][3] = $num;
            $count += $num;


            //Do Subtotals
            $data[$key][5] = $count;
            //reset the counter for subtotals
            $count = 0;
        endforeach;

        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return $this->asJson(['msg' => "formatted data",'data'=> $data]);
        return $this->render('index', [
            'data' => $data,
            'title' => 'Pull Report by Forms of Torture'
        ]);
    }






    //COMPUTATIONS BY AGE GROUP

    public function actionByAge()
    {
        if (Yii::$app->request->post()) {
            Refugee::find()->where(['between', 'created_at', $start, $end])->all();
        }
        $data =[[0,0,0,0,0,0],[0,0,0,0,0,0],[0,0,0,0,0,0]];
        $dates = [];
        
        $clients = Refugee::find()->all();

        //clasify cumulatives by gender and age
        foreach ($clients as $key => $val) {
            # code...
            if($val->gender == 1){
                //Male
                $class = self::ageClassify($val->date_of_birth);
                $data = self::arrayInitialize($data,0,$class);
            }

            if($val->gender == 2){
                //Female
                $class = self::ageClassify($val->date_of_birth);
                $data = self::arrayInitialize($data,1,$class);
            }

            if($val->gender == 3){
                //LGBT AND THE GENDER FUNNY
                $class = self::ageClassify($val->date_of_birth);
                $data = self::arrayInitialize($data,2,$class);
            }
        }

        //Calculate Sub-Totals
        $vertical = [];
        $horizontal = [];
        $totals = 0;
        
        foreach ($data as $key => $array) {
            # code...
            $total = 0;
            foreach ($array as $innerKey => $val):
                if(!isset($vertical[$key])){
                    $vertical[$key] = 0;
                }
                if(!isset($horizontal[$innerKey])){
                    $horizontal[$innerKey] = 0;
                }
                $vertical[$key] += $val;
                $horizontal[$innerKey] += $val;
                $totals += $val;
            endforeach;
        }

        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return $this->asJson(['msg' => "formatted data",'data'=> $data,'horizontal' => $horizontal, 'vertical' => $vertical, 'total' => $totals]);
        return $this->render('index', [
            'data'=> $data,
            'horizontal' => $horizontal, 
            'vertical' => $vertical, 
            'total' => $totals,
            'title' => 'Pull Report by Age'
        ]);
    }

    public static function arrayInitialize($main,$index,$key){
        if(!isset($main[$index][$key])){
            $main[$index] = array($key => 1);
            return $main;
        }
        $main[$index][$key] += 1;
        return $main;
    }

    public static function ageClassify($dobTimestamp){
        $ageRanges = ['0-18','19-25','26-35','36-45','46-60','60+'];
        //calculate age.
        $dob = Carbon::createFromTimestamp($dobTimestamp, 'Africa/Nairobi');
        $age = Carbon::now()->diffInYears($dob);
        //classify age.
        if($age <= 18){// 0-18 years
            return 0; 
        }else if($age > 18 && $age <= 25){// 19-25 years
            return 1; 
        }else if($age > 25 && $age <= 35){// 26-35 years
            return 2; 
        }else if($age > 35 && $age <= 45){// 36-45 years
            return 3; 
        }else if($age > 45 && $age <= 60){// 46-60 years
            return 4; 
        }else if($age > 60){// 60+ years
            return 5; 
        }  
    }
}
