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
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/skins/skin-blue.min.css'); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .thesisLink:hover {
                color: #00A3CB;
            }
        </style>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.css') ?>">
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
                        คู่มือ
                        <small>บัญชี</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> สื่อการสอนการทำบัญชี</a></li>
                        <!-- <li class="active">Here</li> -->
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">คลังสื่อ</h3>


                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="80px">วันที่</th>
                                        <th>หัวข้อ</th>
                                        <th width="200px">ผู้เขียน</th>
                                        <th width="100px">เพิ่มเติม</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>11/3/59</td>
                                        <td ><a href="#" data-toggle="modal" data-target="#pnl1">แมวน้อยน่ารัก</a></td>
                                        <td >วิทยานิพนธ์ แท่นทอง</td>
                                        <td>
                                            <!--กลุ่ม ปุ่ม-->
                                            <div class="btn-group">
                                                <button  type="button" class="btn btn-default btn-sm">แก้ไข</button>
                                                <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">ลบ</a></li>
                                                </ul>
                                            </div>
                                            <!--./กลุ่ม ปุ่ม-->
                                        </td>
                                        <!--Modal ดู VDO-->
                                <div id="pnl1" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" style="margin-top: 0px; width: 100%;margin-bottom: 0px;margin-left: 0px;margin-right: 0px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">เนื้อหา</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div style="padding-left: 5px;padding-right: 5px;">
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/tntOCGkgt98" frameborder="0" allowfullscreen></iframe>
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/tntOCGkgt98" frameborder="0" allowfullscreen></iframe>
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/tntOCGkgt98" frameborder="0" allowfullscreen></iframe>
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/tntOCGkgt98" frameborder="0" allowfullscreen></iframe>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!--.Modal ดู VDO-->
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /Your Page Content Here -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php include_once 'template/footer.php'; ?>
            <!-- .Main Footer -->


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url('dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('dashboard/lte/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('dashboard/lte/dist/js/app.min.js'); ?>"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
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




