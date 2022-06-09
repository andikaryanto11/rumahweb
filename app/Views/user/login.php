<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <title>Amanah Mart - ADMIN</title>
  </head>

<body class="bg-white">
    <div class="auth-container">
        <!-- <div class="text-center">
            <img src="<?= base_url('assets/images/logo.png') ?>" width="160" class="img-fluid" alt="">
        </div> -->
        
        <h4 class="my-4">Login User</h4>

        <form action="<?= base_url('user/do_register')?>" method="POST">
            <div class="form-inline-group left-i mb-3">
                <i class="icon-icon-awesome-user-circle in-left"></i>
                <input type="email" class="form-control" placeholder="Email" name = "email">
            </div>
            <div class="form-inline-group left-i mb-3">
                <i class="icon-icon-awesome-lock in-left"></i>
                <input type="password" class="form-control" placeholder="Password" name = "password">
            </div>
            <button type="submit" class="btn btn-primary px-5 mt-4">Login</button>
        </form>
    </div>
</body>

</html>

<script type="text/javascript" src="<?= base_url('assets/js/popper.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/select2.full.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/timepicker.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/leaflet.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/leaflet-src.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/esri-leaflet-debug.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/esri-leaflet-geocoder-debug.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/all.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/mainapp.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/bootstrap-notify.js') ?>"></script>
<script>
      $(document).ready(function(e) {
          initiate();
      });

      function initiate() {

        <?php

                        use Ci4Common\Libraries\CommonLib;

        $key = CommonLib::encryptMd5(CommonLib::getKey() . 'success_msg');
        if (session()->get($key)) {
            $msg = session()->getFlashData($key);
            for ($i = 0; $i < count($msg); $i++) {
                ?>
                  setNotification("<?= $msg[$i]; ?>", 2, "bottom", "right");
                <?php
            }
        }

        ?>

        <?php
        $key = CommonLib::encryptMd5(CommonLib::getKey() . 'add_warning_msg');
        if (session()->get($key)) {
            $msg = session()->getFlashData($key);

            for ($i = 0; $i < count($msg); $i++) {
                ?>
                  setNotification("<?= $msg[$i]; ?>", 3, "bottom", "right");
                <?php
            }
        }

        $key = CommonLib::encryptMd5(CommonLib::getKey() . 'edit_warning_msg');
        if (session()->get($key)) {
            $msg = session()->getFlashData($key);
            for ($i = 0; $i < count($msg); $i++) {
                ?>
                  setNotification("<?= $msg[$i]; ?>", 2, "bottom", "right");
                <?php
            }
        }

        ?>
      }
  </script>
