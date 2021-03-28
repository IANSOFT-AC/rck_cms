<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/21/2020
 * Time: 2:39 PM
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AdminlteAsset;
use common\widgets\Alert;

AdminlteAsset::register($this);

$webroot = Yii::getAlias(@$webroot);
$absoluteUrl = \yii\helpers\Url::home(true);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://ciskenya.co.ke/wp-content/files/2018/07/favicon-150x150.png" sizes="32x32" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="manifest" href="/site.webmanifest">
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebar-toggle-btn" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <?php if(!Yii::$app->user->isGuest): ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $absoluteUrl ?>site" class="nav-link">Home</a>
                </li>
                <?php endif; ?>
                <!--<li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>-->
            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>-->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                   <!-- <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>-->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?= $webroot ?>/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!--<span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>-->






                        <div class="dropdown-divider"></div>

                        <?= (Yii::$app->user->isGuest)? Html::a('<i class="fas fa-sign-in-alt "></i> Signup','/site/signup/',['class'=> 'dropdown-item']): ''; ?>

                        <div class="dropdown-divider"></div>

                        <?= (Yii::$app->user->isGuest)? Html::a('<i class="fas fa-lock-open"></i> Login','/site/login/',['class'=> 'dropdown-item']): ''; ?>

                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>

                        <?= (!Yii::$app->user->isGuest)? Html::a('<i class="fas fa-sign-out-alt"></i> Logout','/site/logout/',['class'=> 'dropdown-item','data' => ['method'=>'post']]):''; ?>

                        <div class="dropdown-divider"></div>

                        <?= Html::a('<i class="fas fa-user"></i> Profile',['./employee'],['class'=> 'dropdown-item']); ?>

                        <div class="dropdown-divider"></div>

                        <?php Html::a('<i class="fas fa-user"></i> Clearance form',['site/clearanceform'],['class'=> 'dropdown-item']); ?>

                    </div>
                </li>
               <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="false" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= $absoluteUrl ?>site" class="brand-link navbar-light logo-switch " >
                <img src="<?= $webroot ?>/images/rck-logo.jpg" alt="RCK Logo" class="brand-image-xs logo-xl img-responsive elevation-0 ml-4  d-flex flex-column align-content-center"
                     style="opacity: 1; transform: scale(1.4); ">
                <img src="<?= $webroot ?>/images/rck-logo.jpg" alt="RCK Logo" class="brand-image-xs logo-mini img-responsive elevation-0 ml-4  d-flex flex-column align-content-center"
                     style="">
               <!-- <span class="brand-text font-weight-light">AAS</span>-->
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= $webroot ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= $absoluteUrl ?>employee/" class="d-block"><?= (!Yii::$app->user->isGuest)? 'User Name': ''?></a>
                    </div>
                </div>-->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->


