<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefugeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Report'];
?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="header-title"><?= Html::encode($this->title) ?></h1><br>
            </div>
            <div class="card-body table-responsive">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
                <form class='p-2 m-2'>
                 <input type="hidden" name="start_date" id="start_date" value="2021-03-29 00:00:00">
                 <input type="hidden" name="end_date" id="end_date" value="2021-03-29 23:59:59">
                 <button type="submit" class="btn btn-primary" style="">Filter</button>
                 <a href="https://app.endelezacapital.com/transactions" class="btn btn-secondary">Reset</a>
               </form>
            </div>

        </div>
    </div>

</div>



<?php

$script = <<<JS

$(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        var start_date = start.format('YYYY-MM-DD 00:00:00');
        var end_date = end.format('YYYY-MM-DD 23:59:59');
        $('#start_date').val(start_date);
        $('#end_date').val(end_date);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
});

JS;

$this->registerJs($script);