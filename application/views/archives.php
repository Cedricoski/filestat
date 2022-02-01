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
            <a href="accueil" class="nav-link ">
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
            <a href="Archives" class="nav-link active">
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
            <h1 class="m-0 text-dark">Documents Numérisés</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="accueil">Accueil</a></li>
              <li class="breadcrumb-item active">Documents Numérisés</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form role="form" onsubmit="ShowLoading()" action="<?php base_url('numerises')?>" method="post">
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
                <!-- /.form group -->
                <div class="form-group">
                  <label>Nom Document</label>
                  <select class="select2bs4" name="nom_doc" data-placeholder="Selectionner le document" style="width: 100%;">
                          <option value=""></option>
                  <?php if($nom_doc): ?>
                    <?php foreach ($nom_doc as $k): ?>
                    <option value="<?php echo htmlentities($k->nom_document);?>"><?php echo htmlentities($k->nom_document); ?></option>
                    <?php endforeach ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sous Dossier</label>
                  <select class="select2bs4" name="sous_dossier" data-placeholder="Selectionner le sous dossier" style="width: 100%;">
                          <option value=""></option>
                  <?php if($sous_dossier): ?>
                    <?php foreach ($sous_dossier as $k): ?>
                    <option value="<?php echo htmlentities($k->sous_dossier);?>"><?php echo htmlentities($k->sous_dossier); ?></option>
                    <?php endforeach ?>
                    <?php endif; ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Valider</button>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

        </div>
        </form>
        <!-- /.col -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TOTAL ARCHIVES</span>
                <?php if($nb): ?>
                    <?php foreach ($nb as $k): ?>
                      <span class="info-box-number"><?php echo htmlentities($k->Total);?></span>
                    <?php endforeach ?>
                    <?php endif; ?>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.card -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Résultats</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example5" class="table table-bordered table-striped">

                  <thead>

                  <tr>
                    <th>Matricule Travailleur</th>
                    <th>Nom Document</th>
                    <th>Sous Dossier</th>
                    <th>Lot</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($req): ?>
                    <?php foreach ($req as $k): ?>
                      <tr>
                        <td><?php echo htmlentities($k->matricule); ?></td>
                        <td><?php echo htmlentities($k->nom_document); ?></td>
                        <td><?php echo htmlentities($k->sous_dossier); ?></td>
                        <td><?php echo htmlentities($k->lot);?></td>
                        <td><?php echo htmlentities($k->date_archivage); ?></td>
                      </tr>
                      <?php endforeach ?>
                      <?php endif; ?>
                      </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
