
<script type="text/javascript">
    var addData;
    var editData;
    var viewData;
    var deleteData;
	

    jQuery(document).ready(function() {
        var method;
        var form        = $('#formInput');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        form.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error', 
            focusInvalid: !1, 
            ignore: "",  
            rules: {
              //######## SET VALIDATION FORM ID IN FORM (EDIT BELOW)########
                    nik: {
                        minlength: 4,
                        required: !0
                    }
          
              //######## END SET VALIDATION FORM ID IN FORM ########
            },
            invalidHandler: function (event, validator) {             
                success.hide();
                error.show();
                App.scrollTo(error, -300);
            },
            errorPlacement: function (error, element) {
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                element.is(":checkbox") ? error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")) : element.is(":radio") ? error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")) : error.insertAfter(element)
            },
            highlight: function (element) {
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  

                $(element).closest('.form-group').removeClass("has-success").addClass('has-error');  
            },
            unhighlight: function (element) {
            },
            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                 $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                icon.removeClass("fa-warning").addClass("fa-check");
            },
            submitHandler: function (form) {
                var formData = new FormData(form);
                save(formData); // SUBMIT FORM
            }
        });
        
        function save(formData){
          // alert(method);
          var url = '';
          if (method == 'add') {
            url = '<?php echo $save_data;?>';
          }else{
            url = '<?php echo $edit_data;?>';
          }

          $.ajax({
            url : url,
            data : formData,
            type : 'POST',
            dataType : 'json',
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            
            success : function(response){
                if(response.status == 'error'){
                    $('#modalForm').modal('hide');
                    swal({
                      title: "Danger",
                      text: response.message,
                      timer: 4000,
                      showConfirmButton: false,
                      type: "danger"
                    });
                }else{
                    $('#modalForm').modal('hide');
                    swal({
                      title: "Success",
                      text: response.message,
                      timer: 4000,
                      showConfirmButton: false,
                      type: "success"
                    });
                    setTimeout(function () {window.location = response.href;}, 3000);
                }
            }
          });
        }

        addData = function(){
          method = 'add';
          $('#modalForm').modal('show');
          $('#modalTitle').text('Add Tracking Barang');
          $('#formInput')[0].reset();
          $('#buttonAction').text('<?php echo lang('lbl_save'); ?>').show();
          $('#buttonAction').attr('class', 'btn btn-primary').show();
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('i').removeClass("fa-warning").removeClass("fa-check");
          $('.help-block-error').hide();
          error.hide();

          //########## SET ENABLE FALSE (EDIT BELOW)##########//
          $('#nik_pegawai').prop('readonly', false);
          $('#nama_pegawai').prop('readonly', false);
          $('#pesan').prop('readonly', false);
          $('#status_approve').prop('readonly', false);
        //   $('#status').prop('readonly', false);
          //########## END SET ENABLE FALSE ##########//
        }

        editData = function(id){
            method = 'edit';
            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('i').removeClass("fa-warning").removeClass("fa-check");
            $.ajax({
                url : '<?php echo $get_data; ?>',
                data : {'id':id},
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response.status == 'error'){
                        $('.alert-danger').show('medium').delay(9000).hide(0);
                        $('.alert-danger span').text(response.message);
                    }else{
                      $('#modalForm').modal('show');
                      $('#modalTitle').text('Edit Testimoni');
                      $('#buttonAction').text('<?php echo lang('lbl_edit'); ?>').show();
                      $('#buttonAction').attr('class', 'btn btn-success').show();
                      $('.help-block-error').hide();
                      error.hide();

                      //########## SET VALUE FORM EDIT (EDIT BELOW)##########//
                        $('#nik_pegawai').val(response.data.nik_pegawai).prop('readonly', true);
                        $('#nama_pegawai').val(response.data.nama_pegawai).prop('readonly', true);
                        $('#pesan').val(response.data.pesan).prop('readonly', false);
                        $('#status_approve').val(response.data.status_approve).prop('readonly', false);
                        // $('#status').val(response.data.status).prop('readonly', false);
                      //########## END SET VALUE FORM EDIT ##########//
                    }
                }
            });
        }

        deleteData = function(id){
            method = 'delete';
            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('i').removeClass("fa-warning").removeClass("fa-check");

            swal({
              title: "<?php echo lang('lbl_are_you_sure_to_delete_this_data'); ?>",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                var url = '<?php echo $delete_data;?>';
                $.ajax({
                    url : url,
                    data : {'id':id},
                    type : 'POST',
                    dataType : 'json',
                    success : function(response){
                        if(response.status == 'error'){
                            $('#modalDelete').modal('hide');
                            swal({
                              title: "Danger",
                              text: response.message,
                              timer: 4000,
                              showConfirmButton: false,
                              type: "danger"
                            });
                        }else{
                            $('#modalDelete').modal('hide');
                            swal({
                              title: "Success",
                              text: response.message,
                              timer: 4000,
                              showConfirmButton: false,
                              type: "success"
                            });
                            setTimeout(function () {window.location = response.href;}, 3000);
                        }
                    }
                });
              }else {
                swal({
                  title: "Cancel",
                  timer: 1000,
                  showConfirmButton: false,
                  type: "error"
                });
              } 
            });
        }


        viewData = function(id){
          method = 'view';
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('i').removeClass("fa-warning").removeClass("fa-check");
          $.ajax({
            url : '<?php echo $get_data; ?>',
            data : {'id':id},
            type : 'POST',
            dataType : 'json',
            success : function(response){
                if(response.status == 'error'){
                    $('.alert-danger').show('medium').delay(9000).hide(0);
                    $('.alert-danger span').text(response.message);
                }else{
                  $('#modalForm').modal('show');
                  $('#modalTitle').text('View Tracking Barang');
                  $('.help-block-error').hide();
                  $('#buttonAction').attr('class', 'btn btn-success').hide();
                  error.hide();

                  //########## SET VALUE FORM VIEW (EDIT BELOW)##########//
                        $('#nik_pegawai').val(response.data.nik_pegawai).prop('readonly', true);
                        $('#nama_pegawai').val(response.data.nama_pegawai).prop('readonly', true);
                        $('#pesan').val(response.data.pesan).prop('readonly', true);
                        $('#status_approve').val(response.data.status_approve).prop('readonly', true);
                  //########## END SET VALUE FORM VIEW ##########//
                }
            }
          });
        }

    });
