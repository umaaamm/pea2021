<script type="text/javascript">
    var addData;
    var editData;
    var viewData;
    var deleteData;

    jQuery(document).ready(function() {

        // $('.tree').treegrid();
        
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
                    site_nama: {
                        minlength: 3,
                        required: !0
                    },
                    site_alamat: {
                        minlength: 3,
                        required: !0
                    },
                    site_initial: {
                        minlength: 1,
                        required: !0
                    },
                    site_judul: {
                        minlength: 3,
                        required: !0
                    },
                    site_version: {
                        minlength: 3,
                        required: !0
                    },
                    site_copy_right: {
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
                var formData = new FormData(form);
                var url = '<?php echo $edit_data;?>';

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
                            swal({
                              title: "Danger",
                              text: response.message,
                              timer: 4000,
                              showConfirmButton: false,
                              type: "danger"
                            });
                        }else{
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
        });
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
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-<?php echo $potlet_icon;?> font-dark"></i>
                                            <span class="caption-subject bold uppercase"> <?php echo $potlet_title;?></span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button> 
                                            <span>You have some form errors. Please check below.</span>
                                        </div>
                                        <div class="alert alert-success display-hide">
                                            <button class="close" data-close="alert"></button> 
                                            <span>Your form validation is successful!</span> 
                                        </div>
                                        <!-- <form action="" id="formInput" class="form-horizontal form-bordered" enctype="multipart/form-data"> -->
                                        <?php 
                                            $attribut = array('class' => 'form-horizontal form-bordered', 'id' => 'formInput');
                                            echo form_open_multipart('', $attribut); 
                                        ?>
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Nama <span class="required"> * </span></label>
                                                    <div class="col-sm-3">
                                                        <div class="input-icon right">
                                                             <i class="fa"></i>
                                                              <input type="text" class="form-control" id="site_nama" name="site_nama" value="<?php echo $profile_site->site_nama; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Alamat <span class="required"> * </span></label>
                                                    <div class="col-sm-3">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea type="text" class="form-control" id="site_alamat" name="site_alamat"><?php echo $profile_site->site_alamat; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Inisial<span class="required"> * </span></label>
                                                    <div class="col-sm-3">
                                                        <div class="input-icon right">
                                                             <i class="fa"></i>
                                                              <input type="text" class="form-control" id="site_initial" name="site_initial" value="<?php echo $profile_site->site_initial; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Judul <span class="required"> * </span></label>
                                                    <div class="col-sm-3">
                                                        <div class="input-icon right">
                                                             <i class="fa"></i>
                                                              <input type="text" class="form-control" id="site_judul" name="site_judul" value="<?php echo $profile_site->site_judul; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Versi <span class="required"> * </span></label>
                                                    <div class="col-sm-3">
                                                        <div class="input-icon right">
                                                             <i class="fa"></i>
                                                              <input type="text" class="form-control" id="site_version" name="site_version" value="<?php echo $profile_site->site_version; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Copyright <span class="required"> * </span></label>
                                                    <div class="col-sm-3">
                                                        <div class="input-icon right">
                                                             <i class="fa"></i>
                                                              <input type="text" class="form-control" id="site_copy_right" name="site_copy_right" value="<?php echo $profile_site->site_copy_right; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Logo Kecil <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <?php if ($profile_site->site_logo_kecil!=null or $profile_site->site_logo_kecil != '' ) { 
                                                                    echo '<img src="userdata/profile_site/'.$profile_site->site_logo_kecil.'" alt="" />';
                                                             }else{ ?>
                                                                    <img src="templates/assets/pages/img/noimage.png" alt="" /> 
                                                            <?php }?>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="site_logo_kecil" id="site_logo_kecil"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Logo Besar <span class="required"> * </span></label>
                                                    <div class="col-sm-10">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <?php if ($profile_site->site_logo_besar!=null or $profile_site->site_logo_besar != '' ) { 
                                                                    echo '<img src="userdata/profile_site/'.$profile_site->site_logo_besar.'" alt="" />';
                                                             }else{ ?>
                                                                    <img src="templates/assets/pages/img/noimage.png" alt="" /> 
                                                            <?php }?>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="site_logo_besar" id="site_logo_besar"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('lbl_cancel'); ?></button>
                                                      <button type="submit" class="btn green" id="buttonAction"><?php echo lang('lbl_edit'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END TABLE PORTLET-->
                                <p class="text-right">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->


