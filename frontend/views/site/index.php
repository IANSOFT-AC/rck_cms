<?php


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->name.' - CMS Dashboard';
// $this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard','url' => 'index'];

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
       <div class="card">
           <div class="card-header">
               <h3 class="card-title text-black-80">Dashboard Statistics</h3>
           </div>
       </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= Yii::$app->dashboard->clients(); ?></h3>

                <p>Clients</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/refugee" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= Yii::$app->dashboard->police_cases(); ?></h3>

                <p>Police Cases</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/police_cases" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= Yii::$app->dashboard->trainings(); ?></h3>

                <p>Trainings</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/training" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= Yii::$app->dashboard->court_cases(); ?></h3>

                <p>Court Cases</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/court_cases" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->



<!--    dougnouts-->

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clients By Gender</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <canvas id="genderPieChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                            <li><i class="far fa-circle text-danger"></i> Male</li>
                            <li><i class="far fa-circle text-success"></i> Female</li>
                            <li><i class="far fa-circle text-warning"></i> Children</li>

                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <!-- /.footer -->
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cases By Outcomes</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <canvas id="outcomeChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                            <li><i class="far fa-circle text-info"></i> Convictions</li>
                            <li><i class="far fa-circle text-primary"></i> Settlements</li>
                            <li><i class="far fa-circle text-secondary"></i> Dismissals</li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            
            <!-- /.footer -->
        </div>
    </div>
</div>


<!--Pie Chart-->

<div class="row">
    <div class="col-md-6 mt-2">
        <!-- PIE CHART -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Court Cases By Status</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="refugeePieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-6 mt-2">
        <!-- PIE CHART -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Interventions By Type</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="InterventionsPieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!--Pie Chart-->

<input type="text" id="loginform-username" value="<?= Yii::$app->user->identity->username ?>" />
<?php

$script = <<<JS


var donutData        = {
      labels: [
          'dismissed', 
          'Lost',
          'Won', 
          'Settled',
          'Mediated'
          
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    
    var intdonutData        = {
      labels: [
          'Economic', 
          'Health',
          'Political', 
          'Legal',
      ],
      datasets: [
        {
          data: [700,500,400,600],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }

//-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#genderPieChart').get(0).getContext('2d')
    var pieData        = {
        labels: [
            'Male', 
            'Female',  
        ],
        datasets: [
            {
            data: [$gender[0],$gender[1]],
            backgroundColor : ['#00c0ef', '#3c8dbc'],
            }
        ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

  //-----------------
  //- END PIE CHART -
  //-----------------
  
  
  
  
  //-------------
  //- OUTCOME PIE CHART -
  //-------------
  
  
  
  // Get context with jQuery - using jQuery's .get() method. Outcomes
    var pieChartCanvas = $('#outcomeChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Convictions', 
          'Settlements',
          'dismissed', 
      ],
      datasets: [
        {
          data: [700,500,400],
          backgroundColor : ['#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

  //-----------------
  //- END PIE CHART -
  //-----------------
  
  
  
  //-------------
    //- Refugee PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#refugeePieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
    
    
    
    //-------------
    //- Interventions  PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#InterventionsPieChart').get(0).getContext('2d')
    var pieData        = intdonutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

JS;

$this->registerJs($script);

?>


<?php

$script = <<<JS

    $(async function(){
            
          let response = await fetch('/site/login-api', {
                method: 'POST',
                body: JSON.stringify({"username": $("#loginform-username").val()}),
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                }
            });
           
            if(response.ok){
                let json = await response.json();
                
                console.log('We are Ok man!!!');
                console.table(json);
                      
                //STORE TOKEN IN LOCAL STORAGE
                window.localStorage.setItem('auth_token', json.token)
            }else {
                console.log('Http Error:' + response.status);
            }
               
                
           
           
            
       
    });
    
    
JS;
$this->registerJs($script);
?>



