<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InterventionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interventions';
isset($refugee_id) ? $this->params['breadcrumbs'][] = ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $refugee_id]] : null ;
$this->params['breadcrumbs'][] = ['label' => 'interventions', 'url' => 'index'];
?>
<div class="intervention-index">

    
    <div class="card">
        <div class="card-header">
            <h1 class="header-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Intervention', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('<i class="fa fa-sync"></i> Sync Data', ['#'], ['class' => 'btn btn-warning']) ?>
    </p>
        </div>
        <div class="card-body">
             <table class="table" id="interventions">
                
            </table>
        </div>

    </div>

</div>

<div class="service-container" data-viewurl="<?= Url::to(['intervention/view']); ?>" data-editurl="<?= Url::to(['intervention/update']); ?>" data-ajaxurl=<?= isset($refugee_id) ? "/intervention/client-list?id=".$refugee_id : "/intervention/list" ?>>

<?php

$script = <<<JS

    let viewUrl = ''
    let editUrl = ''
    let ajaxUrl = ''
    $('.service-container').each(function() {
        var container = $(this);
        viewUrl = container.data('viewurl');
        editUrl = container.data('editurl');
        ajaxUrl = container.data('ajaxurl')
        console.log(ajaxUrl)
    });

    $('#interventions').DataTable({
        ajax: ajaxUrl,
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'Case/Issue', data: 'name'},
            {title : 'Client', data: 'client'},
            {title : 'Created At', data: 'created_at'},
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
