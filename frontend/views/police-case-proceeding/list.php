<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Police Case Updates');
isset($police) ? $this->params['breadcrumbs'][] = ['label' => 'Police Case', 'url' => ['police-cases/view', 'id' => $police->id]] : null ;
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div class="court-case-proceeding-index">

<div class="card">
    <div class="card-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Add Police Case Update'), ['police-case-proceeding/create','id' => $police->id], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>id</th>
                <th>Description</th>
                <th>Created At</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($list as $key => $value) {
                ?>
                <tr>
                    <td><?= $value->id?></td>
                    <td><?= $value->desc?></td>
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