<!--Approval Management -->
                        <?php
                        if (!Yii::$app->user->getIsGuest() && (Yii::$app->dashboard->user::ROLE_ADMIN == Yii::$app->user->identity->role || in_array(Yii::$app->dashboard->user::CLIENT_INDEX,Yii::$app->dashboard->permissionCodes(Yii::$app->user->identity->permissions)))) {
                        ?>
                        <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl('refugee')?'menu-open':'' ?>">

                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('refugee')?'active':'' ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Client Biodata
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>refugee" class="nav-link <?= Yii::$app->recruitment->currentaction('refugee','index')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                        
                                        <p>Client List</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
<!--end Aprroval Management-->

                        <?php
                        if (!Yii::$app->user->getIsGuest() && (Yii::$app->dashboard->user::ROLE_ADMIN == Yii::$app->user->identity->role || in_array(Yii::$app->dashboard->user::INTERVENTION_INDEX,Yii::$app->dashboard->permissionCodes(Yii::$app->user->identity->permissions)))) {
                        ?>
                        <li class="nav-item has-treeview  <?= Yii::$app->recruitment->currentCtrl('')?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('')?'active':'' ?>">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    Inteventions
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>intervention" class="nav-link <?= Yii::$app->recruitment->currentaction('t','e')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <span class="badge badge-info right">7</span>
                                        <p>Inteventions</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if (!Yii::$app->user->getIsGuest() && (Yii::$app->dashboard->user::ROLE_ADMIN == Yii::$app->user->identity->role || in_array(Yii::$app->dashboard->user::COURT_INDEX,Yii::$app->dashboard->permissionCodes(Yii::$app->user->identity->permissions)))) {
                        ?>
                        <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl('t')?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('t')?'active':'' ?>">
                                <i class="nav-icon fas fa-briefcase " ></i>
                                <p>
                                    Court Cases
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>court-cases/create" class="nav-link <?= Yii::$app->recruitment->currentaction('court-cases','create')?'active':'' ?>">
                                        <i class="fa fa-check-square nav-icon"></i>
                                        <p>New Case </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>court-cases" class="nav-link <?= Yii::$app->recruitment->currentaction('court-cases','index')?'active':'' ?>">
                                        <i class="fa fa-check-square nav-icon"></i>
                                        <p>Cases
                                        <span class="badge badge-info right">1</span>
                                         </p>
                                    </a>
                                </li>

                                
                            </ul>
                        </li>
                        <?php
                        }
                        ?>

                        <!--Police -->
                        <?php
                        if (!Yii::$app->user->getIsGuest() && (Yii::$app->dashboard->user::ROLE_ADMIN == Yii::$app->user->identity->role || in_array(Yii::$app->dashboard->user::POLICE_INDEX,Yii::$app->dashboard->permissionCodes(Yii::$app->user->identity->permissions)))) {
                        ?>
                         <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl('t')?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('t')?'active':'' ?>">
                                <i class="nav-icon fa fa-file-invoice-dollar"></i>
                                <p>
                                    Police Cases
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>police-cases" class="nav-link <?= Yii::$app->recruitment->currentaction('police-cases','index')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Police Cases List
                                            <span class="badge badge-info right">6</span>
                                         </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <!-- Training -->
                        <?php
                        if (!Yii::$app->user->getIsGuest() && (Yii::$app->dashboard->user::ROLE_ADMIN == Yii::$app->user->identity->role || in_array(Yii::$app->dashboard->user::TRAINING_INDEX,Yii::$app->dashboard->permissionCodes(Yii::$app->user->identity->permissions)))) {
                        ?>
                        <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl('t')?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('t')?'active':'' ?>">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>
                                    Training 
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>training/create" class="nav-link <?= Yii::$app->recruitment->currentaction('t','e')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>New Training</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>training" class="nav-link <?= Yii::$app->recruitment->currentaction('t','e')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Trainings
                                            <span class="badge badge-info right">6</span>
                                         </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php
                        }
                        ?>

                        <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl('t')?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('t')?'active':'' ?>">
                                <i class="nav-icon fa fa-database"></i>
                                <p>
                                    Reports
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>settings" class="nav-link <?= Yii::$app->recruitment->currentaction('report','by-age')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Totals by Age Group
                                            <!--<span class="badge badge-info right">0</span>-->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>settings" class="nav-link <?= Yii::$app->recruitment->currentaction('report','by-country')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Totals by Country
                                            <!--<span class="badge badge-info right">0</span>-->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>settings" class="nav-link <?= Yii::$app->recruitment->currentaction('report','by-office')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Totals by Office
                                            <!--<span class="badge badge-info right">0</span>-->
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--Settings-->
                        <?php
                        if (!Yii::$app->user->getIsGuest() && Yii::$app->dashboard->user::ROLE_ADMIN == Yii::$app->user->identity->role) {
                        ?>
                        <li class="nav-item has-treeview <?= Yii::$app->recruitment->currentCtrl(['rsvp-status','identification-type'])?'menu-open':'' ?>">
                            <a href="#" class="nav-link <?= Yii::$app->recruitment->currentCtrl('t')?'active':'' ?>">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    Settings
                                    <i class="fas fa-angle-left right"></i>
                                    <!--<span class="badge badge-info right">6</span>-->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= $absoluteUrl ?>settings" class="nav-link <?= Yii::$app->recruitment->currentaction('settings','index')?'active':'' ?>">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Control Panel
                                            <!--<span class="badge badge-info right">0</span>-->
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <!--End Setting-->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="site">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>-->
                                <?=
                                Breadcrumbs::widget([
                                'itemTemplate' => "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n", // template for all links
                                'homeLink' => [
                                    'label' => Yii::t('yii', 'Home'),
                                    'url' => Yii::$app->homeUrl,
                                ],
                                'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n",
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>
                            </ol>

                        </div><!-- /.col-6 bread ish -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                             <h4><i class="icon fa fa-check"></i>Success!</h4>
                             <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-danger alert-dismissable">
                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                             <h4><i class="icon fa fa-exclamation-circle"></i>Error!</h4>
                             <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (Yii::$app->session->hasFlash('info')): ?>
                        <div class="alert alert-info alert-dismissable">
                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                             <h4><i class="icon fa fa-info"></i>Information!</h4>
                             <?= Yii::$app->session->getFlash('info') ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    // foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                    //     echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                    // }
                    ?>

                    <div id="connectivity"></div>

                    <?= $content ?>
                    
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy;  <?= Html::encode(Yii::$app->name) ?> -  <?= date('Y') ?>   <a href="#"> <?= Yii::$app->params['Company']?></a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b> Iansoft Technologies Ltd.</b>
            </div>
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->




    </div>

<?php $this->endBody() ?>

<!-- START OF ADD SWEET ALERT -->
<?php //$csrftoken = Yii::$app->request->csrfParam ?>
<!-- END OF ADD SWEET ALERT -->
<script>
        //GET VALUE OF META TAG 

        
        //console.log("token",getMeta('csrf-token'))

         if('serviceWorker' in navigator){
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                .then(registration => navigator.serviceWorker.ready)
                .then(function(registration) {
                    // Registration was successful
                    Notification.requestPermission(function(status) {
                        console.log('Notification permission status:', status);
                    });
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                    // Request a one-off sync:
                    registration.sync.register('dataSyncToServer');
                    //registration.active.postMessage(JSON.stringify({csrfToken: getMeta('csrf-token')}))
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });

           //CHECK CONNECTIVITY
            function updateOnlineStatus() {
                var condition = navigator.onLine ? "online" : "offline";
                if(condition == "online"){
                    document.getElementById('connectivity').innerHTML = '<div class="alert alert-success alert-dismissible" id="online">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-info"></i> Online!</h5>\
                            Your data is upto date.</div>';
                }else{
                    document.getElementById('connectivity').innerHTML = '<div class="alert alert-danger alert-dismissible" id="offline">\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Offline!</h5>\
                            You are using cached data which might not be upto date.</div>';
                }
            }
            updateOnlineStatus()


            //
            $(function(){
                //$('form:not(.caseFileUpload)').on('submit', function(e){
                $('body').on('submit', 'form:not(.caseFileUpload)', function(e) {
                    e.preventDefault();
                    //to stop double execution 'stop executing any downstream chain of event handlers'
                    e.stopImmediatePropagation()
                    let form = e.target;
                   
                    if(navigator.onLine){
                        form.submit();
                    }else{
                        console.log("form saving in indexdb");
                        let DBOpenRequest = null;
                        let objectStore = null;
                        let db = null;
                        //console.log("request jq",serializeForm(form));
                        DBOpenRequest = getDB()
                        DBOpenRequest.addEventListener('success', (ev) => {
                            db = ev.target.result
                            console.log('success', db)

                            //submit form data to indexeddb
                            let tx = db.transaction('rckStore','readwrite')
                            tx.oncomplete = (ev) => {
                                console.log(ev);
                            }
                            tx.onerror = (err) => {
                                console.warn(err)
                            }

                            let store = tx.objectStore('rckStore')
                            let formData = serializeForm(form)
                            formData.action = document.location.origin+'/api'+$(this).attr('action')
                            formData.method = $(this).prop('method')
                            //delete formData['_csrf-frontend']

                            let req = store.add(formData)
                            req.onsuccess = (ev) => {
                                console.log("Added to indexeddb successfully")
                            }
                            req.onerror = (err) => {
                                console.warn("Adding to store failed")
                            }
                        });
                        DBOpenRequest.addEventListener('error', (err) => {
                            console.warn(err)
                        });
                        DBOpenRequest.addEventListener('upgradeneeded', (ev) => {
                            db = ev.target.result
                            console.log('success', db)
                            if(! db.objectStoreNames.contains('rckStore')){
                                objectStore = db.createObjectStore('rckStore', {
                                    keyPath: "id", autoIncrement:true 
                                })
                            }                            
                        });                        
                    }
                })
            });

            let serializeForm = function (form) {
                let obj = {};
                let formData = new FormData(form);
                for (let key of formData.keys()) {
                    var matches = key.match(/\[(.*?)\]/);
                    //get the inner values from square
                    if (matches) {
                        obj[matches[1]] = formData.get(key);
                    }else{
                        obj[key] = formData.get(key);
                    }
                }
                return obj;
            };
        }

        let getDB = () =>{
            let DBOpenRequest = indexedDB.open('RCK',4);
            return DBOpenRequest;
        }

        let deleteFromIndexedDB = (key) =>{
            DBOpenRequest = getDB()

            DBOpenRequest.addEventListener('success', (ev) => {
                db = ev.target.result
                let tx = db.transaction('rckStore','readwrite').objectStore("rckStore").delete(+key);
                //console.log("deleting from indexdb")
            });
        }

        navigator.serviceWorker.onmessage = (ev) => {
            console.log("received data from service worker",ev.data)
            if(ev.data && ev.data.type === 'FORM_DATA'){
                sendToServer(ev.data.form)
            }
        }

        let sendToServer = (data) => {
            let action = data.action
            let method = data.method
            delete data.action
            delete data.method
            let id = data.id
            console.log('data to be posted', JSON.stringify(data))
            fetch(action, {
                method: method,
                body: JSON.stringify(data),
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer '+window.localStorage.getItem('auth_token')
                }
            })
            .then((response) => {
                try {
                    const data = response.text()

                    // if (response.ok) {
                    //   return await response.json();
                    // }
                    // return Promise.reject(response);
                } catch(error) {
                    console.log('Error happened here!')
                    console.error(error)
                }
            })
            .then(function (data) {           
                //DELETE FROM THE DATABASE
                deleteFromIndexedDB(id)
                console.log(data);
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        
    </script>
</body>
</html>
<?php $this->endPage();



?>
