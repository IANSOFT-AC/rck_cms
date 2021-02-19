<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'My Counseling Sessions');
isset($intervention->id) ? $this->params['breadcrumbs'][] = ['label' => 'Intervention', 'url' => ['intervention/view', 'id' => $intervention->id]] : null ;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => "#"];
?>
<div class="counseling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    if(empty($intervention->counseling_intake_form)){
    ?>
    <div class="card">
        <div class="card-body">
            <?php $form = ActiveForm::begin(['action' => 'upload','options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'counseling_intake_form')->fileInput(['maxlength' => true])->label('Upload Counseling Intake Form') ?>
                <?= $form->field($model, 'intervention_id')->hiddenInput(['value' => $intervention->id])->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php 
    }else{
        ?>
        <div class="card">
            <div class="card-body">
             <?= Html::a('Preview Document: Counseling Intake Form', ['/uploads/counseling/'.$intervention->counseling_intake_form], ['class' => 'label label-primary', 'target' => '_blank', 'title'=> 'Upload Intake Form']) ?>
            </div>
        </div>
        <?php
    }
    ?>

    <div class="card">
        <div class="card-body">
            <?= Html::a(Yii::t('app', 'Create a Counseling Session'), ['/counseling/create', 'id' => $intervention->id], ['class' => 'btn btn-success']) ?>
            <hr>
            <table class="table datatable" id="counseling">
                <thead>
                    <th>Code Number</th>
                    <th>Date</th>
                    <th>Session</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php 
                    foreach ($data as $key => $value) {
                        # code...
                    ?>
                    <tr>
                        <td><?= $value->code ?></td>
                        <td><?= date("l M j, Y",$value->date) ?></td>
                        <td><?= $value->session ?></td>
                        <td><?= date("H:ia l M j, Y",$value->created_at) ?></td>
                        <td>
                            <div class="d-inline-flex">
                                <a href="view?id=<?= $value->id ?>" class="p-1" title="View Record"><i class="far fa-eye"></i></a>
                                <a href="update?id=<?= $value->id ?>" title="Edit Record" class="p-1"><i class="far fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php

$script = <<<JS

    $('#counseling').DataTable({
        language: {
            emptyTable: "No data available in table", // 
           // loadingRecords: "Please wait .. ", // default Loading...
            zeroRecords: "No matching records found"
        },
    });
JS;

$this->registerJs($script);
