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
        <link rel="stylesheet" href="<?php echo base_url() ?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url() ?>dashboard/lte/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--Datpicker-->
        <link rel="stylesheet" href="<?php echo base_url() ?>dashboard/lte/plugins/datepicker/datepicker3.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>dashboard/lte/plugins/datatables/dataTables.bootstrap.css">



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
                        เพิ่มโครงการ
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url();?>index.php/project"><i class="fa fa-dashboard"></i>โครงการ</a></li>
                        <li class="active">เพิ่มโครงการ</li>
                    </ol>
                </section>

                <!-- Main content -->

                <?php echo form_open_multipart('project/update_project'); ?>
                
                <section class="content">

                    <!-- Your Page Content Here -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box-body">
                                <div class="callout callout-info">
                                    <center>เลขประจำตัวผู้เสียภาษีอากร: <?php echo $taxId ?><a></a> หน่วยงาน: <?php echo $customerName; ?> <a></a></center>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Box ข้อมูลโครงการ-->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">ข้อมูลโครงการ</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!--รหัสงานที่ Gen ใหม่-->
                                <div class="col-sm-3">
                                    <label>รหัสงาน:</label>
                                    <input   type="text" class="form-control" name="txtIdWorkCustomer"  value="<?php echo $project_detail['project_number'];?>" readonly=""/>
                                </div>
                                <div class="col-sm-3">
                                    <!--echo ชื่อหน่วยงานลง value-->
                                    <label>หน่วยงาน:</label>
                                    <input type="text" class="form-control" name="txtCustomerName" value="<?php echo $customerName; ?>" readonly=""/>
                                </div>
                                <!--รายได้โครงการ-->
                                <div class="col-sm-6">
                                    <label>หัวข้องาน:</label>
                                    <input value="<?php echo $project_detail['project_title'] ?>" required="" class="form-control" name="txtWorkTitle" placeholder="หัวข้องาน" type="text">
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea class="form-control" name="txtMarkProject" placeholder="หมายเหตุ"><?php echo $project_detail['project_note']?></textarea>
                                </div>
                                <!--รายได้โครงการ-->
                                <div class="col-sm-3">
                                    <label>รายได้โครงการ:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-usd"></i>
                                        </div>
                                        <input value="<?php echo $project_detail['project_income'];?>" name="txtAssetProject" type="number" class="form-control" placeholder="รายได้โครงการ(บาท)"/>
                                    </div>
                                </div>
                                <!--ค่าใช้จ่ายสำนักงาน-->
                                <div class="col-sm-3">

                                    <label>ค่าใช้จ่ายสำนักงาน</label>
                                    <input value="<?php echo $project_detail['project_coast'];?>" type="number"  class="form-control" name="txtCoastOffice" placeholder="ค่าใช้จ่ายสำนักงาน(บาท)"  />
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>


                    <!--Box ข้อมูลทีมงาน-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">ข้อมูลทีมงาน</h3>
                        </div>
                        <div class="box-body">

                            <!--Data Table ข้อมูลพนักงานในทีม-->
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped delete_multiple_check_box">
                                    <thead>
                                        <tr>
                                            <th><!--<input type="checkbox" class="checkall"  /> -->เลือก</th> 
                                            <th width="10">ลำดับ</th>
                                            <th>สถานะ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>จำนวนนาที</th>
                                            <th>บาท/นาที</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php for ($i = 1,$j=0; $i <= 10,$j<10; $i++,$j++): ?>        
                                        <tr>
                                                <!--สถานะ-->
                                                <td><input type="checkbox" class="checkbox" id="chkBox<?php echo $i; ?>" <?php if(!@empty($teamDetail[$j]['em_id'])){echo "checked";}?> /></td>
                                                <td><center><?php echo $i; ?></center></td>
                                        <td>
                                            <select class="form-control" name="selEmRole[]" id="selEmRole<?php echo $i; ?>" <?php if(@empty($teamDetail[$j]['em_id'])){echo "disabled";}?>>
                                                <option value="" disabled selected>เลือกสถานะ</option>
                                                <option <?php if(@$teamDetail[$j]['team_role'] == "ผู้ทำบัญชี"){echo "selected";}?> value="ผู้ทำบัญชี">หัวหน้าทีม</option>
                                                <option <?php if(@$teamDetail[$j]['team_role'] == "ผู้ปฏิบัติงาน"){echo "selected";}?> value="ผู้ปฏิบัติงาน">ผู้ปฏิบัติงาน</option>
                                            </select>
                                        </td>
                                        <!--ชื่อ-นามสกุล-->
                                        <td>
                                            <select class="form-control" name="selEmName[]" id="selEmName<?php echo $i; ?>" <?php if(@empty($teamDetail[$j]['em_id'])){echo "disabled";}?> >
                                                <option value="" disabled selected>เลือกพนักงาน</option>
                                                <?php foreach ($employeeDetail as $rowem_name): ?>
                                                <option <?php if(@$teamDetail[$j]['em_id'] == $rowem_name->em_id){echo "selected";}?> value="<?php echo $rowem_name->em_id; ?>" ><?php echo $rowem_name->em_name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <!--จำนวนชั่วโมง-->
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <input value="<?php echo @$teamDetail[$j]['team_hour']?>" name="txtCountWorkHour[]" id="txtCountWorkHour<?php echo $i; ?>" type="number" class="form-control" placeholder="ชั่วโมงการทำงาน" <?php if(@empty($teamDetail[$j]['em_id'])){echo "disabled";}?> />
                                            </div>
                                        </td>
                                        <!--บาท/ชั่วโมง-->
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-usd"></i>
                                                </div>
                                                <input value="<?php echo @$teamDetail[$j]['team_salary']?>" name="txtBathTime[]" id="txtBathTime<?php echo $i; ?>" type="number" class="form-control" placeholder="ค่าจ้าง" <?php if(@empty($teamDetail[$j]['em_id'])){echo "disabled";}?> />
                                            </div>
                                        </td>
                                        <!--เพิ่มเติม-->
                                        <td>
                                          <a title="ลบรายการนี้" href="javascript:;" class="delete_single btn btn-sm btn-default"><span class="fa fa-trash"></span></a>
                                        </td>
                                        </tr>
                                        <!--CheckBox-->
                                        <script>
                                            document.getElementById('chkBox<?php echo $i; ?>').onchange = function () {
                                                document.getElementById('selEmRole<?php echo $i; ?>').disabled = !this.checked;
                                                document.getElementById('selEmName<?php echo $i; ?>').disabled = !this.checked;
                                                document.getElementById('txtCountWorkHour<?php echo $i; ?>').disabled = !this.checked;
                                                document.getElementById('txtBathTime<?php echo $i; ?>').disabled = !this.checked;

                                            };
                                        </script>
                                        <!--.CheckBox-->
                                    <?php endfor; ?> 

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><a href="javascript:;" class="deleteall btn btn-default btm-xs" title="ลบรายที่เลือก"><span class="fa fa-trash"></span></a></th>
                                            <th colspan="6"></th>
                                           
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> <!--/.div table responsive-->

                            <!--/.Data Table ข้อมูลพนักงานในทีม-->
                            <!-- </div> -->
                            <!-- /.box-body แสดงพนักงานในทีม -->  
                            <!--   </div> -->
                            <!-- /.Box Data table แสดงพนักงานในทีม -->  
                        </div>
                        <!-- /.box-body -->
                    </div>



                    <!--Box ข้อมูลงาน-->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">ข้อมูลงาน</h3>
                        </div>
                        <div class="box-body">
                            <!--วันที่เริ่มทำ-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>วันที่เริ่มรอบบัญชี:</label>

                                   <!-- <input  data-provide="datepicker" name="datInWork" type="text" class="form-control datepicker" placeholder="" data-date-format="dd/mm/yyyy">-->
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input value="<?php echo $project_detail['prject_start']; ?>" name="datIntWork" type="text" class="form-control" placeholder="01/01/2016">

                                    </div>
                                </div>


                                <!--วันที่สิ้นสุด-->  
                                <div class="col-sm-4">
                                    <label>วันที่สิ้นสุดรอบบัญชี:</label>

                                   <!-- <input  data-provide="datepicker" name="datInWork" type="text" class="form-control datepicker" placeholder="" data-date-format="dd/mm/yyyy">-->
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input value="<?php echo $project_detail['project_end']; ?>" name="datFinalWork" type="text" class="form-control" placeholder="01/01/2017">

                                    </div>
                                </div>

                                <!--วันที่รับทำบัญชี-->  
                                <div class="col-sm-4">
                                    <label>วันที่รับทำบัญชี:</label>

                                   <!-- <input  data-provide="datepicker" name="datInWork" type="text" class="form-control datepicker" placeholder="" data-date-format="dd/mm/yyyy">-->
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input value="<?php echo $project_detail['project_receip']; ?>" name="datAcepeWork" type="text" class="form-control" placeholder="01/01/2016">

                                    </div>
                                </div>

                                <!--อัตราค่าทำบัญชี-->

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>อัตราค่าทำบัญชี:</label>
                                    <select class="form-control" name="selRateCoast">

                                        <option <?php if($project_detail['project_rate'] == "รายเดือน"){ echo "selected";}?> value="รายเดือน">รายเดือน</option>
                                        <option <?php if($project_detail['project_rate'] == "รายครั้ง"){ echo "selected";}?>  value="รายครั้ง">รายครั้ง</option>
                                    </select>
                                </div>
                                <!--จำนวนเงินบาท-->
                                <div class="col-sm-4">
                                    <label>&nbsp;</label>
                                    <input value="<?php echo $project_detail['project_coasts'];?>" class="form-control" name="txtRevenueAudit" type="number"  placeholder="จำนวนเงิน(บาท)" />
                                </div>

                                <div class="col-sm-4">
                                    <label>&nbsp;</label>
                                    <input value="<?php echo $project_detail['project_period'];  ?>" class="form-control" name="txtInstallment" type="number"  placeholder="จำนวนงวดงาน"/>
                                </div>

                            </div>


                        </div>
                        <!-- /.box-body -->
                    </div>


                    <!--ใบเสนอราคา-->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">เอกสาร</h3>
                        </div>
                        <div class="box-body">
                            <!--ใบเสนอราคา-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ใบเสนอราคา:</label>
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                          <?php $dateOfferid = 0; if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "ใบเสนอราคา") ||($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"))){
                                              if($prodoc[0]['project_doc_name'] == "ใบเสนอราคา"){
                                                  echo "<input required value='"; echo @$prodoc[0]['project_doc_qua_dat'];echo"'   name='datOffers' type='text' class='form-control' placeholder='วันที่เสนอราคา 01/01/2016'>";
                                                  $dateOfferid = @$prodoc[0]['project_doc_id'];
                                                  
                                              }
                                              if($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"){
                                                  echo "<input required value='"; echo @$prodoc[1]['project_doc_qua_dat'];echo"'   name='datOffers' type='text' class='form-control' placeholder='วันที่เสนอราคา 01/01/2016'>";
                                              
                                                   $dateOfferid = @$prodoc[1]['project_doc_id'];
                                              }
                                              
                                          }else{
                                              echo "<input required   name='datOffers' type='text' class='form-control' placeholder='วันที่เสนอราคา 01/01/2016'>";
                                          }?>
                                       <!--   <input  name="datOffers" type="text" class="form-control" placeholder="วันที่เสนอราคา 01/01/2016"> -->
                                        <input type="hidden" name="hdf1" value="<?php echo @$dateOfferid?>">
                                    </div>
                                </div>
                                <!--ยอดเงินรวม-->  
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <?php if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "ใบเสนอราคา") ||($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"))){
                                              if($prodoc[0]['project_doc_name'] == "ใบเสนอราคา"):  ?>
                                                <input value="<?php echo @$prodoc[0]['project_doc_money']; ?>" class="form-control" name="txtSumMoney" type="number" placeholder="ยอดเงินรวม"/>  
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"): ?>
                                    <input value="<?php echo @$prodoc[1]['project_doc_money']; ?>" class="form-control" name="txtSumMoney" type="number" placeholder="ยอดเงินรวม"/>
                                            <?php endif; }else{ ?>
                                               <input class="form-control" name="txtSumMoney" type="number" placeholder="ยอดเงินรวม"/>
                                            <?php }?>
                                    
                                    
                                   
                                </div>
                                <!--เลขที่ใบเสนอราคา-->  
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <?php if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "ใบเสนอราคา") ||($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"))){
                                              if($prodoc[0]['project_doc_name'] == "ใบเสนอราคา"):  ?>
                                               <input value="<?php echo @$prodoc[0]['project_doc_no'] ?>" class="form-control" name="txtNoOffer" type="number" placeholder="เลขที่ใบเสนอราคา"/> 
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"): ?>
                                    <input value="<?php echo @$prodoc[1]['project_doc_no'] ?>" class="form-control" name="txtNoOffer" type="number" placeholder="เลขที่ใบเสนอราคา"/>
                                            <?php endif; }else{ ?>
                                               <input class="form-control" name="txtNoOffer" type="number" placeholder="เลขที่ใบเสนอราคา"/>
                                            <?php }?>
                                    
                                </div>
                                <!--ไฟล์ใบเสนอราคา-->  
                                <div class="col-sm-2">
                                    <label>&nbsp;</label>
                                    <input  name="fileDocOfffer" type="file" />
                                </div>
                                
                                <div class="col-sm-1">
                                     <?php if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "ใบเสนอราคา") ||($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"))){
                                              if($prodoc[0]['project_doc_name'] == "ใบเสนอราคา"):  ?>
                                               <div style="padding-top: 21px">
                                         <a target="_blank" title="ใบเสนอราคา" href="<?php echo base_url();?>uploads/<?php echo $prodoc[0]['project_doc_path'] ?>" class="btn btn-sm btn-default" ><span class="fa fa-download"></span></a>
                                    </div>
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "ใบเสนอราคา"): ?>
                                     <div style="padding-top: 21px">
                                         <a target="_blank" title="ใบเสนอราคา" href="<?php echo base_url();?>uploads/<?php echo $prodoc[1]['project_doc_path'] ?>" class="btn btn-sm btn-default" ><span class="fa fa-download"></span></a>
                                    </div>
                                            <?php endif; }else{ ?>
                                               <div style="padding-top: 21px">
                                        <a title="ไม่พบไฟล์">-</a>
                                    </div>
                                            <?php }?>
                                    
                                    
                                </div>
                                

                            </div>
                            

                            <!--สัญญาจ้าง-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>สัญญาจ้าง:</label>
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        
                                         <?php $docEmployId = 0; if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "สัญญาจ้าง") ||($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"))){
                                              if($prodoc[0]['project_doc_name'] == "สัญญาจ้าง"): $docEmployId = $prodoc[0]['project_doc_id'];  ?>
                                                <input required value="<?php echo @$prodoc[0]['project_doc_qua_dat']; ?>" name="datOffersEmploy" type="text" class="form-control" placeholder="วันที่ทำสัญญา 01/01/2016"/>  
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"): $docEmployId = $prodoc[1]['project_doc_id']; ?>
                                    <input required value="<?php echo @$prodoc[1]['project_doc_qua_dat']; ?>" name="datOffersEmploy" type="text" class="form-control" placeholder="วันที่ทำสัญญา 01/01/2016" />
                                            <?php endif; }else{ ?>
                                    <input required name="datOffersEmploy" type="text" class="form-control" placeholder="วันที่ทำสัญญา 01/01/2016">
                                            <?php }?>
                                    <input type="hidden" name="hdf2" value="<?php echo @$docEmployId;?>">
                                        </div>
                                </div>
                                <!--ยอดเงินรวม-->  
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <?php if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "สัญญาจ้าง") ||($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"))){
                                              if($prodoc[0]['project_doc_name'] == "สัญญาจ้าง"):  ?>
                                                <input value="<?php echo @$prodoc[0]['project_doc_money']; ?>" class="form-control" name="txtSumMoneyEmploy" type="number" placeholder="ยอดเงินรวม"/>  
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"): ?>
                                    <input value="<?php echo @$prodoc[1]['project_doc_money']; ?>" class="form-control" name="txtSumMoneyEmploy" type="number" placeholder="ยอดเงินรวม" />
                                            <?php endif; }else{ ?>
                                              <input class="form-control" name="txtSumMoneyEmploy" type="number" placeholder="ยอดเงินรวม"/>
                                            <?php }?>
                                </div>
                                <!--เลขที่สัญญาจ้าง--->  
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    
                                    <?php if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "สัญญาจ้าง") ||($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"))){
                                              if($prodoc[0]['project_doc_name'] == "สัญญาจ้าง"):  ?>
                                                <input value="<?php echo @$prodoc[0]['project_doc_no']; ?>" class="form-control" name="txtNoEmploy" type="number" placeholder="เลขที่ใบสัญญา"/>  
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"): ?>
                                    <input value="<?php echo @$prodoc[1]['project_doc_no']; ?>" class="form-control" name="txtNoEmploy" type="number" placeholder="เลขที่ใบสัญญา" />
                                            <?php endif; }else{ ?>
                                               <input class="form-control" name="txtNoEmploy" type="number" placeholder="เลขที่ใบสัญญา"/>
                                            <?php }?>
                                 </div>
                                <!--ไฟล์สัญญาจ้าง--->  
                                <div class="col-sm-2">
                                    <label>&nbsp;</label>
                                    <input  name="fileDocEmploy" type="file" />
                                </div>
                                
                                 <div class="col-sm-1">
                                    
                                    
                                    <?php if((!empty($prodoc)) &&(($prodoc[0]['project_doc_name'] == "สัญญาจ้าง") ||($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"))){
                                              if($prodoc[0]['project_doc_name'] == "สัญญาจ้าง"):  ?>
                                                <div style="padding-top: 21px">
                                                <a href="<?php echo base_url();?>uploads/<?php echo $prodoc[0]['project_doc_path'] ?>" target="_blank" itle="สัญญาจ้าง" class="btn btn-sm btn-default" ><span class="fa fa-download"></span></a>
                                                 </div>
                                            <?php endif;
                                              if($prodoc[1]['project_doc_name'] == "สัญญาจ้าง"): ?>
                                                 <div style="padding-top: 21px">
                                                <a href="<?php echo base_url();?>uploads/<?php echo $prodoc[1]['project_doc_path'] ?>" target="_blank" itle="สัญญาจ้าง" class="btn btn-sm btn-default" ><span class="fa fa-download"></span></a>
                                                 </div>
                                         <?php endif; }else{ ?>
                                                 <div style="padding-top: 21px">
                                              <a title="ไม่พบไฟล์"  >-</a>
                                                 </div>
                                            <?php }?>
                                     </div>

                            </div>
                            <!--รายละเอียดเอกสาร-->
                           
                            <hr>
                            
                          <?php for($y=0; $y<sizeof($prodoc);$y++):?>   
                            
                            <div class="row">
                                <div class="col-sm-3"><label>วันที่:</label><?php echo nbs(3);echo $prodoc[$y]['project_doc_qua_dat'];?></div>
                                <div class="col-sm-3"><label>ยอดเงิน:</label><?php echo nbs(3);echo $prodoc[$y]['project_doc_money'];?></div>
                                <div class="col-sm-3"><label>เลขที่:</label><?php echo nbs(3);echo $prodoc[$y]['project_doc_no'];?></div>
                                <div class="col-sm-3"><label>เอกสาร:</label><?php echo nbs(3);?><a target="_blank" href="<?php echo base_url()."uploads"."/".$prodoc[$y]['project_doc_path']; ?>"><?php echo $prodoc[$y]['project_doc_name']; ?></a></div>
                            </div>
                            <hr>
                           <?php endfor;?>
                            <!--.รายละเอียดเอกสาร-->
                        </div>
                        <!-- /.box-body -->

                        <!--Div Footer-->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">ล้างข้อมูล</button>
                            <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                        </div>
                        <!--.Div Footer-->

                    </div>




                    <!-- .Your Page Content Here -->
                </section>
                <input type="hidden" value="<?php echo $projectId ?>" name="hdfProId"/>
                </form>
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
        <script src="<?php echo base_url() ?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>dashboard/lte/dist/js/app.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <!--Datpicker-->
        <script src="<?php echo base_url() ?>dashboard/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>dashboard/lte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!--Data 1  -->
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



        <!--Delete Multiple Select-->
        <script>
            $(document).ready(function () {
                zebra();

                $('.checkall').on('click', function () {
                    var $this = $(this),
                            // Test to see if it is checked
                            checked = $this.prop('checked'),
                            //Find all the checkboxes
                            cbs = $this.closest('table').children('tbody').find('.checkbox');
                    // Check or Uncheck them.
                    cbs.prop('checked', checked);
                    //toggle the selected class to all the trs
                    cbs.closest('tr').toggleClass('selected', checked);
                });
                //$('tbody tr').on('click', function () 
                 $('tbody tr .checkbox').on('click', function (){ //แก้ไขโดยแบงค์ วิทยานิพนธ์ แท่นทอง เพื่อไม่ให้ คลิกตารางแล้วเกิด checkbox
                    var $this = $(this).toggleClass('selected');
                    $this.find('.checkbox').prop('checked', $this.hasClass('selected'));
                    if (!$this.hasClass('selected')) {
                        $this.closest('table').children('thead').find('.checkall').prop('checked', false);
                    }
                });
                $('.delete_single').on('click', function (e) {
                    e.preventDefault();
                    //Dont let the click bubble up to the tr
                    e.stopPropagation();
                    var $this = $(this),
                            c = confirm('ต้องการลบส่วนที่เลือกใช่หรือไม่?');
                    if (!c) {
                        return false;
                    }
                    $this.closest('tr').fadeOut(function () {
                        $(this).remove();
                        zebra();
                    });
                });
                $('a.deleteall').on('click', function (e) {
                    e.preventDefault();
                    var $this = $(this),
                            $trows = $this.closest('table').children('tbody').find('tr.selected'),
                            sel = !!$trows.length;

                    // Don't confirm delete if no rows selected.
                    if (!sel) {
                        alert('No rows selected');
                        return false;
                    }
                    var c = confirm('ต้องการลบส่วนที่เลือกใช่หรือไม่'); //Are you sure you want to delete the slected rows?
                    if (!c) {
                        return false;
                    }
                    $trows.fadeOut(function () {
                        $trows.remove();
                        zebra();
                    });
                });


                //would be better if zebra was done in pure css
                function zebra() {
                    $(".delete_multiple_check_box").find('tbody')
                            .find('.odd').removeClass('odd').end()
                            .find('tr:odd').addClass("odd");
                }
                ;
            });
        </script>




    </body>
</html>

