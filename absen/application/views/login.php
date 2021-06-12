<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8" />
        <title><?php echo $site_nama.' | '.$site_judul; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="templates/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="templates/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="templates/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="templates/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(templates/assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="userdata/profile_site/<?php echo $site_logo_kecil; ?>" /> </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <h1><?php echo $site_nama; ?></h1>
                        <p><?php echo $site_judul; ?></p>
                        <form class="login-form" id="form" action="<?php echo $controller."/do_login"; ?>" method="post">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="alert alert-warning display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="<?php echo lang('lbl_username'); ?>" name="username" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="<?php echo lang('lbl_password'); ?>" name="password" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="remember" value="1" /> <?php echo lang('lbl_remember_me'); ?> ?
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    
                                    <button class="btn green" type="submit"><?php echo lang('lbl_sign_in'); ?></button>
                                </div>
                            </div>
                        </form>
                       
                    </div>
             
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="templates/assets/global/plugins/respond.min.js"></script>
<script src="templates/assets/global/plugins/excanvas.min.js"></script> 
<script src="templates/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="templates/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="templates/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="templates/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="templates/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script type="text/javascript">
            var Login = function() {
                var r = function() {
                    $(".login-form").validate({
                        errorElement: "span",
                        errorClass: "help-block",
                        focusInvalid: !1,
                        rules: {
                            username: {
                                required: !0
                            },
                            password: {
                                required: !0
                            },
                            remember: {
                                required: !1
                            }
                        },
                        messages: {
                            username: {
                                required: "Username is required."
                            },
                            password: {
                                required: "Password is required."
                            }
                        },
                        invalidHandler: function(r, e) {
                            $(".alert-danger", $(".login-form")).show()
                        },
                        highlight: function(r) {
                            $(r).closest(".form-group").addClass("has-error")
                        },
                        success: function(r) {
                            r.closest(".form-group").removeClass("has-error"), r.remove()
                        },
                        errorPlacement: function(r, e) {
                            r.insertAfter(e.closest(".input-icon"))
                        },
                        submitHandler: function(r) {
                                $('.alert-success').hide();
                                $('.alert-danger').hide();
                                $('.alert-warning').show('medium');
                                $('.alert-warning span').text('<?php echo lang('msg_please_wait'); ?>');
                                $.ajax({
                                    url : $(r).attr('action'),
                                    data : $(r).serialize(),
                                    type : 'POST',
                                    dataType : 'json'
                                }).done(function(response){
                                        if(response.status == 'error'){
                                            $('.alert-warning').hide();
                                            $('.alert-danger').show('medium').delay(9000).hide(0);
                                            $('.alert-danger span').text(response.message);
                                            $('.alert-warning').hide();
                                        }else{
                                            $('.alert-warning').hide();
                                            $('.alert-success').show('medium');
                                            $('.alert-success span').text(response.message);
                                            window.location = response.href;
                                        }
                                    });
                                return false;
                        }
                    }), $(".login-form input").keypress(function(r) {
                        return 13 == r.which ? ($(".login-form").validate().form() && $(".login-form").submit(), !1) : void 0
                    }), $(".forget-form input").keypress(function(r) {
                        return 13 == r.which ? ($(".forget-form").validate().form() && $(".forget-form").submit(), !1) : void 0
                    }), $("#forget-password").click(function() {
                        $(".login-form").hide(), $(".forget-form").show()
                    }), $("#back-btn").click(function() {
                        $(".login-form").show(), $(".forget-form").hide()
                    })
                };
                return {
                    init: function() {
                        r(),$(".login-bg").backstretch(["templates/assets/pages/img/login/bg3.jpg","templates/assets/pages/img/login/bg3.jpg","templates/assets/pages/img/login/bg3.jpg"], {
                            fade: 1e3,
                            duration: 8e3
                        }), $(".forget-form").hide()
                    }
                }
            }();
            $(document).ready(function(){
                Login.init();
            });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>