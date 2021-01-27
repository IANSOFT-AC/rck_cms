<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

?>
<h1>settings/index</h1>

<p>
    Find all different setups here <code><?php __FILE__; ?></code>.
</p>

<div class="wrapper">
	<div class="card">
	    <div class="card-body">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title" data-speechify-sentence="">Client Biodata Setups</h3>
	            </div>
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="m-0 setup-p">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Nationalities Setup</b>',['country/index'],['class' => 'profile-link']) ?></p>
	                    <br>
	                </div>
	              
	                <div class="col-md-6">
	                    <p class="setup-p">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Gender Setup</b>',['gender/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div> 
	                <div class="col-md-6">
	                    <p  class="setup-p">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Identification Type Setup</b>',['identification-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Camps Setup</b>',['refugee-camp/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Reason for Fleeing Setup</b>',['conflict/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>RCK offices Setup</b>',['rck-offices/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Modes of Entry Setup</b>',['mode-of-entry/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Asylum Types Setup</b>',['asylum-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Source of infomation about RCK Setup</b>',['source-of-info/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Forms of torture Setup</b>',['form-of-torture/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Source of Income Setup</b>',['source-of-income/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
	    <div class="card-body">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title" data-speechify-sentence="">Court Case Setups</h3>
	            </div>
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Nature of Proceeding Setup</b>',['nature-of-proceeding/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Uploads Setup</b>',['court-uploads/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Case Status Setup</b>',['casestatus/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Case Category Setup</b>',['court-case-category/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
	    <div class="card-body">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title" data-speechify-sentence="">Police Case Setups</h3>
	            </div>
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <strong data-speechify-sentence=""><i class="fas fa-address-card"></i> Name</strong>

	                    <p class="text-muted" data-speechify-sentence="">
	                        
	                    </p>
	                    <hr>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
	    <div class="card-body">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title" data-speechify-sentence="">Intervention Setups</h3>
	            </div>
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Case Type Setup</b>',['casetype/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Intervention Type Setup</b>',['intervention-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Intervention Uploads Setup</b>',['intervention-upload/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>