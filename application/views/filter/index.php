<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('users/logout');?>" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/theme/dist/img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FILESTATS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
          <img src="<?php echo base_url(); ?>assets/theme/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Numerises" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Documents Numérisés
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Archives" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Documents Archivés
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tableau de bord</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php base_url('accueil')?>">Accueil</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	  <!-- Main content -->
	  <section class="content">

		  <div class="container-fluid">
			  <div class="row">
				  <div class="col-12">
					  <!-- Small Box (Stat card) -->
            <form role="form" onsubmit="ShowLoading()" action="<?php base_url('accueil')?>" method="post">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Critères</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <!-- Date range -->
                      <div class="form-group">
                        <label>Periode</label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" name="periode" id="reservation">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <button type="submit" class="btn btn-primary float-left">Valider</button>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->

              </div>
              </form>

            <div class="row">
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3 id='counter'></h3>

                    <p>Documents archivés</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-clone"></i>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3 id='counter1'></h3>

                    <p>Documents archivés</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-clone"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            </div>
					  <!-- AREA CHART -->
					  
						  <div class="card-header">
							  <h3 class="card-title">LOTS NUMERISES PAR AUTEUR</h3>
						  </div>
						  <div class="card-body">
							  <div class="chart">
								  <canvas id="donutChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
							  </div>
						  </div>
						  <!-- /.card-body -->


					  <div class="row">
						  <div class="col-md-6">

							  <!-- /.card -->





						  </div>
						  <!-- /.col (LEFT) -->
						  <div class="col-md-6">
							  <!-- /.card -->

						  </div>
						  <!-- /.col (RIGHT) -->
					  </div>


					  <!-- /.container-fluid -->
	  </section>
	  <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
