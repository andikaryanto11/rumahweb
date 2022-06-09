<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css')?>">
    <title>Amanah Mart - ADMIN</title>
  </head>

<body class="bg-white">
    <div class="auth-container">
        <!-- <div class="text-center">
            <img src="<?= base_url('assets/images/logo.png') ?>" width="160" class="img-fluid" alt="">
        </div> -->
        
        <h4 class="my-4">User Register</h4>

        <form action="<?= base_url('user/do_register')?>" method="POST">
            <div class="form-inline-group left-i mb-3">
                <i class="icon-icon-awesome-user-circle in-left"></i>
                <input type="email" class="form-control" placeholder="Email" name = "email">
            </div>
            <div class="form-inline-group left-i mb-3">
                <i class="icon-icon-awesome-lock in-left"></i>
                <input type="password" class="form-control" placeholder="Password" name = "password">
            </div>
            <button type="submit" class="btn btn-primary px-5 mt-4">Register</button>
        </form>
    </div>
</body>

</html>
