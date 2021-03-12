<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefugeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = ['label' => 'Client List'];
?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="header-title"><?= Html::encode($this->title) ?></h1><br>

                <p>
                    <?= Html::a('New Client', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('<i class="fa fa-sync"></i> Sync Data', ['#'], ['class' => 'btn btn-warning']) ?>
                </p>
            </div>
            <div class="card-body">
                 <table class="table" id="refugees">                    
                </table>
            </div>

        </div>
    </div>

</div>

<div class="service-container" data-viewurl="<?= Url::to(['refugee/view']); ?>" data-editurl="<?= Url::to(['refugee/update']); ?>"></div>

<?php

$script = <<<JS

    let viewUrl = ''
    let editUrl = ''
    $('.service-container').each(function() {
        var container = $(this);
        viewUrl = container.data('viewurl');
        editUrl = container.data('editurl');
        console.log(viewUrl)
    });

    $('#refugees').DataTable({
        language: {
            emptyTable: "No data available in table", // 
           // loadingRecords: "Please wait .. ", // default Loading...
            zeroRecords: "No matching records found"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: '/refugee/list',
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'First Name', data: 'first_name'},
            {title : 'Middle Name', data: 'middle_name'},
            {title : 'Last Name', data: 'last_name'},
            {title : 'ID No.', data: 'id_no'},
            {title : 'UNHCR No.', data: 'unhcr_case_no'},
            {title : 'Cell Number', data : 'cell_number'},
            {title : 'Gender', data : 'gender'},
            {title : 'RCK No', data : 'rck_no'},
            {title : 'Old RCK', data : 'old_rck'},
            {title : 'Country', data : 'country'},
            //{title : 'created At', data: 'created_at'},
            {
                title: 'Actions',
                data: function ( row, type, val, meta ) {
                    return '<div class="d-inline-flex"><a href="'+viewUrl+'/?id='+row.id+'" class="p-1" title="View Record"><i class="far fa-eye"></i></a><a href="'+editUrl+'/?id='+row.id+'" title="Edit Record" class="p-1"><i class="far fa-edit"></i></a></div>'
                },
                defaultContent: ''
            }
        ],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ],
        order: [[0, "desc"]],
        responsive: true
    });
JS;

$this->registerJs($script);