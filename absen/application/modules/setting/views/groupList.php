
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
                    group_id: {
                        minlength: 1,
                        number: !0,
                        required: !0
                    },
                    group_nama: {
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
                error.hide();
                save(); // SUBMIT FORM
            }
        });
        
        function save(){
          // alert(method);
          var url = '';
          if (method == 'add') {
            url = '<?php echo $save_data;?>';
          }else{
            url = '<?php echo $edit_data;?>';
          }

          $.ajax({
            url : url,
            data : $(form).serialize(),
            type : 'POST',
            dataType : 'json',
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
          $('#modalTitle').text('Add Group');
          $('#formInput')[0].reset();
          $('#buttonAction').text('<?php echo lang('lbl_save'); ?>').show();
          $('#buttonAction').attr('class', 'btn btn-primary').show();
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('i').removeClass("fa-warning").removeClass("fa-check");
          $('.help-block-error').hide();
          error.hide();

          $.ajax({
            url : '<?php echo $get_new_data; ?>',
            type : 'POST',
            dataType : 'json',
            success : function(response){
                if(response.status == 'error'){
                    $('.alert-danger').showS('medium').delay(9000).hide(0);
                    $('.alert-danger span').text(response.message);
                }else{
                  $('#modalForm').modal('show');
                  $('.help-block-error').hide();
                  error.hide();
                  $('#group_id').prop('readonly', false);
                  $('#group_nama').prop('readonly', false);
                  $('#group_keterangan').prop('readonly', false);
                  $('#group_status').attr("disabled", false);
                  $('#resultTable').html(response.data);
                }
            }
          });
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
                      $('#modalTitle').text('Edit Group');
                      $('#buttonAction').text('<?php echo lang('lbl_edit'); ?>').show();
                      $('#buttonAction').attr('class', 'btn btn-success').show();
                      $('.help-block-error').hide();
                      error.hide();
 
                      //########## SET VALUE FORM EDIT (EDIT BELOW)##########//
                      $('#group_id').val(response.dataGroup.group_id).prop('readonly', true);
                      $('#group_nama').val(response.dataGroup.group_nama).prop('readonly', false);
                      $('#group_keterangan').val(response.dataGroup.group_keterangan).prop('readonly', false);
                      if(response.dataGroup.group_status == "1"){
                          $('#group_status').prop('checked', true).attr("disabled", false);
                      }else{
                          $('#group_status').prop('checked',false).attr("disabled", false);
                      }

                      $('#resultTable').html(response.html);


                      $.each(response.dataPriviledge, function(i, value) {
                          var is_view = '#is_view_'+value.menu_id;
                          var is_add = '#is_add_'+value.menu_id;
                          var is_edit = '#is_edit_'+value.menu_id;
                          var is_delete = '#is_delete_'+value.menu_id;

                          if(value.is_view == "1"){
                              $(is_view).prop('checked', true);
                          }else{
                              $(is_view).prop('checked',false);
                          }

                          if(value.is_add == "1"){
                              $(is_add).prop('checked', true);
                          }else{
                              $(is_add).prop('checked',false);
                          }

                          if(value.is_edit == "1"){
                              $(is_edit).prop('checked', true);
                          }else{
                              $(is_edit).prop('checked',false);
                          }

                          if(value.is_delete == "1"){
                              $(is_delete).prop('checked', true);
                          }else{
                              $(is_delete).prop('checked',false);
                          }
                      });
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
                  $('#modalTitle').text('View Group');
                  $('.help-block-error').hide();
                  $('#buttonAction').attr('class', 'btn btn-success').hide();
                  error.hide();

                  //########## SET VALUE FORM VIEW (EDIT BELOW)##########//
                  $('#group_id').val(response.dataGroup.group_id).prop('readonly', true);
                  $('#group_nama').val(response.dataGroup.group_nama).prop('readonly', true);
                  $('#group_keterangan').val(response.dataGroup.group_keterangan).prop('readonly', true);
                  if(response.dataGroup.group_status == "1"){
                      $('#group_status').prop('checked', true).attr("disabled", true);
                  }else{
                      $('#group_status').prop('checked',false).attr("disabled", true);
                  }

                  $('#resultTable').html(response.html);


                  $.each(response.dataPriviledge, function(i, value) {
                      var is_view = '#is_view_'+value.menu_id;
                      var is_add = '#is_add_'+value.menu_id;
                      var is_edit = '#is_edit_'+value.menu_id;
                      var is_delete = '#is_delete_'+value.menu_id;

                      if(value.is_view == "1"){
                          $(is_view).prop('checked', true).attr("disabled", true);
                      }else{
                          $(is_view).prop('checked',false).attr("disabled", true);
                      }

                      if(value.is_add == "1"){
                          $(is_add).prop('checked', true).attr("disabled", true);
                      }else{
                          $(is_add).prop('checked',false).attr("disabled", true);
                      }

                      if(value.is_edit == "1"){
                          $(is_edit).prop('checked', true).attr("disabled", true);
                      }else{
                          $(is_edit).prop('checked',false).attr("disabled", true);
                      }

                      if(value.is_delete == "1"){
                          $(is_delete).prop('checked', true).attr("disabled", true);
                      }else{
                          $(is_delete).prop('checked',false).attr("disabled", true);
                      }
                  });
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
                                        <table class="table table-striped table-bordered table-hover" id="datatableListNoTools">
                                            <thead>
                                                <tr>
                                                  <th>Group Id</th>
                                                  <th>Nama Group</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              if ($group_list) {
                                                foreach ($group_list as $list) {
                                            ?>
                                                <tr>
                                                  <td><?php echo $list['group_id']; ?></td>
                                                  <td><?php echo $list['group_nama']; ?></td>
                                                  <td align="center"><?php if($list['group_status'] == 1){ echo "<span class='badge badge-success'>&nbsp</span>";}else{echo "<span class='badge badge-danger'>&nbsp</span>";} ?></td>
                                                  <td>
                                                      <?php if ($akses['is_view'] == 1) { ?>
                                                        <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo $list['group_id']; ?>)"><i class="fa fa-search"></i></button>
                                                      <?php } ?>
                                                      <?php if ($akses['is_edit'] == 1) { ?>
                                                        <button type="button" class="btn green btn-xs" onclick="editData(<?php echo $list['group_id']; ?>)"><i class="fa fa-edit"></i></button>
                                                      <?php } ?>
                                                      <?php if ($akses['is_delete'] == 1) { ?>
                                                        <button type="button" class="btn red btn-xs" onclick="deleteData(<?php echo $list['group_id']; ?>)"><i class="fa fa-trash"></i></button>
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
                                    <form action="#" id="formInput" class="form-horizontal">
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
                                                    <label class="control-label col-sm-2">Group Id <span class="required"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="group_id" name="group_id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama Group <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="group_nama" name="group_nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Keterangan </label>
                                                    <div class="col-sm-10">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea type="text" class="form-control" id="group_keterangan" name="group_keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Status </label>
                                                    <div class="col-sm-10">
                                                        <div class="mt-checkbox-list">
                                                            <label class="mt-checkbox">
                                                                <input type="checkbox" value="1" id="group_status" name="group_status" /> 
                                                                (Check if active)
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                                <h3 class="form-section">Group Priviledge</h3><hr />
                                                <div id="resultTable">
                                                    
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


