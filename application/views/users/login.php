<div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>FILE</b>STATS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez-vous!</p>
		<?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <?php echo form_open('users/login', array('id' => 'loginForm')) ?>
        <div class="input-group mb-3">
          <input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  <?php echo form_error('pseudo', '<div class="error">', '</div>') ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
		  <?php echo form_error('password', '<div class="error">', '</div>') ?>
        </div>
        <div class="row">
		<div class="col-6">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-block bg-gradient-secondary btn-lg">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
		<?php echo form_close(); ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->