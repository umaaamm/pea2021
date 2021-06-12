<link rel="stylesheet" href="templates/treeTable/css/jquery.treegrid.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
    var addData;
    var editData;
    var viewData;
    var deleteData;

    $(document).ready(function() {
         
        $('.tree').treegrid();
        
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
                    menu_id: {
                        minlength: 1,
                        number: !0,
                        required: !0
                    },
                    menu_nama: {
                        minlength: 3,
                        required: !0
                    },
                    menu_controller: {
                        minlength: 3,
                        required: !0
                    },
                    menu_no_urut: {
                        number: !0,
                        required: !0
                    },
                    menu_icon: {
                        required: !0
                    },
                    menu_parent_id : {
                        minlength: 1,
                        number: !0
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
                      type: "error"
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
          $('#modalTitle').text('Add Menu');
          $('#formInput')[0].reset();
          $('#buttonAction').text('<?php echo lang('lbl_save'); ?>').show();
          $('#buttonAction').attr('class', 'btn btn-primary').show();
          $('.form-group').removeClass('has-error').removeClass('has-success');
          // $('i').hide("fa-warning").removeClass("fa-check");
          $('i').removeClass("fa-check");
          $('fa-check').hide();
          $('.help-block-error').hide();
          error.hide();

          //########## SET ENABLE FALSE (EDIT BELOW)##########//
          $('#menu_id').prop('readonly', false);
          $('#menu_nama').prop('readonly', false);
          $('#menu_parent_id').prop('readonly', false);
          $('#menu_no_urut').prop('readonly', false);
          $('#menu_controller').prop('readonly', false);
          $('#menu_have_child').prop('checked',false).prop('readonly', false);
          $('#menu_icon').prop('readonly', false);
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
                      $('#modalTitle').text('Edit Menu');
                      $('#buttonAction').text('<?php echo lang('lbl_edit'); ?>').show();
                      $('#buttonAction').attr('class', 'btn btn-success').show();
                      $('.help-block-error').hide();
                      error.hide();

                      //########## SET VALUE FORM EDIT (EDIT BELOW)##########//
                      $('#menu_id').val(response.data.menu_id).prop('readonly', true);
                      $('#menu_nama').val(response.data.menu_nama).prop('readonly', false);
                      $('#menu_parent_id').val(response.data.menu_parent_id).prop('readonly', false);
                      $('#menu_no_urut').val(response.data.menu_no_urut).prop('readonly', false);
                      $('#menu_controller').val(response.data.menu_controller).prop('readonly', false);
                      if(response.data.menu_have_child == "1"){
                          $('#menu_have_child').prop('checked',true).prop('readonly', false);
                      }else{
                          $('#menu_have_child').prop('checked',false).prop('readonly', false);
                      }
                      $('#menu_icon').val(response.data.menu_icon).prop('readonly', false);
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
                              type: "error"
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
                  $('#modalTitle').text('View Menu');
                  $('.help-block-error').hide();
                  $('#buttonAction').attr('class', 'btn btn-success').hide();
                  error.hide();

                  //########## SET VALUE FORM VIEW (EDIT BELOW)##########//
                  $('#menu_id').val(response.data.menu_id).prop('readonly', true);
                  $('#menu_nama').val(response.data.menu_nama).prop('readonly', true);
                  $('#menu_parent_id').val(response.data.menu_parent_id).prop('readonly', true);
                  $('#menu_no_urut').val(response.data.menu_no_urut).prop('readonly', true);
                  $('#menu_controller').val(response.data.menu_controller).prop('readonly', true);
                  if(response.data.menu_have_child == "1"){
                      $('#menu_have_child').prop('checked',true).prop('readonly', true);
                  }else{
                      $('#menu_have_child').prop('checked',false).prop('readonly', true);
                  }
                  $('#menu_icon').val(response.data.menu_icon).prop('readonly', true);
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
                                    </div>
                                    <div class="portlet-body">
                                        <!-- <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button> 
                                            <span>You have some form errors. Please check below.</span>
                                        </div>
                                        <div class="alert alert-success display-hide">
                                            <button class="close" data-close="alert"></button> 
                                            <span>Your form validation is successful!</span> 
                                        </div> -->
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
                                                 <div class="mt-sweetalert" data-title="Sweet Alerts with Icons" data-message="Success Icon" data-type="success" data-allow-outside-click="true"></div>
                                            </div>
                                        </div>
                                        <table class="table table-hover tree">
                                            <thead>
                                                <tr>
                                                  <th>Menu Id</th>
                                                  <th>Nama</th>
                                                  <th>No Urut</th>
                                                  <th>Icon</th>
                                                  <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    $dataParent = array(
                                                        'select'      => '*',
                                                        'from'        => $this->set_menu,
                                                        'where'       => "menu_parent_id = 0",
                                                        'sort_by'     => 'menu_no_urut ASC'
                                                    );
                                                    $menuParentList = $this->model_basic_db2->get_data($dataParent)->result_array();
                                                    foreach ($menuParentList as $menuParent) {
                                                      if ($menuParent['menu_have_child'] == 1) {
                                                ?>
                                                        <tr class="treegrid-<?php echo $menuParent['menu_id']; ?>">
                                                          <td><?php echo $menuParent['menu_id']; ?></td>
                                                          <td><?php echo $menuParent['menu_nama']; ?></td>
                                                          <td><?php echo $menuParent['menu_no_urut']; ?></td>
                                                          <td><i class="fa <?php echo $menuParent['menu_icon']; ?>"></i></td>
                                                          <td>
                                                            <?php if ($akses['is_view'] == 1) { ?>
                                                              <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo $menuParent['menu_id']; ?>)"><i class="fa fa-search"></i></button>
                                                            <?php } ?>
                                                            <?php if ($akses['is_edit'] == 1) { ?>
                                                              <button type="button" class="btn green btn-xs" onclick="editData(<?php echo $menuParent['menu_id']; ?>)"><i class="fa fa-edit"></i></button>
                                                            <?php } ?>
                                                            <?php if ($akses['is_delete'] == 1) { ?>
                                                              <button type="button" class="btn red btn-xs" onclick="deleteData(<?php echo $menuParent['menu_id']; ?>)"><i class="fa fa-trash"></i></button>
                                                            <?php } ?>
                                                          </td>
                                                        </tr>  
                                                <?php 
                                                        $datachild1 = array(
                                                            'select'      => '*',
                                                            'from'        => $this->set_menu,
                                                            'where'       => "menu_parent_id = '".$menuParent['menu_id']."'",
                                                            'sort_by'     => 'menu_no_urut ASC'
                                                        );

                                                        $menuChild1List = $this->model_basic_db2->get_data($datachild1)->result_array();
                                                        foreach ($menuChild1List as $menuChild1) {
                                                ?>
                                                          <tr class="treegrid-<?php echo $menuChild1['menu_id']; ?> treegrid-parent-<?php echo $menuParent['menu_id']; ?>">
                                                            <td><?php echo $menuChild1['menu_id']; ?></td>
                                                            <td><?php echo $menuChild1['menu_nama']; ?></td>
                                                            <td><?php echo $menuChild1['menu_no_urut']; ?></td>
                                                            <td><i class="fa <?php echo $menuChild1['menu_icon']; ?>"></i></td>
                                                            <td>
                                                                <?php if ($akses['is_view'] == 1) { ?>
                                                                    <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo $menuChild1['menu_id']; ?>)"><i class="fa fa-search"></i></button>
                                                                <?php } ?>
                                                                <?php if ($akses['is_edit'] == 1) { ?>
                                                                    <button type="button" class="btn green btn-xs" onclick="editData(<?php echo $menuChild1['menu_id']; ?>)"><i class="fa fa-edit"></i></button>
                                                                <?php } ?>
                                                                <?php if ($akses['is_delete'] == 1) { ?>
                                                                    <button type="button" class="btn red btn-xs" onclick="deleteData(<?php echo $menuChild1['menu_id']; ?>)"><i class="fa fa-trash"></i></button>
                                                                <?php } ?>
                                                            </td>
                                                          </tr>  
                                                <?php  
                                                          if ($menuChild1['menu_have_child'] == 1) {
                                                                $datachild2 = array(
                                                                    'select'      => '*',
                                                                    'from'        => $this->set_menu,
                                                                    'where'       => "menu_parent_id = '".$menuChild1['menu_id']."'",
                                                                    'sort_by'     => 'menu_no_urut ASC'
                                                                );

                                                                $menuChild2List = $this->model_basic_db2->get_data($datachild2)->result_array();
                                                                foreach ($menuChild2List as $menuChild2) {  
                                                ?>
                                                                  <tr class="treegrid-<?php echo $menuChild2['menu_id']; ?> treegrid-parent-<?php echo $menuChild1['menu_id']; ?>">
                                                                    <td><?php echo $menuChild2['menu_id']; ?></td>
                                                                    <td><?php echo $menuChild2['menu_nama']; ?></td>
                                                                    <td><?php echo $menuChild2['menu_no_urut']; ?></td>
                                                                    <td><i class="fa <?php echo $menuChild2['menu_icon']; ?>"></i></td>
                                                                    <td>
                                                                        <?php if ($akses['is_view'] == 1) { ?>
                                                                            <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo $menuChild2['menu_id']; ?>)"><i class="fa fa-search"></i></button>
                                                                        <?php } ?>
                                                                        <?php if ($akses['is_edit'] == 1) { ?>
                                                                            <button type="button" class="btn green btn-xs" onclick="editData(<?php echo $menuChild2['menu_id']; ?>)"><i class="fa fa-edit"></i></button>
                                                                        <?php } ?>
                                                                        <?php if ($akses['is_delete'] == 1) { ?>
                                                                            <button type="button" class="btn red btn-xs" onclick="deleteData(<?php echo $menuChild2['menu_id']; ?>)"><i class="fa fa-trash"></i></button>
                                                                        <?php } ?>
                                                                    </td>
                                                                  </tr> 
                                                <?php 
                                                                } 
                                                          }      
                                                        }
                                                      }else{ 
                                                ?>
                                                        <tr class="treegrid-<?php echo $menuParent['menu_id']; ?>">
                                                          <td><?php echo $menuParent['menu_id']; ?></td>
                                                          <td><?php echo $menuParent['menu_nama']; ?></td>
                                                          <td><?php echo $menuParent['menu_no_urut']; ?></td>
                                                          <td><i class="fa <?php echo $menuParent['menu_icon']; ?>"></i></td>
                                                          <td>
                                                            <?php if ($akses['is_view'] == 1) { ?>
                                                              <button type="button" class="btn blue btn-xs" onclick="viewData(<?php echo $menuParent['menu_id']; ?>)"><i class="fa fa-search"></i></button>
                                                            <?php } ?>
                                                            <?php if ($akses['is_edit'] == 1) { ?>
                                                              <button type="button" class="btn btn-success btn-xs" onclick="editData(<?php echo $menuParent['menu_id']; ?>)"><i class="fa fa-edit"></i></button>
                                                            <?php } ?>
                                                            <?php if ($akses['is_delete'] == 1) { ?>
                                                              <button type="button" class="btn btn-danger btn-xs" onclick="deleteData(<?php echo $menuParent['menu_id']; ?>)"><i class="fa fa-trash"></i></button>
                                                            <?php } ?>
                                                          </td>
                                                        </tr> 
                                                <?php } 
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
                                                    <label class="control-label col-sm-2">Menu Id <span class="required"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="menu_id" name="menu_id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama <span class="required"> * </span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="menu_nama" name="menu_nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Controller <span class="required"> * </span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="menu_controller" name="menu_controller">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">No Urut <span class="required"> * </span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="menu_no_urut" name="menu_no_urut">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Icon <span class="required"> * </span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="menu_icon" name="menu_icon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Have Child</label>
                                                    <div class="col-md-4">
                                                        <div class="mt-checkbox-list">
                                                            <label class="mt-checkbox">
                                                                <input type="checkbox" value="1" id="menu_have_child" name="menu_have_child" /> 
                                                                (Check if have child)
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Parent Id</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" id="menu_parent_id" name="menu_parent_id">
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
