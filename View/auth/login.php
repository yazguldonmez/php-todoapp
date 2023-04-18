<?php view('static/header'); ?>
<?= md5(1234)?>
<div class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>TODO</b>APP</a>
    </div>
    <!-- /.login-logo -->

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><?php Lang('Oturum Açın'); ?></p>
        <?php
        echo get_session('error') ? '<div class="alert alert-' . $_SESSION['error']['type'] . '">' . $_SESSION['error']['message'] . '</div>' : null;
        ?>
        <form action="<?= URL . 'login'; ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="eposta" value="<?= $_SESSION['post']['eposta'] ?? '' ?>" placeholder="<?= Lang('E-posta'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="sifre" value="<?= $_SESSION['post']['sifre'] ?? '' ?>" placeholder="<?= Lang('Şifre'); ?>">
            <!--posttan gelen veriyi session posta at dedik bir hata olduğu sürece ekranda görünür-->
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <button type="submit" class="btn btn-primary btn-block w-100" name="submit"><?= Lang('Oturum Açın'); ?></button>
          <!-- /.col -->
        </form>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>
  <!--- <#?= view('static/footer');?>view napıyor basedir ile dosyamızın tam yolunu alıyor sonra parametre olarak gönderdiğimizdeğere bakıyor 
static içinde footer var mı varsa .php ekliyerek bize geri döndürüyor yani footer.php yi buraya eklemiş oluyoruz-->

  <!-- jQuery -->
  <script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= assets('js/adminlte.min.js'); ?>"></script>
  </body>

  </html>