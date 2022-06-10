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
               <table id="tableUser" class="table table-main nowrap" style="width:100%">
                    <thead>
                         <tr>  
                              <td scope="col">#</td>
                              <td scope="col" class="text-2 medium disabled-sorting">Id</td>
                              <td scope="col" class="text-2 medium">Title</td>
                              <td scope="col" class="text-2 medium">First Name</td>
                              <td scope="col" class="text-2 medium">Last Name</td>
                              <td scope="col" class="text-2 medium text-center disabled-sorting">Action</td>
                         </tr>
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


<script>
     $(document).ready(function() {

          // init();
          dataTable();
     });


     var table = null;
     var selectedData = null;

     $("#btnDeleteCity").on("click", function() {
          if (selectedData != null) {
               deleteItem(selectedData);

          }
     })

     function deleteItem(selectedData) {
          $.ajax({
               url: "<?= base_url('user'); ?>" + "/" + selectedData[0],
               type: "DELETE",
               dataType: "json",
               success: function(status) {
                    if (status.Response.Code == 2012) {
                         window.location = base_url + 'Forbidden';
                    } else if (!status.Response.Code == 2013) {
                         var message = status.Message;
                         // setNotification(message, 3, "bottom", "right");
                    } else {
                         var message = status.Message;
                         // setNotification(message, 2, "bottom", "right");

                         window.location.reload();
                    }

               }
          });
     }


     function getTableIndex(dtTable) {
          table = dtTable;
          table.on('click', '.edit', function() {
               $tr = $(this).closest('tr');
               var data = table.row($tr).data();
               id = data[0];

               $.ajax({
                    url: "<?= base_url('user/edit') ?>" + "/" + data[1],
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                         console.log(result);
                         if (result.Response == 'OK') {
                              $('#bodyEditCity').html(result.Data.Html);
                         }

                    },
                    error: function(e) {
                         console.log(e)
                    }

               })
          });

          table.on('click', '.delete', function() {
               $tr = $(this).closest('tr');
               var data = table.row($tr).data();
               selectedData = data;
               deleteItem(selectedData);

          });

     }

     function dataTable() {
          var sourceData = "<?= base_url('user/list'); ?>";
          var caption = "";
          var columns = [{
                    responsivePriority: 6
               },
               {
                    responsivePriority: 1
               },
               {
                    responsivePriority: 2
               },
               {
                    responsivePriority: 3
               }, {
                    responsivePriority: 4
               },{
                    responsivePriority: 5
               },
          ];
          loadIndexDataTable("tableUser", sourceData, caption, null, columns, getTableIndex, "<?= base_url('/'); ?>");


     }
     // $(document).ready(function() {
     //     $('#example').DataTable({
     //         language: {
     //             search: "_INPUT_",
     //             searchPlaceholder: "Search records"
     //         },
     //         "lengthChange": false
     //     });
     // });
</script>
