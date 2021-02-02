<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Court Cases');
isset($refugee_id) ? $this->params['breadcrumbs'][] = ['label' => 'Client Biodata', 'url' => ['refugee/view', 'id' => $refugee_id]] : null ;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="court-cases-index">

    


<div class="card">
<div class="card-header">
    <h1 class="header-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Court Cases'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
<div class="card-body">
     <table class="table" id="court_cases">
        
    </table>
</div>

</div>

   

</div>

<div class="service-container" data-viewurl="<?= Url::to(['court-cases/view']); ?>" data-editurl="<?= Url::to(['court-cases/update']); ?>" data-ajaxurl=<?= isset($refugee_id) ? "/court-cases/client-list?id=".$refugee_id : "/court-cases/list" ?> >

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

    $('#court_cases').DataTable({
        ajax: ajaxUrl,
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'Name', data: 'name'},
            {title : 'No. of refugees', data: 'no_of_refugees'},
            {title : 'First Instance Interview', data: 'first_instance_interview'},
            {title : 'Offence', data: 'offence'},
            //{title : 'Date of Arrainment', data: 'date_of_arrainment'},
            {title : 'Next Court Case', data : 'next_court_date'},
            {title : 'Category', data : 'court_case_category'},
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