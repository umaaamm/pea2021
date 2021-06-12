
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
                    user_id: {
                        minlength: 4,
                        required: !0
                    },
                    user_nama_lengkap: {
                        minlength: 3,
                        required: !0
                    },
                    user_alamat: {
                        minlength: 3,
                        required: !0
                    },
                    user_email: {
                        required: !0
                    },
                    username : {
                        minlength: 1,
                        required: !0
                    },
                    password : {
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
          $('#modalTitle').text('Add User');
          $('#formInput')[0].reset();
          $('#buttonAction').text('<?php echo lang('lbl_save'); ?>').show();
          $('#buttonAction').attr('class', 'btn btn-primary').show();
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('i').removeClass("fa-warning").removeClass("fa-check");
          $('.help-block-error').hide();
          error.hide();
          $('#user_pic').attr("src","templates/assets/pages/img/noimage.png");

          //########## SET ENABLE FALSE (EDIT BELOW)##########//
          
          $('#user_id').prop('readonly', false);
          $('#user_nama_lengkap').prop('readonly', false);
          $('#user_alamat').prop('readonly', false);
          $('#user_email').prop('readonly', false);
          $('#user_no_hp').prop('readonly', false);
          $('#user_start_time').prop('readonly', false);
          $('#user_end_time').prop('readonly', false);
          $('#user_language').prop('readonly', false);
          $('#USER_FOTO').prop('disabled', false);
          $('#user_status').prop('readonly', false);
          $('#branch_id').prop('readonly', false);
          $('#username').prop('readonly', false);
          $('#password').prop('readonly', false);
          $('#group_id').prop('disabled', false);
          $('#user_status').prop('readonly', false);
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
                      $('#modalTitle').text('Edit User');
                      $('#buttonAction').text('<?php echo lang('lbl_edit'); ?>').show();
                      $('#buttonAction').attr('class', 'btn btn-success').show();
                      $('.help-block-error').hide();
                      error.hide();

                      //########## SET VALUE FORM EDIT (EDIT BELOW)##########//
                      var user_pic = "userdata/user/"+response.data.user_foto;

                      $('#user_id').val(response.data.user_id).prop('readonly', true);
                      $('#user_nama_lengkap').val(response.data.user_nama_lengkap).prop('readonly', false);
                      $('#user_alamat').val(response.data.user_alamat).prop('readonly', false);
                      $('#user_email').val(response.data.user_email).prop('readonly', false);
                      $('#user_no_hp').val(response.data.user_no_hp).prop('readonly', false);
                      $('#user_start_time').val(response.data.user_start_time).prop('readonly', false);
                      $('#user_end_time').val(response.data.user_end_time).prop('readonly', false);
                      $('#user_language').val(response.data.user_language).prop('readonly', false);
                      
                      $('#USER_FOTO').prop('disabled', false);
                      $('#user_pic').attr("src",user_pic);

                      $('#user_status').val(response.data.user_status).prop('readonly', false);
                      $('#branch_id').val(response.data.branch_id).prop('readonly', false);
                      $('#username').val(response.data.username).prop('readonly', false);
                      //$('#password').val(response.data.password).prop('readonly', false);
                      $('#group_id').val(response.data.group_id).prop('disabled', false);
                      if(response.data.user_status == "1"){
                          $('#user_status').prop('checked',true).prop('readonly', false);
                      }else{
                          $('#user_status').prop('checked',false).prop('readonly', false);
                      }

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
                  $('#modalTitle').text('View User');
                  $('.help-block-error').hide();
                  $('#buttonAction').attr('class', 'btn btn-success').hide();
                  error.hide();

                  //########## SET VALUE FORM VIEW (EDIT BELOW)##########//
                      var user_pic = "userdata/user/"+response.data.user_foto;
                      $('#user_id').val(response.data.user_id).prop('readonly', true);
                      $('#user_nama_lengkap').val(response.data.user_nama_lengkap).prop('readonly', true);
                      $('#user_alamat').val(response.data.user_alamat).prop('readonly', true);
                      $('#user_email').val(response.data.user_email).prop('readonly', true);
                      $('#user_no_hp').val(response.data.user_no_hp).prop('readonly', true);
                      $('#user_start_time').val(response.data.user_start_time).prop('readonly', true);
                      console.log(response.data.user_start_time);
                      $('#user_end_time').val(response.data.user_end_time).prop('readonly', true);
                      $('#user_language').val(response.data.user_language).prop('readonly', true);

                      $('#USER_FOTO').prop('disabled', true);
                      $('#user_pic').attr("src",user_pic);

                      $('#user_status').val(response.data.user_status).prop('readonly', true);
                      $('#branch_id').val(response.data.branch_id).prop('readonly', true);
                      $('#username').val(response.data.username).prop('readonly', true);
                      $('#password').val(response.data.password).prop('readonly', true);
                      $('#group_id').val(response.data.group_id).prop('disabled', true);
                      if(response.data.user_status == "1"){
                          $('#user_status').prop('checked',true).prop('readonly', false);
                      }else{
                          $('#user_status').prop('checked',false).prop('readonly', false);
                      }
                  //########## END SET VALUE FORM VIEW ##########//
                }
            }
          });
        }

        // FUNCTIION GET ARTIKEL KATEGORI
        getGroup= function(){
            $.ajax({
              url : '<?php echo $get_group; ?>',
              type : 'POST',
              dataType : 'json',
              success : function(response){
                  if(response.status == 'error'){
                      $('#group_id').prop('disabled', true);
                  }else{
                      $.each(response.data, function(i, value) {
                          $('#group_id').append($('<option>').text(value.group_nama).attr('value', value.group_id));
                      });
                  }
              }
            });
        }

        getGroup();

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
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="datatableList">
                                            <thead>
                                                <tr>
                                                  <th>User NIK</th>
                                                  <th>Nama Lengkap</th>
                                                  <th>Email</th>
                                                  <th>User Group</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              if ($user_list) {
                                                foreach ($user_list as $list) {
                                            ?>
                                                <tr>
                                                  <td><?php echo $list['user_id']; ?></td>
                                                  <td><?php echo $list['user_nama_lengkap']; ?></td>
                                                  <td><?php echo $list['user_email']; ?></td>
                                                  <td><?php echo $list['group_nama']; ?></td>
                                                  <td align="center"><?php if($list['user_status'] == 1){ echo "<span class='badge badge-success'>&nbsp</span>";}else{echo "<span class='badge badge-danger'>&nbsp</span>";} ?></td>
                                                  <td>
                                                      <?php if ($akses['is_view'] == 1) { ?>
                                                        <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo "'".$list['user_id']."'"; ?>)"><i class="fa fa-search"></i></button>
                                                      <?php } ?>
                                                      <?php if ($akses['is_edit'] == 1) { ?>
                                                        <button type="button" class="btn green btn-xs" onclick="editData(<?php echo "'".$list['user_id']."'"; ?>)"><i class="fa fa-edit"></i></button>
                                                      <?php } ?>
                                                      <?php if ($akses['is_delete'] == 1) { ?>
                                                        <button type="button" class="btn red btn-xs" onclick="deleteData(<?php echo "'".$list['user_id']."'"; ?>)"><i class="fa fa-trash"></i></button>
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
                                                            <input type="text" class="form-control" id="user_id" name="user_id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama Lengkap <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="user_nama_lengkap" name="user_nama_lengkap">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Alamat Lengkap <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea class="form-control" id="user_alamat" name="user_alamat" rows="3"> </textarea> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Email <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="email" class="form-control" id="user_email" name="user_email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">No Handphone</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="user_no_hp" name="user_no_hp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Branch</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="branch_id" name="branch_id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">User Name</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="username" name="username">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Password</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                  <label class="control-label col-sm-2">Tanggal Berlaku</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control" name="user_start_time" id="user_start_time">
                                                            <span class="input-group-addon"> to </span>
                                                            <input type="text" class="form-control" name="user_end_time" id="user_end_time"> </div>
                                                        <!-- /input-group -->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Foto</label>
                                                    <div class="col-sm-10">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="templates/assets/pages/img/noimage.png" alt="" id="user_pic"/>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="user_foto" id="user_foto"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Language</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="user_language" name="user_language" value="english" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Group</label>
                                                    <div class="col-sm-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="bs-select form-control" name="group_id" id="group_id">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Status</label>
                                                    <div class="col-sm-9">
                                                        <div class="mt-checkbox-list">
                                                            <label class="mt-checkbox">
                                                                <input type="checkbox" value="1" id="user_status" name="user_status" /> 
                                                                (Check if active)
                                                                <span></span>
                                                            </label>
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
