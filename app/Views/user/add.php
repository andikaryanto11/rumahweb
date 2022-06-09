<form action="<?= base_url('user/create') ?>" method="POST">
     
     <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control main-form-control" placeholder="First Name" name="first_name">
     </div>
     <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control main-form-control" placeholder="First Name" name="last_name">
     </div>
     <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control main-form-control" placeholder="Email" name="email">
     </div>
     <div class="mt-4 text-center">
          <button type="submit" class="btn btn-warning btn-width btn-radius ">Tambah</button>
     </div>
</form>
