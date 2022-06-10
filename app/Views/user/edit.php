<?php

use Ci4Common\Libraries\HtmlLib;

?>
<?= HtmlLib::formOpen(base_url('user/update'), [], 'PUT')?>
     <input hidden name="id" value="<?= $model->getId()?>" />
     <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control main-form-control" name="first_name" placeholder="First Name" value="<?= $model->getFirstName() ?>">
     </div>
     <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control main-form-control" name="last_name" placeholder="Last Name" value="<?= $model->getLastName() ?>">
     </div>
     <div class="mt-4 text-center">
          <button type="submit" class="btn btn-warning btn-width btn-radius ">Simpan</button>
     </div>
<?= HtmlLib::formClose()?>
