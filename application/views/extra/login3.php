<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" type="text/css">
  <title>Alternate &raquo; Login (v3)</title>
  <link rel="shortcut icon" href="<?= base_url('assets/image') ?>/laund.png">
  <link rel="stylesheet" href="<?= base_url('assets/style/login.css') ?>">
</head>

<body>
  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="flash-data7" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <?php endif ?>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="<?= base_url('login/proses_login') ?>" method="post">
          <h2 class="title">ALTERNATE</h2>
          <div class="input-field">
            <i class="fad fa-user"></i>
            <input type="text" class="form-control" name="username" placeholder="Username">

          </div>
          <div class="input-field">
            <i class="fad fa-lock"></i>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Login V3</h3>
          <p>
            Login ke dalam aplikasi Alternate dengan menggunakan akun anda
          </p>
        </div>
        <img src="<?= base_url('assets/image/') ?>/log.svg" class="image" alt="" />
      </div>

    </div>
  </div>
  </form>
  <style>
    .colored-toast.swal2-icon-info {
      background-color: #3fc3ee !important;
      
    }
    .colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}
    .colored-toast .swal2-title {
      color: white;
    }
    .colored-toast .swal2-close {
      color: white;
    }
    .colored-toast .swal2-html-container {
      color: white;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- BS4 -->
  <!-- Sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast'
      },
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true
    })
    Toast.fire({
      icon: 'info',
      timer: 3700,
      title: 'Jika akun anda belum aktif / lupa password segera hubungi admin',
    })
    
    const flashData7 = $('.flash-data7').data('flashdata');
    if (flashData7) {
      Toast.fire({
        icon: 'error',
         iconColor: 'white',
        timer: 2000,
        title: flashData7,
        customClass: {
          popup: 'colored-toast'
        },
      })
    }
  </script>
</body>

</html>