</script> 
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <?php 
                                    $jumlahList = count($breadcrumbs);
                                    $i=1;
                                    foreach($breadcrumbs as $bc){ 
                                        if ($i == $jumlahList) {
                                ?>
                                            <li><a href="<?php echo $bc['target']; ?>"><?php echo $bc['nama']; ?></a></li>
                                <?php
                                        }else{
                                ?>
                                           <li><a href="<?php echo $bc['target']; ?>"><?php echo $bc['nama']; ?></a><i class="fa fa-circle"></i></li> 
                                <?php  
                                        }
                                        $i++;
                                    } ?>
                            </ul>
                            <div class="page-toolbar">
                                <div class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Today Date">
                                    <i class="icon-calendar"></i>&nbsp;<?php echo date("d F Y"); ?><span class="thin uppercase hidden-xs"></span>&nbsp;
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> <?php echo $menu_nama;?></h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-<?php echo $potlet_icon;?> font-dark"></i>
                                            <span class="caption-subject bold uppercase"> <?php echo $potlet_title;?></span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button> 
                                            <span>You have some form errors. Please check below.</span>
                                        </div>
                                        <div class="alert alert-success display-hide">
                                            <button class="close" data-close="alert"></button> 
                                            <span>Your form validation is successful!</span> 
                                        </div>
                                        <!-- <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <?php if ($akses['is_add'] == 1) { ?>
                                                    <div class="btn-group">
                                                        <button onclick="addData()" class="btn blue"> <?php echo lang('lbl_add_new'); ?>
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div> -->
                                        <table class="table table-striped table-bordered table-hover" id="datatableList">
                                            <thead>
                                                <tr>
                                                  <th>NIK - Nama</th>
                                                  <th>Testimoni</th>
                                                  <!-- <th>No Bagasi</th> -->
                                                  <!-- <th>Keterangan</th> -->
												  <!-- <th>Petugas</th> -->
												  <th>Status Approval</th>
                                                  <!-- <th>Tanggal Update</th> -->
                                                  <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              if ($testimoni_list) {
                                                foreach ($testimoni_list as $list) {
                                            ?>
                                                <tr>
                                                  <td><?php echo $list['nama_pegawai']; ?><br><b><?php echo $list['nik_pegawai']; ?><b></td>
                                                  <td><?php echo $list['pesan']; ?></td>
                                                  <!-- <td></td> -->
                                                  <!-- <td><?php echo $list['keterangan']; ?></td> -->
                                                  <!-- <td><?php echo $list['nama']; ?></td>  -->
												  <!-- <td><?php echo $list['keterangan_val']; ?></td> -->
                                                  <td><?php echo $list['nama_status']; ?></td>
                                
                                                  <td>
                                                      <?php if ($akses['is_view'] == 1) { ?>
                                                        <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo "'".$list['id_testimoni']."'"; ?>)"><i class="fa fa-search"></i></button>
                                                      <?php } ?>
                                                      <?php if ($akses['is_edit'] == 1) { ?>
                                                        <button type="button" class="btn green btn-xs" onclick="editData(<?php echo "'".$list['id_testimoni']."'"; ?>)"><i class="fa fa-edit"></i></button>
                                                      <?php } ?>
                                                      <?php if ($akses['is_delete'] == 1) { ?>
                                                        <button type="button" class="btn red btn-xs" onclick="deleteData(<?php echo "'".$list['id_testimoni']."'"; ?>)"><i class="fa fa-trash"></i></button>
                                                      <?php } ?>
                                                  </td>
                                                </tr>
                                            <?php
                                                }
                                              }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END TABLE PORTLET-->
                                <p class="text-right">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- MODAL FORM -->
                        <div class="modal fade bs-modal-lg" id="modalForm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modalTitle">Modal Title</h4>
                                    </div>
                                    <!-- <form action="#" id="formInput" class="form-horizontal"> -->
                                    <?php 
                                        $attribut = array('class' => 'form-horizontal form-bordered', 'id' => 'formInput');
                                        echo form_open_multipart('', $attribut); 
                                    ?>
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button> 
                                                    <span>You have some form errors. Please check below.</span>
                                                </div>
                                                <div class="alert alert-success display-hide">
                                                    <button class="close" data-close="alert"></button> 
                                                    <span>Your form validation is successful!</span> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">NIK <span class="required"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="nik_pegawai" name="nik_pegawai">
                                                        </div>
                                                    </div>
                                                    <span>* Pastikan NIK sesuai dengan peserta yang terdaftar.</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama Pegawai <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Pesan Testimoni <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="pesan" name="pesan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Approval</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" name="status_approve" id="status_approve">
                                                                <option value="-">- Pilih Salah Satu -</option>
                                                                <?php 
                                                                foreach($status_list as $row):?>
                                                                    <option value="<?php echo $row->id_val_testimoni;?>"><?php echo $row->nama_status;?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lbl_cancel'); ?></button>
                                            <button type="submit" class="btn" id="buttonAction"><?php echo lang('lbl_save'); ?></button>
                                        </div>
                                    </form>
                                   
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /MODAL FORM -->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
