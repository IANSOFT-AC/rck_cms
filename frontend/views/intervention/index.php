<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InterventionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interventions';
isset($refugee_id) ? $this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['refugee/view', 'id' => $refugee_id]] : null ;
$this->params['breadcrumbs'][] = ['label' => 'interventions'];
?>
<div class="intervention-index">


    <div class="card">
        <div class="card-header">
            <h1 class="header-title"><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
        if(isset($refugee_id)){
            echo Html::a('Add Intervention', ['create','id'=> $refugee_id], ['class' => 'btn btn-success']);
        } ?>

        <?= Html::a('<i class="fa fa-sync"></i> Sync Data', ['#'], ['class' => 'btn btn-warning']) ?>
    </p>
        </div>
        <div class="card-body table-responsive">
             <table class="table " id="interventions">

            </table>
        </div>

    </div>

</div>

<div class="service-container" data-viewurl="<?= Url::to(['intervention/view']); ?>" data-editurl="<?= Url::to(['intervention/update']); ?>" data-ajaxurl=<?= isset($refugee_id) ? "/intervention/client-list?id=".$refugee_id : "/intervention/list" ?>>

<?php

$script = <<<JS

    let viewUrl = '';
    let editUrl = '';
    let ajaxUrl = '';
    $('.service-container').each(function() {
        var container = $(this);
        viewUrl = container.data('viewurl');
        editUrl = container.data('editurl');
        ajaxUrl = container.data('ajaxurl')
        console.log(ajaxUrl)
    });

    $('#interventions').DataTable({
        language: {
            emptyTable: "No data available in table", //
           // loadingRecords: "Please wait .. ", // default Loading...
            zeroRecords: "No matching records found"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: ajaxUrl,
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'Case/Issue', data: 'name'},
            {title : 'Intervention Type', data: 'interventionType'},
            {title : 'Client', data: 'client'},
            {title : 'Created At', data: 'created_at'},
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
        responsive:true
    });
JS;

$this->registerJs($script);
