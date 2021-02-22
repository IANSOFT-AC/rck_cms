<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trainings');
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="training-index">

    


    <div class="card">
        <div class="card-header">
            <h1 class="header-title"><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Add Training'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="card-body">
             <table class="table" id="trainings">
                
            </table>
        </div>

    </div>


</div>

<div class="service-container" data-viewurl="<?= Url::to(['training/view']); ?>" data-editurl="<?= Url::to(['training/update']); ?>">

<?php

$script = <<<JS

    let viewUrl = ''
    let editUrl = ''
    $('.service-container').each(function() {
        var container = $(this);
        viewUrl = container.data('viewurl')
        editUrl = container.data('editurl')
    });

    $('#trainings').DataTable({
        ajax: '/training/list',
        paging: true,
        columns: [
            {title : 'Id', data: 'id'},
            {title : 'Organizer', data: 'organizer'},
            {title : 'Date', data: 'date'},
            {title : 'Topic', data: 'topic'},
            {title : 'Venue', data: 'venue'},
            {title : 'Facilitators', data: 'facilitators'},
            {title : 'No. of participants', data: 'no_of_participants'},
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

