

    <!-- Logo -->
    <a style="background-color: #03A9F4;"  href="<?php echo base_url()?>index.php/main_panel" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span style="background-color: #03A9F4;font-size: 15px;" class="logo-mini"><b>G.ACC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span style="background-color: #03A9F4;" class="logo-lg"><b>GOLD.ACCOUNT</b></span>
    </a>

    <!-- Header Navbar -->
    <nav style="background-color: #03A9F4;" class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a style="background-color: #03A9F4;" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
            <!--เขียนข้อความ-->
          <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-flag-o"></i></a>
              
              <!--dropdown-->
                <ul class="dropdown-menu">
                <li class="header">เตือนความจำ</li>
              <li>
                <!-- inner menu: contains the actual data -->
                ส่วนนี้อยู่ระหว่างพัฒนา... 
              </li>
              <li class="footer">ส่วงล่าง</li>
              
            </ul>
              <!--dropdown-->
          </li>
          
          
          <!--/.เขียนข้อความ--> 
            
           
          <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a  href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success"></span> <!--จำนวนข้อความ-->
                </a>
                <ul class="dropdown-menu">
                    <li class="header">ข้อความ</li>
                    <li style="margin-top: 5px; margin-bottom: 5px">
                        <!-- inner menu: contains the actual data -->
                        ส่วนนี้อยู่ระหว่างพัฒนา...
                    </li>
                    <hr style="margin-top: 5px; margin-bottom: 5px">
                    <li> <!--เลือกลูกค้า-->
                       
                    
                    </li>
                    <li class="footer"><a href="#">ดูข้อความทั้งหมด</a></li>

                </ul>
            </li>
            <!-- /.messages-menu -->





         
          
          
          
          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url().$this->session->userdata('em_photo');?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('em_name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header" style="background-color: #03A9F4;">
                  <img src="<?php echo base_url().$this->session->userdata('em_photo');?>" class="img-circle" alt="User Image">

                <p>
                     ตำแหน่ง <?php echo $this->session->userdata('em_role');?>
                  <small>เริ่มทำงาน <?php echo $this->session->userdata('em_start');?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="<?php echo base_url();?>index.php/main_data/profile" class="btn btn-default btn-flat">โปรไฟล์</a>
                </div>
                <div class="pull-right">
                    <a href="<?php echo base_url()?>index.php/login/sigout" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
              </li> 
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          

        </ul>
      </div>
      
     
      
      
      
    </nav>
 