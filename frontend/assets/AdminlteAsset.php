<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/21/2020
 * Time: 12:34 AM
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AdminlteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/fontawesome-free/css/all.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'plugins/jqvmap/jqvmap.min.css',
        'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
        'https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css',
        'dist/css/adminlte.css',
        'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'plugins/daterangepicker/daterangepicker.css',
        'plugins/summernote/summernote-bs4.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
        'plugins/js/datatables/fixedHeader.bootstrap.min.css',
        'plugins/js/datatables/responsive.bootstrap.min.css',
        'plugins/js/datatables/scroller.bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css',
        'css/plugins/timepicker/bootstrap-timepicker.css',
        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css',
        'css/custom.css',
        'css/validation.css',
        
        'https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css',
        'https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css',
        'https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css',

        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css'
    ];
    public $js = [

        //'plugins/jquery/jquery.min.js',
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'dist/js/adminlte.js',
        'dist/js/demo.js',
        'plugins/jquery-mousewheel/jquery.mousewheel.js',
        'plugins/raphael/raphael.min.js',
        'plugins/jquery-mapael/jquery.mapael.min.js',
        'plugins/jquery-mapael/maps/usa_states.min.js',
        'plugins/chart.js/Chart.min.js',
        'dist/js/pages/dashboard2.js',

        'plugins/sparklines/sparkline.js',
        'plugins/jqvmap/jquery.vmap.min.js',
        'plugins/jqvmap/maps/jquery.vmap.usa.js',
        'plugins/jquery-knob/jquery.knob.min.js',
        'plugins/moment/moment.min.js',
        'plugins/daterangepicker/daterangepicker.js',
       
        'plugins/summernote/summernote-bs4.min.js',
        'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',  
        'plugins/jquery-mousewheel/jquery.mousewheel.js',
        'plugins/raphael/raphael.min.js',
        'plugins/jquery-mapael/jquery.mapael.min.js',
        'plugins/jquery-mapael/maps/usa_states.min.js',
        'plugins/chart.js/Chart.min.js',

       
        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js',
        'https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js',
        'https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js ',
        'https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js',

        'https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js',
        'https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js',
        'https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js',

        //SweetAlert
        'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
        //Dates
        'js/dates.js',
        //Multiselect
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
