<div class="row m-2 p-2">

          <!-- Profile Image -->
          <div class="box box-primary col-md-12">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center"><?= \Yii::$app->user->identity->username; ?></h3>

              <p class="text-muted text-center"><?= Yii::$app->user->identity->getRole(); ?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary col-md-12">
          <hr>
            <div class="box-header with-border">
              <h3 class="box-title  text-center">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <strong class="text-center"><i class="fa fa-book margin-r-5"></i> Member Since</strong>

              <p class="text-muted text-center">
              <?= date("H:ia l M j, Y",Yii::$app->user->identity->created_at) ?>
              </p>

              <!-- <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>