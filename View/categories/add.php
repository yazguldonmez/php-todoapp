<?php view('static/header'); ?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= URL . 'cikis' ?>" class="nav-link">Çıkış Yap</a>
      </li>
      <!-- Navbar Search -->

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= url('home') ?>" class="brand-link">
      <i class="fas fa-check"></i>
      <span class="brand-text font-weight-light">TODO<span class="app font-weight-bold">APP</span></span>
    </a>

    <!-- Sidebar -->
    <?php view('static/sidebar') ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori Ekle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
              echo get_session('error') ? '<div class="alert alert-' . $_SESSION['error']['type'] . '">' . $_SESSION['error']['message'] . '</div>' : null;
              ?>
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Kategori Başlığı</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Kategorileri Girin">
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="submit" value="1" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?= view('static/footer'); ?>;
  <!---view napıyor basedir ile dosyamızın tam yolunu alıyor sonra parametre olarak gönderdiğimizdeğere bakıyor 
static içinde footer var mı varsa .php ekliyerek bize geri döndürüyor-->
  <!-- ./wrapper -->

  <script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= assets('js/adminlte.min.js'); ?>"></script>
  </body>

  </html>