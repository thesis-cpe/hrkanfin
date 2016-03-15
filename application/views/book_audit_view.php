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
        <!--Editor-->
        <!--  <link rel="stylesheet" type="text/css" href="https://bi.kanfin.com/metronic/theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
          <link rel="stylesheet" type="text/css" href="https://bi.kanfin.com/metronic/theme/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
          <link rel="stylesheet" type="text/css" href="https://bi.kanfin.com/metronic/theme/assets/global/plugins/bootstrap-summernote/summernote.css"> -->

        <!-- include summernote css/js-->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet"> -->

        <!--summer Note-->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">

        <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">

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
        <!--summer note-->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
        <script>
            /*http://mycodde.blogspot.com/2014/09/summernote-wyswig-editor-php-tutorial.html*/

            $(document).ready(function () {
                $('#summernote').summernote({
                    height: 400,
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    }
                });
                function sendFile(file, editor, welEditable) {
                    data = new FormData();
                    data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
                    $.ajax({
                        data: data,
                        type: "POST",
                        //url: "<?php //echo base_url('manual/add_audit_content')    ?>",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (url) {
                            editor.insertImage(welEditable, url);
                        }
                    });
                }
            });
        </script>



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
                            <h3 class="box-title">คู่มือการทำบัญชี</h3> <a data-toggle="modal" data-target="#pnlAddContent" href="#" style="float: right;"><span class="fa fa-plus"></span>เพิ่มเนื้อหา</a>


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

                                    <!--จาก DB-->
                                    <?php foreach ($selManualList as $rowManualList): ?>
                                        <tr>
                                            <td><?php echo $rowManualList->date; ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#content<?php echo $rowManualList->manual_list_id; ?>"><?php echo $rowManualList->title; ?></a></td>
                                            <td><?php echo $rowManualList->em_name; ?></td>
                                            <td>
                                                <!--กลุ่ม ปุ่ม-->
                                                <div class="btn-group">
                                                    <button data-toggle="modal" data-target="#EditContent<?php echo $rowManualList->manual_list_id; ?>"  type="button" class="btn btn-default btn-sm">แก้ไข</button>
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?php echo site_url("manual/del_audit_content/$rowManualList->manual_list_id"); ?>">ลบ</a></li>
                                                    </ul>
                                                </div>
                                                <!--./กลุ่ม ปุ่ม-->
                                            </td>
                                            <!--Modal ดู VDO-->
                                    <div id="content<?php echo $rowManualList->manual_list_id; ?>" class="modal fade" tabindex="-1" role="dialog">
                                        <!--    <div class="modal-dialog modal-lg" style="margin-top: 0px; width: 100%;margin-bottom: 0px;margin-left: 0px;margin-right: 0px"> -->
                                        <div class="modal-dialog modal-lg">        
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title"><?php echo $rowManualList->title; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div style="padding-left: 5px;padding-right: 5px;">
                                                        <?php echo $rowManualList->data; ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!--.Modal ดู VDO-->


                                    <!--Modal แก้ไขเนื้อหา-->
                                    <?php echo form_open('manual/edit_audit'); ?>
                                    <div id="EditContent<?php echo $rowManualList->manual_list_id; ?>" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">แก้ไข <?php echo $rowManualList->title; ?></h4>
                                                </div>
                                                <?php echo form_open("manual/add_audit_content"); ?>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input required="" placeholder="หัวเรื่อง" name="txtTitle" type="text" class="form form-control input-sm" value="<?php echo $rowManualList->title; ?>"/>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!--Editor-->
                                                            <fieldset>
                                                                <textarea  class="input-block-level" id="summernoteEdit<?php echo $rowManualList->manual_list_id; ?>" name="content" rows="18" cols="10">
                                                                    <?php echo $rowManualList->data; ?>
                                                                </textarea>
                                                            </fieldset>
                                                            <!--.Editor-->
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-default" >บันทึก</button> 
                                                </div>
                                                <?php echo form_close(); ?>
                                                <div class="modal-footer">
                                                    <!--    <button type="submit" class="btn btn-default" >บันทึก</button>  -->

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    <!--sc แก้ไขเนื้อหา-->
                                    <script>
                                        /*http://mycodde.blogspot.com/2014/09/summernote-wyswig-editor-php-tutorial.html*/

                                        $(document).ready(function () {
                                            $('#summernoteEdit<?php echo $rowManualList->manual_list_id; ?>').summernote({
                                                height: 400,
                                                onImageUpload: function (files, editor, welEditable) {
                                                    sendFile(files[0], editor, welEditable);
                                                }
                                            });
                                            function sendFile(file, editor, welEditable) {
                                                data = new FormData();
                                                data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
                                                $.ajax({
                                                    data: data,
                                                    type: "POST",
                                                    //url: "<?php //echo base_url('manual/add_audit_content')    ?>",
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (url) {
                                                        editor.insertImage(welEditable, url);
                                                    }
                                                });
                                            }
                                        });
                                    </script>

                                    <!--/.sc แก้ไขเนื้อหา-->

                                    <?php echo form_close(); ?>
                                    </tr>
                                <?php endforeach; ?>
                                <!--/.จาก DB-->


                                <!--Modal add content-->

                                <div id="pnlAddContent" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">เนื้อหา</h4>
                                            </div>
                                            <?php echo form_open("manual/add_audit_content"); ?>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input required="" placeholder="หัวเรื่อง" name="txtTitle" type="text" class="form form-control input-sm"/>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!--Editor-->
                                                        <fieldset>
                                                            <textarea  class="input-block-level" id="summernote" name="content" rows="18" cols="10"></textarea>
                                                        </fieldset>
                                                        <!--.Editor-->
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-default" >บันทึก</button> 
                                            </div>
                                            <?php echo form_close(); ?>
                                            <div class="modal-footer">
                                                <!--    <button type="submit" class="btn btn-default" >บันทึก</button>  -->

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <!--Modal add content-->
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






    </body>
</html>




