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
use app\models\CourtCases;
use app\models\PoliceCases;
use Carbon\Carbon;
use app\models\RckOffices;
use app\models\SourceOfInfo;
use app\models\FormOfTorture;
use app\models\SecurityInterview;
use app\models\Training;
use app\models\TrainingType;
use app\models\Intervention;
use yii\db\Expression;

class ReportController extends \yii\web\Controller
{
    //COMPUTATIONS BY COUNTRIES
    public function actionByCountry()
    {
        $offices = RckOffices::find()->all();
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

                if(Yii::$app->request->post()['office'] != 'all'){
                  $num = Refugee::find()->select('COUNT(*) AS count')
                      ->where([
                          'country_of_origin' => $country->id,
                          'gender' => 1,
                          'rck_office_id' => Yii::$app->request->post()['office'],
                          'asylum_status' => 2
                      ])
                      ->andWhere(['between', 'created_at', $start_date, $end_date])
                      ->asArray()->all()[0]['count'];
                }else{
                  $num = Refugee::find()->select('COUNT(*) AS count')
                      ->where([
                          'country_of_origin' => $country->id,
                          'gender' => 1,
                          'asylum_status' => 2
                      ])
                      ->andWhere(['between', 'created_at', $start_date, $end_date])
                      ->asArray()->all()[0]['count'];
                }
                $data[$key][0] = $country->country;
                $data[$key][1] = $num;

                //male and is asylum seeker

                if(Yii::$app->request->post()['office'] != 'all'){
                  $num = Refugee::find()->select('COUNT(*) AS count')
                  ->where([
                      'country_of_origin' => $country->id,
                      'gender' => 1,
                      'rck_office_id' => Yii::$app->request->post()['office'],
                      'asylum_status' => 1
                  ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()->all()[0]['count'];
                }else{
                  $num = Refugee::find()->select('COUNT(*) AS count')
                  ->where([
                      'country_of_origin' => $country->id,
                      'gender' => 1,
                      'asylum_status' => 1
                  ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()->all()[0]['count'];
                }
                $data[$key][2] = $num;

                //female and is refugee

                if(Yii::$app->request->post()['office'] != 'all'){
                  $num = Refugee::find()->select('COUNT(*) AS count')->where([
                      'country_of_origin' => $country->id,
                      'gender' => 2,
                      'rck_office_id' => Yii::$app->request->post()['office'],
                      'asylum_status' => 2
                  ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()->all()[0]['count'];
                }else{
                  $num = Refugee::find()->select('COUNT(*) AS count')->where([
                      'country_of_origin' => $country->id,
                      'gender' => 2,
                      'asylum_status' => 2
                  ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()->all()[0]['count'];
                }
                $data[$key][3] = $num;

                //female and is asylum seeker

                if(Yii::$app->request->post()['office'] != 'all'){
                  $num = Refugee::find()->select('COUNT(*) AS count')->where([
                      'country_of_origin' => $country->id,
                      'gender' => 2,
                      'rck_office_id' => Yii::$app->request->post()['office'],
                      'asylum_status' => 1
                  ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()->all()[0]['count'];
                }else{
                  $num = Refugee::find()->select('COUNT(*) AS count')->where([
                      'country_of_origin' => $country->id,
                      'gender' => 2,
                      'asylum_status' => 1
                  ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()->all()[0]['count'];
                }
                $data[$key][4] = $num;
            endforeach;

            //GET TOTALS FOR THE HORIZONTAL ROW
            $horizontal= [];
            $horizontal[0] = "Subtotals by Gender";
            $vertical= [];
            $total = 0;
            foreach ($data as $key => $innerRow):
                foreach ($innerRow as $innerKey => $val):
                    if(!isset($horizontal[$innerKey])){
                        $horizontal[$innerKey] = 0;
                    }
                    if(!isset($vertical[$key])){
                        $vertical[$key] = 0;
                    }
                    if($innerKey != 0){
                        $horizontal[$innerKey] += $val;
                        $vertical[$key] += $val;
                        $total += $val;
                    }
                endforeach;
            endforeach;

            //return $this->asJson(['msg' => "formatted data",'data'=> $data,'vertical' => $vertical]);
            return $this->render('index', [
                'data' => $data,
                'horizontal' => $horizontal,
                'vertical' => $vertical,
                'total' => $total,
                'type' => 'country',
                'title' => 'Pull Report by Country',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
                'offices' => $offices
            ]);
        }

        return $this->render('index', [
            'title' => 'Pull Report by Nationality',
            'offices' => $offices
        ]);
    }



    //COMPUTATIONS BY COUNTRIES
    public function actionByTraining(){
        $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
            $trainings = Training::find()->select([
              'tt.name as trainingName',
              'sum(training.t0_9) as t0_9',
              'sum(training.t10_19) as t10_19',
              'sum(training.t20_24) as t20_24',
              'sum(training.t25_59) as t25_59',
              'sum(training.t60plus) as t60plus',
              'sum(training.boys) as boys',
              'sum(training.girls) as girls',
              'sum(training.men) as men',
              'sum(training.women) as women',
            ])->leftJoin(['tt'=>TrainingType::find()
                ->select('id,name')
              ], 'tt.id = training.type')
            ->where(['organizer_id' => 1])
            ->andWhere(['between', 'created_at', $start_date, $end_date])
            //->andWhere(['rck_office_id' => Yii::$app->request->post()['office']])
            ->groupBy(['training.type'])
            ->asArray();
            if(Yii::$app->request->post()['office'] != 'all'){
              $trainings->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
            }
            $trainings = $trainings->all();

            //calculate Subtotals
            $rst = self::calculateSubTotals($trainings);
            $horizontal = $rst['horizontal'];
            $vertical = $rst['vertical'];
            $totals = $rst['totals'];

            // echo "<pre>";
            // print_r(json_encode($trainings));
            // exit;

            return $this->render('index', [
                'data' => $trainings,
                'horizontal' => $horizontal,
                'vertical' => $vertical,
                'total' => $totals,
                'offices' => $offices,
                'title' => 'Pull Trainings against Age',
                'type' => 'training',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }

        return $this->render('index', [
            'title' => 'Pull Report by Trainings',
            'offices' => $offices
        ]);
    }



    //COMPUTATIONS BY COUNTRIES
    public function actionCourtCasesByOffice(){
        $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;

            $data = [];
            foreach ($offices as $key => $office):
                $count = 0;
                $data[$key] = [];
                //GET THE IDS OF MALE CLIENTS FROM EACH OFFICE
                $clientIds = Refugee::find()->select('id')->where([
                    'gender' => 1,
                ]);
                if(Yii::$app->request->post()['office'] != 'all'){
                  $clientIds->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $clientIds = $clientIds->column();
                //GET THE NUMBER OF COURT CASES OF THE CLIENTS
                $numOpen = CourtCases::find()->select(new Expression('COALESCE(COUNT(*), 0) as count'))->where([
                    'in','refugee_id' , $clientIds
                ])
                  ->andWhere(['case_status' => 'open'])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()
                  ->all();
                $numClosed = CourtCases::find()->select(new Expression('COALESCE(COUNT(*), 0) as count'))->where([
                    'in','refugee_id' , $clientIds
                ])
                  ->andWhere(['case_status' => 'closed'])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()
                  ->all();
                $data[$key][0] = $office->name;
                $data[$key][1] = [$numOpen[0]['count'],$numClosed[0]['count']];


                //GET THE IDS OF FEMALE CLIENTS FROM EACH OFFICE
                $clientIds = Refugee::find()->select('id')->where([
                    'gender' => 2,
                ]);
                if(Yii::$app->request->post()['office'] != 'all'){
                  $clientIds->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $clientIds = $clientIds->column();
                //GET THE NUMBER OF COURT CASES OF THE CLIENTS
                $numOpen = CourtCases::find()->select('COUNT(*) AS count')->where([
                    'in','refugee_id' , $clientIds
                ])
                  ->andWhere(['case_status' => 'open'])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()
                  ->all();
                $numClosed = CourtCases::find()->select('COUNT(*) AS count')->where([
                    'in','refugee_id' , $clientIds
                ])
                  ->andWhere(['case_status' => 'closed'])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->asArray()
                  ->all();
                $data[$key][2] = [$numOpen[0]['count'], $numClosed[0]['count']];


                //GET THE IDS OF LGBT CLIENTS FROM EACH OFFICE
                $clientIds = Refugee::find()->select('id')->where([
                    'gender' => 3,
                ]);
                if(Yii::$app->request->post()['office'] != 'all'){
                  $clientIds->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $clientIds = $clientIds->column();
                //GET THE NUMBER OF COURT CASES OF THE CLIENTS
                $numOpen = CourtCases::find()->select('COUNT(*) AS count')->where([
                    'in','refugee_id' , $clientIds
                ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->andWhere(['case_status' => 'open'])
                  ->asArray()
                  ->all();

                $numClosed = CourtCases::find()->select('COUNT(*) AS count')->where([
                    'in','refugee_id' , $clientIds
                ])
                  ->andWhere(['between', 'created_at', $start_date, $end_date])
                  ->andWhere(['case_status' => 'closed'])
                  ->asArray()
                  ->all();
                $data[$key][3] = [$numOpen[0]['count'], $numClosed[0]['count']];

                //$count += $num;
            endforeach;

            $vertical = [];
            $horizontal = [];
            $totals = 0;

            foreach ($data as $key => $array) {
                # code...
                //$total = 0;
                foreach ($array as $innerKey => $val):
                    if(!isset($vertical[$key])){
                        $vertical[$key] = 0;
                    }
                    if(!isset($horizontal[$innerKey])){
                        $horizontal[$innerKey][0] = 0;
                        $horizontal[$innerKey][1] = 0;
                    }
                    if($innerKey != 0){
                        $vertical[$key] += $val[0];
                        $vertical[$key] += $val[1];
                        $horizontal[$innerKey][0] += $val[0];
                        $horizontal[$innerKey][1] += $val[1];
                        $totals += $val[0];
                        $totals += $val[1];
                    }
                endforeach;
            }

            //echo "<pre>";
            //print_r(json_encode($data));
            //exit;

            return $this->render('index', [
                'data' => $data,
                'horizontal' => $horizontal,
                'vertical' => $vertical,
                'total' => $totals,
                'offices' => $offices,
                'title' => 'Pull Court Cases Report by Office',
                'type' => 'court-cases',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }
        return $this->render('index', [
            'title' => 'Pull Court Cases Report by Office',
            'offices' => $offices
        ]);
    }



    public function actionBySecurityInterview(){
      $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
            $data = [];
            $data[0] = "Security Interview";
            $data[1] = SecurityInterview::find()->where(['between', 'created_at', $start_date, $end_date])
                ->asArray()->all();

            // echo "<pre>";
            // print_r(json_encode($data));
            // exit;

            return $this->render('index', [
                'data' => $data,
                'title' => 'Pull Security Interview Report by Gender',
                'type' => 'security-report',
                'offices' => $offices,
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }
        return $this->render('index', [
            'title' => 'Pull Security Interview Report by Gender',
            'offices' => $offices
        ]);
    }



    //COMPUTATIONS BY OFFICE
    public function actionByOffice()
    {
        $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
            //$offices = RckOffices::find()->all();
            $data = [];
            foreach ($offices as $key => $office):
                $count = 0;
                //male and is refugee
                $data[$key] = [];
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'gender' => 1,
                    'asylum_status' => 2
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => $office->id]);
                }
                $num = $num->all()[0]['count'];
                $data[$key][0] = $office->name;
                $data[$key][1] = $num;
                $count += $num;

                //male and is asylum seeker
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'gender' => 1,
                    'asylum_status' => 1
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => $office->id]);
                }
                $num = $num->all()[0]['count'];
                $data[$key][2] = $num;
                $count += $num;

                //female and is refugee
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'gender' => 2,
                    'asylum_status' => 2
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => $office->id]);
                }
                $num = $num->all()[0]['count'];
                $data[$key][3] = $num;
                $count += $num;

                //female and is asylum seeker
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'gender' => 2,
                    'asylum_status' => 1
                ])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => $office->id]);
                }
                $num = $num->all()[0]['count'];
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
                // 'horizontal' => $horizontal,
                // 'vertical' => $vertical,
                // 'total' => $totals,
                'offices' => $offices,
                'title' => 'Pull Report by Office',
                'type' => 'office',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }
        return $this->render('index', [
            'title' => 'Pull Report by Office',
            'offices' => $offices
        ]);
    }





    //BY SOURCE OF INFO
    public function actionBySourceOfInfo()
    {
        $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;

            $sources = SourceOfInfo::find()->all();
            $data = [];
            foreach ($sources as $key => $source):
                $count = 0;
                //male
                $data[$key] = [];
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'in','source_of_info_id' ,$source->id
                ])->andWhere(['gender' => 1])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $num = $num->all()[0]['count'];
                array_push($data[$key],$source->name);
                array_push($data[$key],$num);

                //female
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'in','source_of_info_id' ,$source->id
                ])->andWhere(['gender' => 2])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $num = $num->all()[0]['count'];
                array_push($data[$key],$num);

                //LGBT
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'in','source_of_info_id' ,$source->id
                ])->andWhere(['gender' => 3])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $num = $num->all()[0]['count'];
                array_push($data[$key],$num);
            endforeach;


            //GET TOTALS FOR THE HORIZONTAL ROW
            $horizontal= [];
            $horizontal[0] = "Subtotals by Gender";
            $vertical= [];
            $total = 0;
            foreach ($data as $key => $innerRow):
                foreach ($innerRow as $innerKey => $val):
                    if(!isset($horizontal[$innerKey])){
                        $horizontal[$innerKey] = 0;
                    }
                    if(!isset($vertical[$key])){
                        $vertical[$key] = 0;
                    }
                    if($innerKey != 0){
                        $horizontal[$innerKey] += $val;
                        $vertical[$key] += $val;
                        $total += $val;
                    }
                endforeach;
            endforeach;

            //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            //return $this->asJson(['msg' => "formatted data",'data'=> $data]);
            return $this->render('index', [
                'data' => $data,
                'horizontal' => $horizontal,
                'vertical' => $vertical,
                'total' => $total,
                'offices' => $offices,
                'title' => 'Pull Report by Source of Information',
                'type' => 'multiple',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }
        return $this->render('index', [
            'title' => 'Pull Report by Source of Information',
            'offices' => $offices
        ]);
    }






    //BY FORMS OF TORTURE
    public function actionByFormsOfTorture()
    {
        $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {
            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;

            $forms = FormOfTorture::find()->all();
            $data = [];
            foreach ($forms as $key => $form):
                $count = 0;
                //male
                $data[$key] = [];
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'in','form_of_torture_id', $form->id
                ])->andWhere(['gender' => 1])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $num = $num->all()[0]['count'];
                array_push($data[$key],$form->name);
                array_push($data[$key],$num);

                //female
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'in','form_of_torture_id', $form->id
                ])->andWhere(['gender' => 2])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $num = $num->all()[0]['count'];
                array_push($data[$key],$num);

                //LGBT
                $num = Refugee::find()->select('COUNT(*) AS count')->where([
                    'in','form_of_torture_id', $form->id
                ])->andWhere(['gender' => 3,'rck_office_id' => Yii::$app->request->post()['office']])
                ->andWhere(['between', 'created_at', $start_date, $end_date])
                ->asArray();
                if(Yii::$app->request->post()['office'] != 'all'){
                  $num->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
                }
                $num = $num->all()[0]['count'];
                array_push($data[$key],$num);
            endforeach;

            //GET TOTALS FOR THE HORIZONTAL ROW
            $horizontal= [];
            $horizontal[0] = "Subtotals by Gender";
            $vertical= [];
            $total = 0;
            foreach ($data as $key => $innerRow):
                foreach ($innerRow as $innerKey => $val):
                    if(!isset($horizontal[$innerKey])){
                        $horizontal[$innerKey] = 0;
                    }
                    if(!isset($vertical[$key])){
                        $vertical[$key] = 0;
                    }
                    if($innerKey != 0){
                        $horizontal[$innerKey] += $val;
                        $vertical[$key] += $val;
                        $total += $val;
                    }
                endforeach;
            endforeach;

            //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            //return $this->asJson(['msg' => "formatted data",'data'=> $data]);
            return $this->render('index', [
                'data' => $data,
                'horizontal' => $horizontal,
                'vertical' => $vertical,
                'total' => $total,
                'offices' => $offices,
                'type' => 'multiple',
                'title' => 'Pull Report by Forms of Torture',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
            ]);
        }

        return $this->render('index', [
            'title' => 'Pull Report by Forms of Torture',
            'offices' => $offices
        ]);
    }






    //COMPUTATIONS BY AGE GROUP

    public function actionByAge()
    {
        $offices = RckOffices::find()->all();
        if (Yii::$app->request->post()) {

            $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
            $clients = Refugee::find()->where(['between', 'created_at', $start_date, $end_date]);
            if(Yii::$app->request->post()['office'] != 'all'){
              $clients->andWhere(['rck_office_id' => Yii::$app->request->post()['office']]);
            }
            $clients = $clients->all();
            $data =[['Male',0,0,0,0,0,0],['Female',0,0,0,0,0,0],['Other',0,0,0,0,0,0]];
            $dates = [];

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
            $rst = self::calculateSubTotals($data);
            $horizontal = $rst['horizontal'];
            $vertical = $rst['vertical'];
            $totals = $rst['totals'];

            //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            array_unshift($horizontal, "Sub-totals by age");
            //return $this->asJson(['msg' => "formatted data",'data'=> $data,'horizontal' => $horizontal, 'vertical' => $vertical, 'total' => $totals]);
            return $this->render('index', [
                'data'=> $data,
                'horizontal' => $horizontal,
                'vertical' => $vertical,
                'total' => $totals,
                'offices' => $offices,
                'type' => 'age',
                'start_date' => date("H:ia l M j, Y",$start_date),
                'end_date' => date("H:ia l M j, Y",$end_date),
                'title' => 'Pull Report by Age'
            ]);
        }
        return $this->render('index', [
            'title' => 'Pull Report by Age',
            'offices' => $offices
        ]);
    }


    //Legal Representation for Intervention
    public function actionInterventionByLegal(){
      $offices = RckOffices::find()->all();
      if (Yii::$app->request->post()) {
          $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
          $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
          $interventions = Intervention::find()
            ->select("intervention.*,c.rck_office_id")
            ->leftJoin('refugee as c', 'c.id=intervention.client_id')
            ->where(['between', 'intervention.created_at', $start_date, $end_date])
            ->andWhere(['in','intervention.intervention_type_id',6]);
            if(Yii::$app->request->post()['office'] != 'all'){
              $interventions->andWhere(['c.rck_office_id' => Yii::$app->request->post()['office']]);
            }
            $interventions = $interventions->all();
          $data =[['Male',0,0,0,0,0,0],['Female',0,0,0,0,0,0],['Other',0,0,0,0,0,0]];
          $dates = [];

          //clasify cumulatives by gender and age
          foreach ($interventions as $key => $intervention) {
            //echo  $intervention->client->gender."/n";
            if($intervention->client->gender == 1){
                //Male
                $class = self::ageClassify($intervention->client->date_of_birth, $intervention->created_at);
                $data = self::arrayInitialize($data,0,$class);
            }

            if($intervention->client->gender == 2){
                //Female
                $class = self::ageClassify($intervention->client->date_of_birth, $intervention->created_at);
                $data = self::arrayInitialize($data,1,$class);
            }

            if($intervention->client->gender == 3){
                //LGBT AND THE GENDER FUNNY
                $class = self::ageClassify($intervention->client->date_of_birth, $intervention->created_at);
                $data = self::arrayInitialize($data,2,$class);
            }
          }
          // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
          // echo "<pre>";
          // print_r(json_encode($data));
          // exit;

          $rst = self::calculateSubTotals($data);
          $horizontal = $rst['horizontal'];
          $vertical = $rst['vertical'];
          $totals = $rst['totals'];

          return $this->render('index', [
              'data'=> $data,
              'horizontal' => $horizontal,
              'vertical' => $vertical,
              'total' => $totals,
              'offices' => $offices,
              'type' => 'legal',
              'start_date' => date("H:ia l M j, Y",$start_date),
              'end_date' => date("H:ia l M j, Y",$end_date),
              'title' => 'Pull Legal Report by Intervention '
          ]);
        }
        return $this->render('index', [
            'title' => 'Pull Report by Intervention through Legal Representation',
            'offices' => $offices
        ]);
    }


    //Legal Representation for Court Cases
    public function actionCourtByLegal(){
      $offices = RckOffices::find()->all();
      if (Yii::$app->request->post()) {

          $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
          $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
          $courts = CourtCases::find()
            ->select("court_cases.*,c.rck_office_id")
            ->leftJoin('refugee as c', 'c.id=court_cases.refugee_id')
            ->where(['between', 'court_cases.created_at', $start_date, $end_date])
            ->andWhere(['not', ['refugee_id' => null]]);
            if(Yii::$app->request->post()['office'] != 'all'){
              $courts->andWhere(['c.rck_office_id' => Yii::$app->request->post()['office']]);
            }
            $courts = $courts->all();
          $data =[['Male',0,0,0,0,0,0],['Female',0,0,0,0,0,0],['Other',0,0,0,0,0,0]];
          $dates = [];

          //clasify cumulatives by gender and age
          foreach ($courts as $key => $court) {
            //echo  $intervention->client->gender."/n";
            if($court->client->gender == 1){
                //Male
                $class = self::ageClassify($court->client->date_of_birth, $court->created_at);
                $data = self::arrayInitialize($data,0,$class);
            }

            if($court->client->gender == 2){
                //Female
                $class = self::ageClassify($court->client->date_of_birth, $court->created_at);
                $data = self::arrayInitialize($data,1,$class);
            }

            if($court->client->gender == 3){
                //LGBT AND THE GENDER FUNNY
                $class = self::ageClassify($court->client->date_of_birth, $court->created_at);
                $data = self::arrayInitialize($data,2,$class);
            }
          }
          // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
          // echo "<pre>";
          // print_r(json_encode($data));
          // exit;

          $rst = self::calculateSubTotals($data);
          $horizontal = $rst['horizontal'];
          $vertical = $rst['vertical'];
          $totals = $rst['totals'];

          return $this->render('index', [
              'data'=> $data,
              'horizontal' => $horizontal,
              'vertical' => $vertical,
              'total' => $totals,
              'offices' => $offices,
              'type' => 'legal',
              'start_date' => date("H:ia l M j, Y",$start_date),
              'end_date' => date("H:ia l M j, Y",$end_date),
              'title' => 'Pull Legal Report by Court Case'
          ]);
        }
        return $this->render('index', [
            'title' => 'Pull Report by Court Case through Legal Representation',
            'offices' => $offices
        ]);
    }


    //Legal Representation for Intervention
    public function actionPoliceByLegal(){
      $offices = RckOffices::find()->all();
      if (Yii::$app->request->post()) {
          $start_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['start_date'])->timestamp;
          $end_date = Carbon::createFromFormat('Y-m-d H:i:s', Yii::$app->request->post()['end_date'])->timestamp;
          $police_cases = PoliceCases::find()
            ->select("police_cases.*,c.rck_office_id")
            ->leftJoin('refugee as c', 'c.id=police_cases.refugee_id')
            ->where(['between', 'police_cases.created_at', $start_date, $end_date])
            ->andWhere(['not', ['refugee_id' => null]]);
            if(Yii::$app->request->post()['office'] != 'all'){
              $police_cases->andWhere(['c.rck_office_id' => Yii::$app->request->post()['office']]);
            }
            $police_cases = $police_cases->all();
          $data =[['Male',0,0,0,0,0,0],['Female',0,0,0,0,0,0],['Other',0,0,0,0,0,0]];
          $dates = [];

          //clasify cumulatives by gender and age
          foreach ($police_cases as $key => $policecase) {
            //echo  $intervention->client->gender."/n";
            if($policecase->client->gender == 1){
                //Male
                $class = self::ageClassify($policecase->client->date_of_birth, $policecase->created_at);
                $data = self::arrayInitialize($data,0,$class);
            }

            if($policecase->client->gender == 2){
                //Female
                $class = self::ageClassify($policecase->client->date_of_birth, $policecase->created_at);
                $data = self::arrayInitialize($data,1,$class);
            }

            if($policecase->client->gender == 3){
                //LGBT AND THE GENDER FUNNY
                $class = self::ageClassify($policecase->client->date_of_birth, $policecase->created_at);
                $data = self::arrayInitialize($data,2,$class);
            }
          }
          // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
          // echo "<pre>";
          // print_r(json_encode($data));
          // exit;

          $rst = self::calculateSubTotals($data);
          $horizontal = $rst['horizontal'];
          $vertical = $rst['vertical'];
          $totals = $rst['totals'];

          return $this->render('index', [
              'data'=> $data,
              'horizontal' => $horizontal,
              'vertical' => $vertical,
              'total' => $totals,
              'offices' => $offices,
              'type' => 'legal',
              'start_date' => date("H:ia l M j, Y",$start_date),
              'end_date' => date("H:ia l M j, Y",$end_date),
              'title' => 'Pull Legal Report by Police Case'
          ]);
        }
        return $this->render('index', [
            'title' => 'Pull Report by Police Case through Legal Representation',
            'offices' => $offices
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

    public static function ageClassify($dobTimestamp, $dobFrom = 'now'){
        $ageRanges = ['0-18','19-25','26-35','36-45','46-60','60+'];
        //calculate age.
        $dob = Carbon::createFromTimestamp($dobTimestamp, 'Africa/Nairobi');
        $age = 0;
        if($dobFrom == 'now'){
            $age = Carbon::now()->diffInYears($dob);
        }else{
            $age = Carbon::createFromTimestamp($dobFrom, 'Africa/Nairobi')->diffInYears($dob);
        }

        //classify age.
        if($age <= 18){// 0-18 years
            return 1;
        }else if($age > 18 && $age <= 25){// 19-25 years
            return 2;
        }else if($age > 25 && $age <= 35){// 26-35 years
            return 3;
        }else if($age > 35 && $age <= 45){// 36-45 years
            return 4;
        }else if($age > 45 && $age <= 60){// 46-60 years
            return 5;
        }else if($age > 60){// 60+ years
            return 6;
        }
    }

    public static function calculateSubTotals($data){
      $vertical = [];
      $horizontal = [];
      $totals = 0;

      foreach ($data as $key => $array) {
          # code...
          //$total = 0;
          foreach ($array as $innerKey => $val):
              if(!isset($vertical[$key])){
                  $vertical[$key] = 0;
              }
              if(!isset($horizontal[$innerKey])){
                  $horizontal[$innerKey] = 0;
              }
              if($innerKey != 0){
                  $vertical[$key] += $val;
                  $horizontal[$innerKey] += $val;
                  $totals += $val;
              }
          endforeach;
      }
      return ['vertical' => $vertical,'horizontal' => $horizontal, 'totals' => $totals];
    }
}
