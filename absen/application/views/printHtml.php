<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for invoice sample" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="templates/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="templates/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="templates/assets/pages/css/invoice-2.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="templates/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="templates/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="templates/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
            @page {
               margin: 15mm 15mm 15mm 15mm;  
               /*margin : 0;*/
            }

            table, th, td {
                border: 1px solid black;
            }
        </style>
        </head>
    <!-- END HEAD -->

    <body onload="window.print()">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- END PAGE HEADER-->
                        <div class="invoice-content-2">
                            <div class="row invoice-head" style="margin-bottom: 10px;">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="invoice-logo">
                                        <img src="templates/assets/pages/img/login/logo_pegadaian_vertikal.png" class="img-responsive" width="100px" height="125" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <a class="btn btn-lg purple-sharp hidden-print uppercase print-btn text-right" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>
                            </div>
                            <div class="row invoice-cust-add" style="margin-bottom: 5px;">
                                <div class="col-xs-12">
                                    <center><h4><b><?php echo $title; ?></b></h4></center>
                                </div>
                            </div>
                            <div class="row invoice-body">
                                <div class="col-xs-12 table-responsive">
                                    <?php 

                                        $tableHeaderList = $result_data->list_fields();
                                        $tableBodyList   = $result_data->result_array();
                                    ?>
                                    <center>
                                    <table>
                                        <thead>
                                            <tr>
                                    <?php
                                                for ($i = 0, $c = count($tableHeaderList); $i < $c; $i++)
                                                {
                                    ?>
                                                    <th style="font-size: 10px;padding-left: 5px;padding-right: 5px;"><center><?php echo $tableHeaderList[$i]; ?></center></th>
                                    <?php       
                                                }
                                    ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                            foreach ($tableBodyList as $tableBody) {
                                    ?>
                                            <tr>
                                    <?php
                                                for ($i = 0, $c = count($tableHeaderList); $i < $c; $i++)
                                                {
                                    ?>
                                                <td style="font-size: 10px;padding-left: 5px;padding-right: 5px;"><?php echo $tableBody[$tableHeaderList[$i]]; ?></td> 
                                    <?php       
                                                }
                                    ?>
                                            </tr>
                                    <?php       
                                            }
                                    ?>
                                        </tbody>
                                    </table>
                                    </center>
                                </div>
                            </div>
                            <!-- <div class="row invoice-subtotal">
                            </div> -->
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
       
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
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="templates/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="templates/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="templates/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="templates/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="templates/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>