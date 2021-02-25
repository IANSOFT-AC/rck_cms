<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = "RCK: Control Panel";

?>
<h1>settings/index</h1>

<p>
    Find all different setups here <code><?php __FILE__; ?></code>.
</p>

<div class="wrapper">
	<div class="card">
	<div class="card-header"><h3 class="box-title" data-speechify-sentence="">Client Settings</h3></div>
	    <div class="card-body">
	        <div class="box box-primary">
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="m-0 setup-p">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Nationalities Settings</b>',['country/index'],['class' => 'profile-link']) ?></p>
	                    <br>
	                </div>
	              
	                <div class="col-md-6">
	                    <p class="setup-p">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Gender Settings</b>',['gender/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div> 
	                <div class="col-md-6">
	                    <p  class="setup-p">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Identification Type Settings</b>',['identification-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Camps Settings</b>',['refugee-camp/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Reason for Fleeing Settings</b>',['conflict/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>RCK offices Settings</b>',['rck-offices/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Modes of Entry Settings</b>',['mode-of-entry/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Asylum Types Settings</b>',['asylum-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Source of infomation about RCK Settings</b>',['source-of-info/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Forms of torture Settings</b>',['form-of-torture/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Source of Income Settings</b>',['source-of-income/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Disability Settings</b>',['disability-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Relationship Settings</b>',['relationship/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Languages Settings</b>',['language/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
		<div class="card-header"><h3 class="box-title" data-speechify-sentence="">Court Case Settings</h3></div>
	    <div class="card-body">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	            </div>
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Nature of Proceeding Settings</b>',['nature-of-proceeding/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Uploads Settings</b>',['court-uploads/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Case Status Settings</b>',['casestatus/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Case Category Settings</b>',['court-case-category/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Court Case SubCategory Settings</b>',['court-case-subcategory/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Offences Settings</b>',['offence/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Counsellors Settings</b>',['counsellors/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Legal Officers Settings</b>',['lawyer/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
		<div class="card-header"><h3 class="box-title" data-speechify-sentence="">Police Case Settings</h3></div>
	    <div class="card-body">
	        <div class="box box-primary">
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Police Uploads Settings</b>',['police-uploads/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Police Station Settings</b>',['policestation/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Offences Settings</b>',['offence/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
		<div class="card-header"><h3 class="box-title" data-speechify-sentence="">Intervention Settings</h3></div>
	    <div class="card-body">
	        <div class="box box-primary">
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Case Type Settings</b>',['casetype/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Intervention Type Settings</b>',['intervention-type/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Intervention Uploads Settings</b>',['intervention-upload/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Organizer Settings</b>',['organizer/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
					<div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b> Agency Settings</b>',['agency/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="card">
		<div class="card-header"><h3 class="box-title" data-speechify-sentence="">Training Settings</h3></div>
	    <div class="card-body">
	        <div class="box box-primary">
	        <!-- /.box-header -->
	            <div class="box-body row" data-read-aloud-multi-block="true">
	                <div class="col-md-6">
	                    <p class="setup-p" data-speechify-sentence="">
	                    	<i class="fas fa-wrench"></i>
	                    	<?= Html::a('<b>Organizer Settings</b>',['organizer/index'],['class' => 'profile-link']) ?></p>
	                    </p>
	                    <br>
	                </div>
	                
	            </div>
	        </div>
	    </div>
	</div>
</div>