<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PoliceCasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Police Cases');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="police-cases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Police Case'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="card">

        <div class="card-body">
             <table class="table" id="police_cases">
                
            </table>
        </div>

    </div>


</div>

<div class="service-container" data-viewurl="<?= Url::to(['police-cases/view']); ?>" data-editurl="<?= Url::to(['police-cases/update']); ?>">

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

    $('#police_cases').DataTable({
        ajax: '/police-cases/list',
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'Name', data: 'name'},
            {title : 'Gender', data: 'gender'},
            {title : 'Contacts', data: 'contacts'},
            {title : 'Age', data: 'age'},
            {title : 'Police Station', data: 'policeStation'},
            {title : 'Offence', data: 'offence'},
            {title : 'Complainant', data: 'complainant'},
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
