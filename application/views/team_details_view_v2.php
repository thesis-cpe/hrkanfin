<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ระบบรายงานความคืบหน้างาน</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.css') ?>">
        <!--ที่เพิ่มมา-->
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/select2/select2.min.css">




    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <?php include_once 'template/header.php'; ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <?php include_once 'template/side_bar.php'; ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        เอกสารงาน
                     <!--   <small>รหัสงาน:<?php ?> บริษัท: พนักงาน:<?php ?></small> -->
                    </h1>
                    <!--    <ol class="breadcrumb">
                          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                          <li class="active">Here</li>
                        </ol> -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container"> 
                        <div class="col-sm-4">
                            <!--Box-->
                            <div class="box box-primary direct-chat direct-chat-primary" >
                                <div class="box-header with-border">
                                    <h3 class="box-title">Brainstorming Session</h3>

                                    <div class="box-tools pull-right">
                                      <!--  <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span> -->
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                             <i class="fa fa-comments"></i></button> -->
                                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <!-- Conversations are loaded here -->

                                    <div class="direct-chat-messages" style="height: 380px" i >
                                        <?php
                                        /* ดึงข้อความ */
                                        foreach ($arrDataMsn as $rowDataMsn):
                                            ?> 

                                            <!-- Message. Default to the left -->
                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-left"><?php echo $rowDataMsn->em_name; ?></span>
                                                    <span class="direct-chat-timestamp pull-right"><?php echo $rowDataMsn->msn_date . " " . $rowDataMsn->msn_time; ?></span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="<?php echo base_url("uploads/$rowDataMsn->file_path") ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                    <?php if ($rowDataMsn->msn_file): ?>
                                                        <a target="_blank" href="<?php echo base_url(); ?>uploads/<?php echo $rowDataMsn->msn_file; ?>"><i class="fa fa-cloud-download"></i></a>
                                                    <?php endif; ?>
                                                    <?php
                                                    echo $rowDataMsn->msn_text;
                                                    echo nbs(2);
                                                    if ($rowDataMsn->msn_sent == $this->session->userdata('em_id')): //ถ้า session == ผู้ส่ง
                                                        ?>
                                                        <a style="font-size: 12px;color: grey;" href="<?php echo site_url(); ?>/project/del_msn/<?php echo $rowDataMsn->msn_id; ?>">...ลบ</a>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <!-- /.direct-chat-msg -->

                                            <?php
                                        endforeach;
                                        /* .ดึงข้อความ */
                                        ?>

                                        <!-- Message to the right -->
                                        <!--    <div class="direct-chat-msg right">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                                </div>
                                               
                                                <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">
                                                <div class="direct-chat-text">
                                                    You better believe it!
                                                </div>
                                                
                                            </div> -->
                                        <!-- /.direct-chat-msg -->
                                    </div>
                                    <!--/.direct-chat-messages-->

                                    <!-- Contacts are loaded here -->

                                    <!-- /.direct-chat-pane -->

                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                      <!--  <form action="<?php echo base_url(); ?>index.php/project/sent_msn" method="post"> -->
                                        <?php echo form_open_multipart('project/sent_msn'); ?>

                                        <!--/.แนบไฟล์-->
                                        <div class="input-group">
                                            <input type="file" name="fileMsn"/>
                                        </div>

                                        <!--/.แนบไฟล์-->
                                        <div style="margin-bottom: 10px"></div>
                                        <!--พิมพ์ข้อความ-->
                                        <div  class="input-group">
                                            <input required="" type="text" name="message" placeholder="พิมพ์ข้อความ..." class="form-control">
                                            <input type="hidden" name="hdf3" value="<?php echo $emId; ?>">
                                            <input type="hidden" name="hdf4" value="<?php echo $teamId; ?>"> 
                                            <input type="hidden" name="hdf5" value="<?php echo $projectId; ?>">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary btn-flat">ส่ง</button>
                                            </span>
                                        </div>
                                        <!--/.พิมพ์ข้อความ-->
                                        </form>
                                    </div>
                                    <!-- /.box-footer-->
                                </div><!-- /.id msn-->
                            </div>
                            <!--/.Box-->

                            <!--กล่องกดด่วน-->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">EMS</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!--ปุ่มEMS-->
                                    <?php if ($projectDetail['project_ems'] == "รับทราบ"): ?>
                                        <a href="<?php echo site_url(); ?>/project/ems/<?php echo $projectId; ?>/แจ้งทราบ" class="btn btn-app">
                                            <i class="fa fa-bullhorn"></i> แจ้งทราบ
                                        </a>
                                    <?php elseif ($projectDetail['project_ems'] == "แจ้งทราบ"): ?>
                                        <a href="<?php echo site_url(); ?>/project/ems/<?php echo $projectId; ?>/รับทราบ" class="btn btn-app">
                                            <i class="fa fa-bullhorn"></i> รับทราบ
                                        </a>
                                    <?php endif; ?>
                                    <!--.ปุ่มEMS-->
                                    <a class="btn btn-app" data-toggle="modal" data-target="#pnlListFile" >
                                        <i class="fa fa-list-ul"></i> รายการไฟล์
                                    </a>

                                    <!--รายการไฟล์-->

                                    <!--.รายการไฟล์-->
                                </div>
                                <!-- /.box-body -->
                            </div>


                            <!--/.กล่องกดด่วน-->
                        </div> <!--/.col-sm-5-->
                        <div class="col-sm-8">   
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Hilight Session</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: block;">
                                   
                                    
                                   
                                   
                                    <?php
                                    echo form_open_multipart('project/insert_doc_team');
                                    ?>
                                    <div class="col-sm-6">
                                        <label>แนบไฟล์ใหม่:</label>
                                        <ul class="list-inline">
                                            <li><input required=""  type="file" name="fileDoc"/> </li>
                                            <li><button title="อัพโหลด" type="submit" class="btn btn-sm btn-default"><span class="fa fa-upload"></span></button></li>

                                            <input type="hidden" name="hdf1" value="<?php echo $emId; ?>"/>
                                            <input type="hidden" name="hdf2" value="<?php echo $teamId; ?>"/>
                                            <input type="hidden" name="docPath" value="<?php //echo $docPath; ?>">
                                            <input type="hidden" name="hdfpro" value="<?php echo $projectId; ?>"/>
                                        </ul>
                                        <i>*แนะนำเป็น pdf ขนาดสูงสุด 10 mb </i>
                                    </div>

                                    <div class="col-sm-offset-3 col-sm-3">
                                        <label>ลบไฟล์:</label>
                                        <br> 
                                       
                                    </div>
                                    <?php
                                    echo form_close();
                                    ?>

                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div> <!--/.col-sm--->

                        <!--modal รายการไฟล์-->
                        <div id="pnlListFile" class="modal fade" tabindex="-1" role="dialog" > 
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">รายการไฟล์</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!--ตารางแสดงรายการไฟล์-->
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>วันที่</th>
                                                    <th>ผู้นำเข้า</th>
                                                    <th>โน้ต</th>
                                                    <th>ไฟล์แนบ</th>
                                                    <th>เพิ่มเติม</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Rendering engine</td>
                                                    <td>Rendering engine</td>
                                                    <td>Rendering engine</td>
                                                    <td>Rendering engine</td>
                                                    <td>ลบ / นำแสดง</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--/.ตารางแสดงรายการไฟล์-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!--/.modal รายการไฟล์-->


                    </div> <!--/.Containner-->



                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php include_once 'template/footer.php'; ?>
            <!-- .Main Footer -->

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dashboard/lte/dist/js/app.min.js"></script>
        <!--Data Table-->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });

        </script>





    </body>
</html>
