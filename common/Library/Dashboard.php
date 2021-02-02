<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/10/2020
 * Time: 2:27 PM
 */

namespace common\library;
use yii;
use yii\base\Component;
use app\models\Refugee;
use app\models\Intervention;
use app\models\CourtCases;
use app\models\PoliceCases;
use app\models\Training;

class Dashboard extends Component
{
	public function interventions(){
		return Intervention::find()->count();
    }

    public function clients(){
    	return Refugee::find()->count();
    }

    public function court_cases(){
    	return CourtCases::find()->count();
    }

    public function police_cases(){
    	return PoliceCases::find()->count();
    }

    public function trainings(){
    	return Training::find()->count();
    }
}