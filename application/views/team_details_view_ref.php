<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="refresh" content="3">
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
    
        <!--การแชท-->
                <div class="direct-chat-messages" style="height: 100%"  >
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
                                                    <?php echo $rowDataMsn->msn_text; ?>
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <!-- /.direct-chat-msg -->

                                            <?php
                                        endforeach;
                                        /* .ดึงข้อความ */
                                        ?>
                                                                  
                                  
        <!--.การแชท-->
        
        
        
        
        
        
        

        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dashboard/lte/dist/js/app.min.js"></script>
        
        
      
         
       


    </body>
</html>
