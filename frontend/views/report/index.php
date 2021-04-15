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
                <form class='p-2 m-2' method="POST">
                 <input type="hidden" name="start_date" id="start_date" value="2021-03-29 00:00:00">
                 <input type="hidden" name="end_date" id="end_date" value="2021-03-29 23:59:59">
                 <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                 <button type="submit" class="btn btn-primary" style="">Filter</button>
                 <a href="https://app.endelezacapital.com/transactions" class="btn btn-secondary">Reset</a>
                </form>
                <?php if(isset($type) && 'country' == $type){ ?>
                    
                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td colspan="2" class="table-primary table-bordered">Male</td>
                                    <td colspan="2" class="table-primary  table-bordered">Female</td>
                                    <td class="table-primary table-bordered"></td>
                                </tr>
                                <tr>
                                    <td class="table-primary table-bordered">Country</td>
                                    <td class="table-primary table-bordered">Refugee</td>
                                    <td class="table-primary table-bordered">Asylum Seeker</td>
                                    <td class="table-primary table-bordered">Refugee</td>
                                    <td class="table-primary table-bordered">Asylum Seeker</td>
                                    <td class="table-primary table-bordered">Totals</td>
                                </tr>
                            <?php                    
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <td><?= $val[0] ?></td>
                                    <td><?= $val[1] ?></td>
                                    <td><?= $val[2] ?></td>
                                    <td><?= $val[3] ?></td>
                                    <td><?= $val[4] ?></td>
                                    <td><?= $val[5] ?></td>
                                </tr>
                            <?php
                                endforeach;                        
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                
                <?php } ?>


                <?php if(isset($type) && 'office' == $type){ ?>
                    
                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td colspan="2" class="table-primary table-bordered">Male</td>
                                    <td colspan="2" class="table-primary  table-bordered">Female</td>
                                    <td class="table-primary table-bordered"></td>
                                </tr>
                                <tr>
                                    <td class="table-primary table-bordered">Country</td>
                                    <td class="table-primary table-bordered">Refugee</td>
                                    <td class="table-primary table-bordered">Asylum Seeker</td>
                                    <td class="table-primary table-bordered">Refugee</td>
                                    <td class="table-primary table-bordered">Asylum Seeker</td>
                                    <td class="table-primary table-bordered">Totals</td>
                                </tr>
                            <?php                    
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <td><?= $val[0] ?></td>
                                    <td><?= $val[1] ?></td>
                                    <td><?= $val[2] ?></td>
                                    <td><?= $val[3] ?></td>
                                    <td><?= $val[4] ?></td>
                                    <td><?= $val[5] ?></td>
                                </tr>
                            <?php
                                endforeach;                        
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                
                <?php } ?>

                <?php if(isset($type) && 'age' == $type){ ?>
                    
                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="table-primary table-bordered">Sex</td>
                                    <td colspan="6" class="table-primary table-bordered">Age Group</td>
                                    <td class="table-primary table-bordered"></td>
                                </tr>
                                <tr>
                                    <td class="table-primary table-bordered"></td>    
                                    <td class="table-primary table-bordered">0-18</td>
                                    <td class="table-primary table-bordered">19-25</td>
                                    <td class="table-primary table-bordered">26-35</td>
                                    <td class="table-primary table-bordered">36-45</td>
                                    <td class="table-primary table-bordered">45-60</td>
                                    <td class="table-primary table-bordered">60+</td>
                                    <td class="table-primary table-bordered">Sub-totals by Sex</td>
                                </tr>
                            <?php                    
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <td><?= $val[0] ?></td>
                                    <td><?= $val[1] ?></td>
                                    <td><?= $val[2] ?></td>
                                    <td><?= $val[3] ?></td>
                                    <td><?= $val[4] ?></td>
                                    <td><?= $val[5] ?></td>
                                    <td><?= $val[6] ?></td>
                                    <td><?= $vertical[$key] ?></td>
                                </tr>
                            <?php
                                endforeach;                        
                            ?>
                            <tr>
                                <td><?= $horizontal[0] ?></td>
                                <td><?= $horizontal[1] ?></td>
                                <td><?= $horizontal[2] ?></td>
                                <td><?= $horizontal[3] ?></td>
                                <td><?= $horizontal[4] ?></td>
                                <td><?= $horizontal[5] ?></td>
                                <td><?= $horizontal[6] ?></td>
                                <td><?= $total ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                
                <?php } ?>

                <?php if(isset($type) && 'multiple' == $type){ ?>
                    
                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td class="table-primary table-bordered">Male</td>
                                    <td class="table-primary table-bordered">Female</td>
                                    <td class="table-primary table-bordered">Other</td>
                                    <td class="table-primary table-bordered">Totals</td>
                                </tr>
                            <?php                    
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <?php 
                                    for ($i=0; $i < 5; $i++) { 
                                        # code...
                                        ?>
                                            <td><?= $val[$i] ?></td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                                endforeach;                        
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                
                <?php } ?>

                <!-- Court Cases -->

                <?php if(isset($type) && 'court-cases' == $type){ ?>
                    
                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td class="table-primary table-bordered">Male</td>
                                    <td class="table-primary table-bordered">Female</td>
                                    <td class="table-primary table-bordered">Other</td>
                                    <td class="table-primary table-bordered">Totals</td>
                                </tr>
                            <?php                    
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <?php 
                                    for ($i=0; $i < 5; $i++) { 
                                        # code...
                                        ?>
                                            <td><?= $val[$i] ?></td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                                endforeach;                        
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                
                <?php } ?>
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