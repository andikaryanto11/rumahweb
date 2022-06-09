  </div>
  <!-- JAVASCRIPT -->

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
      $('.datepicker').datepicker({
          format: "dd-mm-yyyy",
      });
  </script>
  </body>

  </html>
  <?php

    // clear form flash Data

                                        use Ci4Common\Libraries\CommonLib;

  session()->getFlashData('dataform');
    ?>
  <script>
      $(document).ready(function() {
          // $('#summernote').summernote();
          // $('#summernote-1').summernote();
          // $('#summernote-2').summernote();
          // $('#summernote-3').summernote();
          // $('#summernote-4').summernote();
          //   $('.summernote').summernote();
      });
  </script>
  </script>
  <script>
      $('.btn-toggle-sidebar').click(function() {
          $('.sidebar').toggleClass('show')
          $('.sidebar-toggle').toggleClass('show')
      })
  </script>

  <script>
      $(document).ready(function(e) {
          initiate();
      });

      function initiate() {

        <?php
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
