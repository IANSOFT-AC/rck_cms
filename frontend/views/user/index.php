<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
<div class="card">
    <div class="card-header">
    
    <h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a(Yii::t('app', 'Create User'), ['signup'], ['class' => 'btn btn-success']) ?>
</p>
    
    </div>
    <div class="card-body">
    
    <table class="table table-striped table-bordered">
    <thead>
        <th>id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Role</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $key => $value):
        ?>
            <tr>
            <td><?= $value->id ?></td>
            <td><?= $value->username ?></td>
            <td><a href=<?= "mailto:".$value->email ?>><?= $value->email ?></a></td>
            <td><?= $value->status ?></td>
            <td><?php
            if(isset($value->userRole)){
                echo $value->userRole->group;
            } 
            
            ?></td>
            <td><div class="d-inline-flex">
                    <a href="/user/view/?id=<?= $value->id ?>" class="p-1" title="View Record"><i class="far fa-eye"></i></a>
                    <a href="/user/update/?id=<?= $value->id ?>" title="Edit Record" class="p-1"><i class="far fa-edit"></i></a>
                    <a href="/user/delete/?id=<?= $value->id ?>" title="Delete Record" class="p-1"><i class="far fa-trash"></i></a>
                </div>
            </td>
            </tr>

        <?php
        endforeach;
        ?>
        <td></td>
    </tbody>
</table>
    
    </div>
</div>

</div>
