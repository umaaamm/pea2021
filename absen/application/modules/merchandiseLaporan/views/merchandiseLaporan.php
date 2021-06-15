
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
                    },
                    nama: {
                        minlength: 3,
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
          $('#modalTitle').text('Add Kehadiran');
          $('#formInput')[0].reset();
          $('#buttonAction').text('<?php echo lang('lbl_save'); ?>').show();
          $('#buttonAction').attr('class', 'btn btn-primary').show();
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('i').removeClass("fa-warning").removeClass("fa-check");
          $('.help-block-error').hide();
          error.hide();

          //########## SET ENABLE FALSE (EDIT BELOW)##########//
          $('#nik').prop('readonly', false);
          $('#nama').prop('readonly', false);
          $('#id_event').prop('readonly', false);
          $('#hp').prop('readonly', false);
          $('#unit_kerja').prop('readonly', false);
          $('#no_kursi').prop('readonly', false);
          $('#jabatan').prop('readonly', false);
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
                      $('#modalTitle').text('Edit Kehadiran');
                      $('#buttonAction').text('<?php echo lang('lbl_edit'); ?>').show();
                      $('#buttonAction').attr('class', 'btn btn-success').show();
                      $('.help-block-error').hide();
                      error.hide();

                      //########## SET VALUE FORM EDIT (EDIT BELOW)##########//
                      $('#nik').val(response.data.nik_pegawai).prop('readonly', true);
                        $('#nama').val(response.data.nama).prop('readonly', true);
                        $('#id_event').val(response.data.id_event_pea).prop('readonly', true);
                        $('#hp').val(response.data.no_hp).prop('readonly', false);
                        $('#unit_kerja').val(response.data.unit_kerja).prop('readonly', false);
                        $('#no_kursi').val(response.data.no_kursi).prop('readonly', false);
                        $('#jabatan').val(response.data.jabatan).prop('readonly', false);
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
                  $('#modalTitle').text('View Kehadiran');
                  $('.help-block-error').hide();
                  $('#buttonAction').attr('class', 'btn btn-success').hide();
                  error.hide();

                  //########## SET VALUE FORM VIEW (EDIT BELOW)##########//
                  $('#nik').val(response.data.nik_pegawai).prop('readonly', true);
                        $('#nama').val(response.data.nama).prop('readonly', true);
                        $('#id_event').val(response.data.id_event_pea).prop('readonly', true);
                        $('#hp').val(response.data.no_hp).prop('readonly', true);
                        $('#unit_kerja').val(response.data.unit_kerja).prop('readonly', true);
                        $('#no_kursi').val(response.data.no_kursi).prop('readonly', true);
                        $('#jabatan').val(response.data.jabatan).prop('readonly', true);
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
                                        <div class="table-toolbar">
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="datatableList">
                                            <thead>
                                                <tr>
                                                  <th>Nik - Nama</th>
                                                  <th>Nama Event</th>
                                                  <th>No Handphone</th>
                                                  <th>Jabatan</th>
												  <th>Unit Kerja</th>
                                                  <th>Tanggal Pengambilan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              if ($merchandise_laporan_list) {
                                                foreach ($merchandise_laporan_list as $list) {
                                            ?>
                                                <tr>
                                                  <td><?php echo $list['nama']; ?><br><b><?php echo $list['nik_pegawai']; ?><b></td>
                                                  <td><?php echo $list['nama_event']; ?></td>
                                                  <td><?php echo $list['no_hp']; ?></td>
                                                  <td><?php echo $list['jabatan']; ?></td> 
												  <td><?php echo $list['unit_kerja']; ?></td>
                                                  <td><?php echo $list['tanggal_pengambilan']; ?></td>
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
                                                            <input type="text" class="form-control" id="nik" name="nik">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama Lengkap <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="nama" name="nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama Event</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" name="id_event" id="id_event">
                                                                <option value="-">- Pilih Salah Satu -</option>
                                                                <?php 
                                                                foreach($event_list as $row):?>
                                                                    <option value="<?php echo $row->id_event_pea;?>"><?php echo $row->nama_event;?></option>
                                                                <?php endforeach;?>                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Jabatan</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Unit Kerja</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">No. Handphone</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="hp" name="hp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nomor Kursi</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="no_kursi" name="no_kursi">
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
