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

        <!--Datpicker-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/datepicker/datepicker3.css">
        <!--Googlemap-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/googleMap/googlemap.css">

        <!--jasny-bootstrap-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dashboard/jasny-bootstrap/jasny-bootstrap.min.css"/>
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
                        เพิ่มข้อมูลลูกค้า
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/main_data"><i class="fa fa-dashboard"></i> ข้อมูลหลัก</a></li>
                        <li class="active">เพิ่มข้อมูลลูกค้า</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo form_open_multipart('main_data/insert_customer') ?>
                    <!-- Your Page Content Here -->
                    <!--ข้อมูลองค์กร-->
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูลกิจการ</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <label>ชื่อกิจการ</label>
                                    <input required="" class="form-control" name="txtCusname" placeholder="ชื่อกิจการของลูกค้า"/>
                                </div>
                                <div class="col-sm-3">
                                    <label>สถานะ:</label>
                                    <select required="" class="form-control" name="selCusStatus">
                                        <option value="">เลือกสถานะบริษัท</option>
                                        <option value="เจ้าของคนเดียว">เจ้าของคนเดียว</option>
                                        <option value="หสม">หสม</option>
                                        <option value="คณะบุคคล">คณะบุคคล</option>
                                        <option value="มูลนิธิ">มูลนิธิ</option>
                                        <option value="สมาคม">สมาคม</option>
                                        <option value="หจก">หจก</option>
                                        <option value="บจก">บจก</option>
                                        <option value="บมจ">บมจ</option>
                                        <option value="บมจ">ร้าน</option>
                                        <option value="สถานศึกษา">สถานศึกษา</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <input required="" class="form-control" name="txtNumTax" placeholder="เลขประจำตัวผู้เสียภาษี" type="number">
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <input class="form-control" name="txtNumBand" placeholder="เลขทะเบียนการค้า" type="number">
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea name="txtAddrTh" class="form-control" cols="40" rows="4" placeholder="ที่อยู่ภาษาไทย(ขยายช่องกรอกได้)"></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea name="txtAddrEn" class="form-control" cols="40" rows="4" placeholder="ที่อยู่ภาษาอังกฤษ(ขยายช่องกรอกได้)"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input required="" name="txtCusTel" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fax"></i>
                                        </div>
                                        <input name="txtCusFax" type="text" class="form-control" placeholder="หมายเลขโทรสาร">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa  fa-globe"></i>
                                        </div>
                                        <input name="txtCusWeb" type="text" class="form-control" placeholder="www.example.com">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input name="txtCusMail" type="email" class="form-control" placeholder="exam@example.com">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div id="olNameCon">
                                        <input type="text" name="txtNameCon[]" id="txtNameCon" class="form-control" placeholder="ชื่อผู้มีอำนาจลงนาม"/>
                                    </div>

                                </div>

                                <div class="col-sm-2">
                                    <label>สถานะ:</label>
                                    <div id="selStatus">  
                                        <select class="form-control" name="selStatusCondition[]" id="selStatusCondition">
                                            <option value="เจ้าของกิจการ">เจ้าของกิจการ</option>
                                            <option value="หุ้นส่วนผู้จัดการ">หุ้นส่วนผู้จัดการ</option>
                                            <option value="กรรมการผู้จัดการ">กรรมการผู้จัดการ</option>
                                            <option value="ประธานมูลนิธิ">ประธานมูลนิธิ</option>
                                            <option value="ผู้อำนวยการ">ผู้อำนวยการ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label>&nbsp;</label>
                                    <ul class="list-inline">
                                        <li><button type="button" id="btnAdd" name="btnAdd" class="btn btn-block btn-default btm-sm"><span class="fa fa-plus"></span></button></li>
                                        <li><button type="button" id="btnDel" name="btnDel" class="btn btn-block btn-default btm-sm"><span class="fa fa-minus"></span></button></li>
                                    </ul> 
                                </div>
                                <div class="col-sm-5">
                                    <label>&nbsp;</label>
                                    <textarea name="txtConditionNam" class="form-control" cols="1" rows="4" placeholder="เงื่อนไขการลงนาม(ขยายช่องกรอกได้)"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ผู้ติดต่องาน:</label>
                                    <input class="form-control" name="txtContractName" type="text" placeholder="ชื่อผู้ที่ติดต่องาน"/>
                                </div>
                                <div class="col-md-3"> 
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="txtContractTel" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์ผู้ติดต่องาน"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input name="txtContractMail" type="email" class="form-control" placeholder="exam@example.com"/>
                                    </div>
                                </div>
                                <!--ระดับลูกค้า-->
                                <div class="col-md-3">
                                    <label>กลุ่มลูกค้า:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-group"></i>
                                        </div>
                                        <select required="" class="form-control" name="selLevelCus">
                                            <option value="">เลือกกลุ่มลูกค้า</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                        </select>
                                    </div>
                                </div>
                                <!--.ระดับลูกค้า-->
                               <!-- <div class="col-md-3">
                                    <label>รูปถ่าย:</label>
                                    <input type="file" class="form-control" name="fileImgCustomer">
                                </div> -->
                            </div>

                            <div class="row">

                                <div class="col-sm-3">
                                    <label>&nbsp;</label>  <!--รับค่าจาก GoogleMap-->
                                    <input required="" value="19.170412677723295" name="txtLat" id="lat_value" class="form-control" placeholder="ละติจูด(ค่าอัตโนมัติเมื่อลากหมุด)" />
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label><!--รับค่าจาก GoogleMap-->
                                    <input required="" value="99.90067908465574" name="txtLong" id="lon_value" class="form-control" placeholder="ลองติจูด(ค่าอัตโนมัติเมื่อลากหมุด)" />
                                </div>
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea class="form-control" name="txtCustomerMark" cols="40" rows="1" placeholder="หมายเหตุ"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!--แผนที่-->
                                <div class="col-sm-6">
                                    
                                    <div id="map_canvas"></div>
                                </div>
                                <!--รูป-->
                                <div class="col-sm-6">
                                    
                                   <!-- <img title="รูปถ่ายสำนักงาน" class="img-responsive" style="height: 350px; width: 100%;" src="<?php //echo base_url();  ?>dashboard/lte/dist/img/boxed-bg.png">  -->
                                    <!--image-->
                                    
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 430px; height: 320px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file btn-sm"><span class="fileinput-new">เลือกรูป</span><span class="fileinput-exists">เปลี่ยน</span><input type="file" name="fileImgCustomer"></span>
                                            <a href="#" class="btn-sm btn btn-default fileinput-exists" data-dismiss="fileinput">ลบ</a>
                                        </div>
                                    </div>
                                    <!--/.image-->
                                </div>

                            </div>

                        </div>
                        <!--Div Footer-->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">ล้างข้อมูล</button>
                            <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                        </div>
                        <!--.Div Footer-->

                    </div>
                    <!-- /.box-body -->



                    </form>
                    <!-- .Your Page Content Here -->
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
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dashboard/lte/dist/js/app.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <!--Datpicker-->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!--GoogleMap-->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/googleMap/googlemap.js"></script>
        <!--jasny-bootstrap-->
        <script src="<?php echo base_url(); ?>dashboard/jasny-bootstrap/jasny-bootstrap.min.js"></script>

        <!--add element-->
        <script>
            $(document).ready(function () {
                $("#btnAdd").click(function () {
                    $("#olNameCon").append("<label>&nbsp;</label><input type='text' name='txtNameCon[]' id='txtNameCon1' class='form-control' placeholder='ชื่อผู้มีอำนาจลงนาม'/>");
                    $("#selStatus").append("<label>&nbsp;</label><select class='form-control' name='selStatusCondition[]' id='selStatusCondition1'><option value='เจ้าของกิจการ'>เจ้าของกิจการ</option><option value='หุ้นส่วนผู้จัดการ'>หุ้นส่วนผู้จัดการ</option><option value='กรรมการผู้จัดการ'>กรรมการผู้จัดการ</option><option value='ประธานมูลนิธิ'>ประธานมูลนิธิ</option><option value='ผู้อำนวยการ'>ผู้อำนวยการ</option></select>");
                });
            });
        </script>
        <!--remove element-->
        <script>
            $(document).ready(function () {
                $("#btnDel").click(function () {
                    $("#txtNameCon1").remove();
                    $("#selStatusCondition1").remove();
                });
            });
        </script>
    </body>
</html>
