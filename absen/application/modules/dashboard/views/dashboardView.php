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
                        <div class="btn-group">
                            <button class="btn blue"><?php echo $branch_id;?>
                            </button>
                        </div>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">

                                    <div class="row">
                                    <div class="col-sm-6">
                                        <table id="kehadiran" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                   <th>Seq</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            
                                        </table>
                                    </div>

                                        <div class="col-sm-4">
                                            
                                                <br>
                                                <div id="main">
                                                    <div id="wrap">
                                                        <video id="preview"></video>
                                                    </div>		
                                                </div>

                                        </div>
                                    </div>


                                    </div>

                                </div>
                                <!-- END TABLE PORTLET-->
                           </div>
                        </div>
                        <div class="clearfix"></div>
                   
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->


<script src="templates/assets/apps/scripts/instascan.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {
    $('#kehadiran').DataTable( {
        "ajax": {
            url : SITE_URL+'dashboard/dashboard/get_json/',
            type : 'GET',
        },
        "order": [
          [0, "desc" ]
        ],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    } );
} );

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
					var postData = {
						'qr' :  content
					};
					
								// ajax adding data to database
										$.ajax({
											url : "dashboard/dashboard/act_add",
											type: "POST",
											data: postData,
											dataType: "JSON",
											success: function(data)
											{
												if(data.success){
													if(data.type=='success'){
														$('#kehadiran').DataTable().ajax.reload();
													}
				
													swal({
														position: 'top-end',
														type: data.type,
														title: data.msg,
														showConfirmButton: false,
														timer: 1500
													})

												}
											},
											error: function (jqXHR, textStatus, errorThrown)
											{
													alert('Invalid QR Code');
                                            }
									});
		

				});

		
      Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
                console.error(e);
        });
    
			
</script>