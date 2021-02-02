<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefugeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Biodata';
$this->params['breadcrumbs'][] = ['label' => 'Client Biodata List', 'url' => 'index'];
?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Create Client Biodata', ['create'], ['class' => 'btn btn-success']) ?>
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
        ajax: '/refugee/list',
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'First Name', data: 'first_name'},
            {title : 'Middle Name', data: 'middle_name'},
            {title : 'Last Name', data: 'last_name'},
            {title : 'RSD Appointment Date', data: 'rsd_appointment_date'},
            {title : 'Cell Number', data : 'cell_number'},
            {title : 'Gender', data : 'gender'},
            {title : 'Email', data : 'email'},
            {title : 'RCK No', data : 'rck_no'},
            {title : 'Country', data : 'country'},
            {title : 'created At', data: 'created_at'},
            {
                data: function ( row, type, val, meta ) {
                    return '<div class="d-inline-flex"><a href="'+viewUrl+'/?id='+row.id+'" class="p-1" title="View Record"><i class="far fa-eye"></i></a><a href="'+editUrl+'/?id='+row.id+'" title="Edit Record" class="p-1"><i class="far fa-edit"></i></a></div>'
                },
                className: "center",
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
        order: [[0, "desc"]]
    });
JS;

$this->registerJs($script);