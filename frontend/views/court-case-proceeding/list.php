<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Court Case Updates');
isset($court) ? $this->params['breadcrumbs'][] = ['label' => 'Court Case', 'url' => ['court-cases/view', 'id' => $court->id]] : null ;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<div class="court-case-proceeding-index">

<div class="card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Add Court Case Update'), ['court-case-proceeding/create','id' => $court->id], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>id</th>
                <th>Name</th>
                <th>Case Status</th>
                <th>Next Court Case</th>
                <th>Created At</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($list as $key => $value) {
                ?>
                <tr>
                    <td><?= $value->id?></td>
                    <td><?= $value->name?></td>
                    <td><?= $value->case_status?></td>
                    <td><?= date("H:ia l M j, Y", $value->next_court_date) ?></td>
                    <td><?= date("H:ia l M j, Y", $value->created_at) ?></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

    


</div>
