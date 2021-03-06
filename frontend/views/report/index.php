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
                <form class='p-2 m-2' method="POST">
                  <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" class="m-2 p-2">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span></span> <i class="fa fa-caret-down"></i>
                  </div>
                 <input type="hidden" name="start_date" id="start_date" value="2021-03-29 00:00:00">
                 <input type="hidden" name="end_date" id="end_date" value="2021-03-29 23:59:59">
                 <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                 <div style="background: #fff; cursor: pointer; padding: 5px 10px; width: 100%">
                   <select name="office" class="form-control">
                     <option value="">--Select Office--</option>
                     <option value="all">All Records</option>
                     <?php
                        foreach ($offices as $key => $value) {
                          // code...
                          ?>
                          <option value="<?= $value->id ?>"><?= $value->name ?></option>
                          <?php
                        }
                     ?>
                   </select>
                </div>
                <div class="p-2">
                 <button type="submit" class="btn btn-primary" style=""><i class="nav-icon fa fa-filter"></i> Filter</button>
                 <a href="/transactions" class="btn btn-secondary"><i class="nav-icon fa fa-eraser"></i> Reset</a>
                 <?php if(isset($type)){ ?>
                 <button type="button" class="btn bg-maroon margin" style="" id="print"><i class="nav-icon fa fa-print"></i> Print</button>
                 <?php } ?>
               </div>
                </form>


                <div class="print">
                <?php if(isset($type) && 'country' == $type){ ?>

                    <div class="container div-center center">
                      <img src="/images/rck-logo.jpg" width="50px">
                    <p class='p'><em>Start Date: </em></p>
                    <p class='p'><code><?= $start_date?></code></p>
                    <p class='p'><em> End Date: </em></p>
                    <p class='p'><code><?= $end_date?></code></p>
                    <div class="card p-3">
                        <table class="table">
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
                                    <td class="table-primary table-bordered">Totals by Nationality</td>
                                </tr>
                              </thead>
                            <?php
                                foreach ($data as $key => $val):
                            ?>
                            <tbody>
                                <tr>
                                    <td><?= $val[0] ?></td>
                                    <td><?= $val[1] ?></td>
                                    <td><?= $val[2] ?></td>
                                    <td><?= $val[3] ?></td>
                                    <td><?= $val[4] ?></td>
                                    <td><?= $vertical[$key] ?></td>
                                </tr>
                            <?php
                                endforeach;
                            ?>
                            <tr>
                            <?php
                                foreach ($horizontal as $key => $val):
                            ?>
                                    <td><?= $val ?></td>
                            <?php
                                endforeach;
                            ?><td><?= $total ?></td></tr>
                          </tbody>
                            </tbody>
                        </table>
                    </div>
                    </div>

                <?php } ?>


                <?php if(isset($type) && 'office' == $type){ ?>

                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table">
                            <thead>
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
                              </thead>
                              <tbody>
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
                        <table class="table">
                            <thead>
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
                              </thead>
                              <tbody>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td class="table-primary table-bordered">Male</td>
                                    <td class="table-primary table-bordered">Female</td>
                                    <td class="table-primary table-bordered">Other</td>
                                    <td class="table-primary table-bordered">Totals</td>
                                </tr>
                              </thead>
                              <tbody>
                            <?php
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <?php
                                    for ($i=0; $i < 4; $i++) {
                                        # code...
                                        ?>
                                            <td><?= $val[$i] ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?= $vertical[$key] ?></td>
                                </tr>
                            <?php
                                endforeach;
                            ?>
                            <tr>
                            <?php
                                foreach ($horizontal as $key => $val):
                            ?>
                                    <td><?= $val ?></td>
                            <?php
                                endforeach;
                            ?><td><?= $total ?></td></tr>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td class="table-primary table-bordered" colspan="2">Male</td>
                                    <td class="table-primary table-bordered" colspan="2">Female</td>
                                    <td class="table-primary table-bordered" colspan="2">Other</td>
                                    <td class="table-primary table-bordered">Totals</td>
                                </tr>
                                <tr>
                                    <td class="table-primary table-bordered"></td>
                                    <td class="table-primary table-bordered">Open</td>
                                    <td class="table-primary table-bordered">Closed</td>
                                    <td class="table-primary table-bordered">Open</td>
                                    <td class="table-primary table-bordered">Closed</td>
                                    <td class="table-primary table-bordered">Open</td>
                                    <td class="table-primary table-bordered">Closed</td>
                                    <td class="table-primary table-bordered"></td>
                                </tr>
                              </thead>
                              <tbody>
                            <?php
                                foreach ($data as $key => $val):
                            ?>
                                <tr>
                                    <?php
                                    for ($i=0; $i < sizeof($val); $i++) {
                                        # code...
                                        if($i == 0){
                                        ?>
                                            <td><?= $val[$i] ?></td>
                                        <?php
                                      }else if($i == (sizeof($val) -1)){
                                          ?>
                                            <td><?= $val[$i]{0} ?></td>
                                            <td><?= $val[$i]{1} ?></td>
                                            <td><?= $vertical[$key] ?></td>
                                          <?php
                                        }else{
                                          ?>
                                              <td><?= $val[$i]{0} ?></td>
                                              <td><?= $val[$i]{1} ?></td>
                                          <?php
                                        }
                                    }
                                    if($key == sizeof($data) -1){
                                      //output HORIZONTAL totals
                                      ?>
                                      <tr>
                                        <td>Sub Totals</td>
                                        <?php
                                          foreach ($horizontal as $key => $val) {
                                            if($key != 0){
                                            ?>
                                            <td><?= $val[0] ?></td>
                                            <td><?= $val[1] ?></td>
                                            <?php
                                            }
                                          }
                                        ?>
                                        <td><?= $total ?></td>
                                      </tr>
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


                <?php if(isset($type) && 'security-report' == $type){ ?>

                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table">
                            <thead>
                                    <td class="table-primary table-bordered">Name</td>
                                    <td class="table-primary table-bordered">Gender</td>
                                    <td class="table-primary table-bordered">Unhcr Case No</td>
                                    <td class="table-primary table-bordered">Refugee No</td>
                                    <td class="table-primary table-bordered">Nationality</td>
                                    <td class="table-primary table-bordered">Telephone</td>
                                    <td class="table-primary table-bordered">Actions</td>
                                </thead>
                                <tbody>
                                  <?php
                                      foreach ($data[1] as $key => $val):
                                  ?>

                                              <tr>
                                                  <td><?= $val['name'] ?></td>
                                                  <td><?= $val['sex'] ?></td>
                                                  <td><?= $val['unhcr_case_no']?></td>
                                                  <td><?= $val['refugee_no'] ?></td>
                                                  <td><?= $val['nationality'] ?></td>
                                                  <td><?= $val['telephone'] ?></td>
                                                  <td>
                                                    <div class="d-inline-flex"><a href="/security-interview/view?id=<?= $val['id'] ?>" class="p-1" title="View Record"><i class="far fa-eye"></i></a></div>
                                                  </td>
                                                </tr>
                                      </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    </div>

                <?php } ?>

                <?php if(isset($type) && 'training' == $type){ ?>

                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="table-primary table-bordered">Training Type</td>
                                    <td class="table-primary table-bordered">0-9 years</td>
                                    <td class="table-primary table-bordered">10-19 years</td>
                                    <td class="table-primary table-bordered">20-24 years</td>
                                    <td class="table-primary table-bordered">25-59 years</td>
                                    <td class="table-primary table-bordered">60+ years</td>
                                    <td class="table-primary table-bordered">boys</td>
                                    <td class="table-primary table-bordered">girls</td>
                                    <td class="table-primary table-bordered">men</td>
                                    <td class="table-primary table-bordered">Women</td>
                                    <td class="table-primary table-bordered">Subtotals</td>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                      foreach ($data as $key => $val):
                                  ?>

                                              <tr>
                                                  <td><?= $val['trainingName'] ?></td>
                                                  <td><?= is_null($val['t0_9']) ? '0' : $val['t0_9'] ?></td>
                                                  <td><?= is_null($val['t10_19']) ? '0' : $val['t10_19'] ?></td>
                                                  <td><?= is_null($val['t20_24']) ? '0' : $val['t20_24']?></td>
                                                  <td><?= is_null($val['t25_59']) ? '0' : $val['t25_59'] ?></td>
                                                  <td><?= is_null($val['t60plus']) ? '0' : $val['t60plus'] ?></td>
                                                  <td><?= is_null($val['boys']) ? '0' : $val['boys'] ?></td>
                                                  <td><?= is_null($val['girls']) ? '0' : $val['girls'] ?></td>
                                                  <td><?= is_null($val['men']) ? '0' : $val['men'] ?></td>
                                                  <td><?= is_null($val['women']) ? '0' : $val['women'] ?></td>
                                                  <td><?= $vertical[$key] ?></td>
                                                </tr>
                                      </tr>
                                  <?php
                                      endforeach;
                                      if($data){
                                      ?>
                                        <tr>
                                          <td>Sub Totals</td>
                                          <td><?= is_null($horizontal['t0_9']) ? '0' : $horizontal['t0_9'] ?></td>
                                          <td><?= is_null($horizontal['t10_19']) ? '0' : $horizontal['t10_19'] ?></td>
                                          <td><?= is_null($horizontal['t20_24']) ? '0' : $horizontal['t20_24']?></td>
                                          <td><?= is_null($horizontal['t25_59']) ? '0' : $horizontal['t25_59'] ?></td>
                                          <td><?= is_null($horizontal['t60plus']) ? '0' : $horizontal['t60plus'] ?></td>
                                          <td><?= is_null($horizontal['boys']) ? '0' : $horizontal['boys'] ?></td>
                                          <td><?= is_null($horizontal['girls']) ? '0' : $horizontal['girls'] ?></td>
                                          <td><?= is_null($horizontal['men']) ? '0' : $horizontal['men'] ?></td>
                                          <td><?= is_null($horizontal['women']) ? '0' : $horizontal['women'] ?></td>
                                          <td><?= $total ?></td>
                                        </tr>
                                      <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>

                <?php } ?>

                <?php if(isset($type) && 'legal' == $type){ ?>

                    <div class="container div-center">
                    <em>Start Date: </em><code><?= $start_date?></code><em> End Date: </em><code><?= $end_date?></code>
                    <div class="card p-3">
                        <table class="table">
                            <thead>
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
                              </thead>
                              <tbody>
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
                                <td>Sub Totals</td>
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
              </div><!-- END OF PRINT -->

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

    // $('.table').DataTable({
    //     language: {
    //         emptyTable: "No data available in table", //
    //        // loadingRecords: "Please wait .. ", // default Loading...
    //         zeroRecords: "No matching records found"
    //     },
    //     //dom: 'Bfrtip',
    //     // buttons: [
    //     //     'copy', 'csv', 'excel', 'pdf'
    //     // ],
    //     "columnDefs": [
    //         {
    //             "visible": false,
    //             "searchable": false
    //         }
    //     ],
    //     responsive:true
    // });

    $("#print").on('click', function(){
      Popup($('.print').html());
    })

    function Popup(data)
    {
         var MainWindow = window.open('', '', 'height=500,width=800');
         MainWindow.document.write('<html><head><title></title>');
         MainWindow.document.write("<link rel=\"stylesheet\" href=\"/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css\" type=\"text/css\"/>");
         MainWindow.document.write("<link rel=\"stylesheet\" href=\"/dist/css/adminlte.css\" type=\"text/css\"/>");
         MainWindow.document.write("<link rel=\"stylesheet\" href=\"/css/custom.css\" type=\"text/css\"/>");
         MainWindow.document.write('</head><body onload="window.print();window.close()">');
         MainWindow.document.write(data);
         MainWindow.document.write('</body></html>');
         MainWindow.document.close();
         setTimeout(function () {
             MainWindow.print();
         }, 500)
         return true;
    }
});

JS;

$this->registerJs($script);
