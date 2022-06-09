<div class="main-content">
     <div class="header-menu">
          <h2 class="title mb-0">User</h2>
          <a href="#" class="menu-btn"><i class="ico-bar"></i></a>
     </div>
     <div class="main-content-inner">
          <div class="subheader-outer">
               <div class="row align-items-center">
                    <div class="col-md-6 mb-4">
                         <div class="sub-header">
                              <div class="title-col">
                              </div>
                              <div class="col-search">
                                   <div class="form-inline-group left-i">
                                        <i class="icon-search in-left"></i>
                                        <input type="text" id="searchField" class="form-control" placeholder="Cari">
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-6 mb-4 text-right">
                         <a href="#addNew" class="btn btn-warning radius-5 btn-sm" data-toggle="modal"><i class="icon-icon-awesome-plus text-12"></i>
                              Tambah</a>
                    </div>
               </div>
          </div>
          <div class="main-content-inner-child">
               <table id="tableCity" class="table table-main nowrap" style="width:100%">
                    <thead>
                         <tr>
                              <td scope="col" class="text-2 medium disabled-sorting">Id</td>
                              <td scope="col" class="text-2 medium">Title</td>
                              <td scope="col" class="text-2 medium">First Name</td>
                              <td scope="col" class="text-2 medium">Last Name</td>
                              <td scope="col" class="text-2 medium text-center disabled-sorting">Action</td>
                         </tr>
                    </thead>
                    <thead>
                        <?php 
                            foreach($users as $user) {
                        ?>
                         <tr>
                              <td scope="col" class="text-2 medium disabled-sorting"><?= $user->getId() ?></td>
                              <td scope="col" class="text-2 medium"><?= $user->getTitle() ?></td>
                              <td scope="col" class="text-2 medium"><?= $user->getFirstName() ?></td>
                              <td scope="col" class="text-2 medium"><?= $user->getLastName() ?></td>
                              <td scope="col" class="text-2 medium text-center disabled-sorting">Action</td>
                         </tr>
                        <?php 
                            }
                        ?>
                    </thead>

               </table>
          </div>
     </div>
</div>

<!-- Modal add new -->
<div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <div class="header-inner">
                         <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span class="icon-icon-ionic-md-close text-16"></span>
                         </button>
                    </div>
               </div>
               <div class="modal-body">
                    
               <?= view('user/add') ?>
               </div>
          </div>
     </div>
</div>
<!-- Modal add new End -->

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <div class="header-inner">
                         <h5 class="modal-title" id="exampleModalLabel">Ubah Kota</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span class="icon-icon-ionic-md-close text-16"></span>
                         </button>
                    </div>
               </div>
               <div class="modal-body" id="bodyEditCity">

               </div>
          </div>
     </div>
</div>
<!-- Modal Edit End -->

