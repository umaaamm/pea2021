<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8" />
        <title><?php echo $site_nama.' | '.$title_site; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="templates/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="templates/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        
        <link href="templates/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

        <link href="templates/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="templates/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="templates/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

        <link href="templates/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="templates/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="templates/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        
        <script src="templates/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="userdata/profile_site/favicon.ico" /> 
        <script type="text/javascript">
            function changeDateFormat(inputDate){
                var splitDate = inputDate.split('-');
                if(splitDate.count == 0){
                    return null;
                }
                var year = splitDate[0];
                var month = splitDate[1];
                var day = splitDate[2]; 
                return day + '-' + month + '-' + year;
            }

            function formatCurrency(obj) {

                if (Number(obj.value)) {
                    var current = obj.value;
                    var after = current;
                } else {
                    var current = obj.value.replace(/[\\A-Za-z!"?$%^&*+_={}; ()\:'/@#~?\<>?|`?\]\[]/g, '');
                    var after = current;
                }

                current = current.replace(/\,/g, "");
                var decimalpoint = current.lastIndexOf(".");

                var n;
                var d;

                if (decimalpoint >= 0) {
                    var f = current.split(".");
                    d = f[1];
                    n = f[0];
                } else {
                    n = current;
                }

                var index = parseInt((n.length - 1) / 3);
                if (index != 0) {
                    var prefixIndex = n.length - index * 3;
                    after = n.substr(0, prefixIndex) + "," + n.substr(prefixIndex, 3);
                    for (var i = 2; i <= index; i++) {
                        after += "," + n.substr(prefixIndex + 3 * (i - 1), 3);
                    }

                    if (decimalpoint >= 0) {
                        after += "." + d;
                    }
                }
                if (after < 0) {
                    after = after.replace(/\-/g, "");
                    after = '(' + after + ')';
                }
                obj.value = after;
            }

            function number_format(number, decimals, dec_point, thousands_sep) {
                number = (number + '')
                    .replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + (Math.round(n * k) / k)
                        .toFixed(prec);
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
                    .split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '')
                    .length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1)
                    .join('0');
                }
                return s.join(dec);
            }
                var BASE_URL = '<?php echo base_url();?>';
                var SITE_URL = '<?php echo site_url();?>';
	</script>
        </script>
    </head>
    <!-- END HEAD -->

   <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed page-sidebar-closed">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="">
                            <img src="userdata/profile_site/<?php echo $site_logo_besar; ?>" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            <!-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                             
                            </li> -->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="userdata/user/<?php echo $user_foto; ?>" />
                                    <span class="username username-hide-on-mobile"> <?php echo $user_nip;?> | <?php echo $user_nama_lengkap;?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="logout">
                                            <i class="icon-key"></i> <?php echo lang('lbl_sign_out'); ?> </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <!-- <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li> -->
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            
                            <?php foreach($menu_list as $m){ ?>
                            <?php if(isset($m['submenu'])){ ?>
                                <li <?php if($m['menu_id']==$parent_menu_id){ echo 'class="nav-item active"';}else{echo 'class="nav-item"';} ?> >
                                  <a href="#" class="nav-link nav-toggle">
                                    <i class="fa <?php echo $m['menu_icon']; ?>"></i> 
                                    <span class="title"><?php echo $m['menu_nama']; ?></span>
                                    <span <?php if($m['menu_id']==$parent_menu_id){ echo 'class="arrow open"';}else{echo 'class="arrow"';} ?>></span>
                                  </a>
                                  <?php if(isset($m['submenu'])){ ?>
                                    <ul class="sub-menu">
                                      <?php foreach($m['submenu'] as $sm){ ?>
                                          <?php if(isset($sm['submenu'])){ ?>
                                            <li <?php if($sm['menu_id']==$menu_id){ echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>>
                                              <a href="#" class="nav-link nav-toggle">
                                                <i class="fa <?php echo $sm['menu_icon']; ?>"></i> 
                                                  <?php echo $sm['menu_nama']; ?>
                                                <span <?php if($sm['menu_id']==$menu_id){ echo 'class="arrow open"';}else{echo 'class="arrow"';} ?>></span>
                                              </a>
                                              <ul class="sub-menu">
                                                <?php foreach($sm['submenu'] as $ssm){ ?>
                                                    <li <?php if($ssm['menu_controller'] == $function_nama){  echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>>
                                                      <a href="<?php echo $m['menu_controller'] . '/' . $sm['menu_controller']. '/' . $ssm['menu_controller']; ?>" class="nav-link nav-toggle">
                                                        <i class="fa <?php echo $ssm['menu_icon']; ?>"></i> 
                                                        <?php echo $ssm['menu_nama']; ?>
                                                      </a>
                                                    </li>
                                                <?php } ?>
                                              </ul>
                                            </li>
                                          <?php }else{ ?>
                                            <li <?php if($sm['menu_id']==$menu_id){ echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>>
                                              <a href="<?php echo $m['menu_controller'] . '/' . $sm['menu_controller']; ?>" class="nav-link nav-toggle">
                                                <i class="fa <?php echo $sm['menu_icon']; ?>"></i> 
                                                <?php echo $sm['menu_nama']; ?>
                                              </a>
                                            </li>
                                          <?php } ?>
                                      <?php } ?>
                                    </ul>
                                  <?php } ?>
                                </li>
                            <?php }else{ ?>
                                <li <?php if($m['menu_id']==$parent_menu_id){ echo 'class="nav-item active"';}?> class="nav-item">
                                  <a href="<?php echo $m['menu_controller'];?>"><i class="fa <?php echo $m['menu_icon']; ?>"></i> 
                                    <span class="title"><?php if(lang('con_'.$m['menu_controller'])) echo lang('con_'.$m['menu_controller']); else echo $m['menu_nama']; ?></span>
                                  </a>
                                </li>
                            <?php } ?>  
                            <?php } ?>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                