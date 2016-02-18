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
                        เอกสารงาน <?php echo $this->session->userdata('date_curent')." ".$this->session->userdata('time_curent');?>
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
                                    <h3 class="box-title">ฝากข้อความ</h3>

                                    <div class="box-tools pull-right">
                                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                            <i class="fa fa-comments"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="height: 400px" >
                                    <!-- Conversations are loaded here -->
                                    <div class="direct-chat-messages">
                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                            </div>
                                            <!-- /.direct-chat-info -->
                                            <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                Is this template really for free? That's unbelievable!
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->

                                        <!-- Message to the right -->
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                            </div>
                                            <!-- /.direct-chat-info -->
                                            <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                You better believe it!
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                    </div>
                                    <!--/.direct-chat-messages-->

                                    <!-- Contacts are loaded here -->
                                    <div class="direct-chat-contacts">
                                        <ul class="contacts-list">
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg">

                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Count Dracula
                                                            <small class="contacts-list-date pull-right">2/28/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            <!-- End Contact Item -->
                                        </ul>
                                        <!-- /.contatcts-list -->
                                    </div>
                                    <!-- /.direct-chat-pane -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="พิมพ์ข้อความ..." class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary btn-flat">ส่ง</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box-footer-->
                            </div>
                            <!--/.Box-->


                        </div> <!--/.col-sm-5-->
                        <div class="col-sm-8">   
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">รายละเอียดงาน</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="display: block;">
                                    <?php 
                                    //ต้องสร้างเงื่อนไขว่าถ้าไม่มีไฟล์ echo ไม่มีไฟล์ - 
                                    ?>
                                    <iframe height="450" width="100%" src="<?php echo base_url("uploads/$docPath");?>"></iframe> 
                                    <br>
                                    <?php 
                                        if($this->session->userdata('em_role') == "ผู้ดูแลระบบ"):
                                        echo form_open_multipart('project/insert_doc_team') ?>
                                    <div class="col-sm-6">
                                        <label>แนบไฟล์ใหม่:</label>
                                        <ul class="list-inline">
                                            <li><input required=""  type="file" name="fileDoc"/> </li>
                                            <li><button title="อัพโหลด" type="submit" class="btn btn-sm btn-default"><span class="fa fa-upload"></span></button></li>
                                            
                                            <input type="hidden" name="hdf1" value="<?php echo $emId;?>"/>
                                            <input type="hidden" name="hdf2" value="<?php echo $teamId;?>"/>
                                        </ul>
                                        <i>*แนะนำเป็น pdf ขนาดสูงสุด 10 mb</i>
                                        
                                        
                                    </div>
                                    
                                    <div class="col-sm-offset-3 col-sm-3">
                                        <label>ลบไฟล์:</label>
                                        <br> <a href="<?php echo base_url();?>index.php/project/del_doc_team/<?php echo $emId; ?>/<?php echo $teamId;?>/<?php echo $docPath;  ?>" class="btn btn-sm btn-default"><span class="fa fa-trash"></span></a>
                                    </div>
                                    <?php echo form_close();
                                            endif;
                                    ?>

                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div> <!--/.col-sm--->
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
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dashboard/lte/dist/js/app.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <!--Data Toogle-->

        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
        <!--Data Table1-->
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
        <!--ที่เพิ่มเข้า-->
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/select2/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Page script -->
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#reportrange span').html(start.format('D MMM, YYYY') + ' - ' + end.format('D MMM, YYYY'));
                        }
                );



                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>

        <!--include Doc-->
      <!--  <script type="text/javascript">
            $(document).ready(function () { 
                $("#docview").load("https://www.google.com") ;
            });
        </script>  -->
    </body>
</html>
