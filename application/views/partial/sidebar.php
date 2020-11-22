			<aside>
      	<div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <?php if($this->session->userdata('level')==='1'):?>
              <li class="active">
                <?php if($this->session->userdata('level')==='1'):?>
                  <a class="" href="<?php echo base_url('utama');?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                  </a>
                  <?php elseif($this->session->userdata('level')==='2'):?>
                    <a class="" href="<?php echo base_url('utama/staff');?>">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                    </a>
                    <?php elseif($this->session->userdata('level')==='3'):?>
                      <a class="" href="<?php echo base_url('utama/author');?>">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                      </a>
                    <?php else:?>
                <?php endif;?>
              </li>  
           
            	<li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_document_alt"></i>
                  <span>Penarikan Data</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
              
                <ul class="sub">
                  <li><a class="" href="<?php echo base_url('Tariksoadmin');?>">Tarik Data SO Baru</a></li>
                  <li><a class="" href="<?php echo base_url('Tarikpoadmin');?>">Tarik Data PO Baru</a></li>
                  <li><a class="" href="<?php echo base_url('Tariksopiradmin');?>">Tarik Data Sopir</a></li>
                  <li><a class="" href="<?php echo base_url('Tariktmadmin');?>">Tarik Data TM</a></li>
                </ul>
              </li>
            
              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_desktop"></i>
                  <span>Input Data</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="<?php echo base_url('inputsp2');?>">SP2</a></li>
                  <li><a class="" href="<?php echo base_url('Jobmix');?>">Jobmix</a></li>
                </ul>
              </li>

               <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_genius"></i>
                  <span>Setting</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="<?php echo base_url('settingkobar');?>">Setting Kobar</a></li>
                </ul>
              </li>

              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_table"></i>
                  <span>Laporan</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="basic_table.html">Rekap RR</a></li>
                  <li><a class="" href="basic_table.html">Status Batching</a></li>
                  <li><a class="" href="basic_table.html">Cek SA</a></li>
                  <li><a class="" href="basic_table.html">Realisasi VS SP2</a></li>
                  <li class="sub-menu">
                    <a href="javascript:;" class="">
                      <!-- <i class="icon_desktop"></i> -->
                      <span>Issue Ticket</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                    </a>

                    <ul class="sub">
                      <li><a class="" href="<?php echo base_url('isuetiketharian');?>">Harian</a></li>
                      <li><a class="" href="<?php echo base_url('isuetiketexternal');?>">External</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            <?php elseif($this->session->userdata('level')==='2'):?>
              <li class="active">
                <?php if($this->session->userdata('level')==='1'):?>
                  <a class="" href="<?php echo base_url('utama');?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                  </a>
                  <?php elseif($this->session->userdata('level')==='2'):?>
                    <a class="" href="<?php echo base_url('utama/staff');?>">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                    </a>
                    <?php elseif($this->session->userdata('level')==='3'):?>
                      <a class="" href="<?php echo base_url('utama/author');?>">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                      </a>
                    <?php else:?>
                <?php endif;?>
              </li>
           
              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_document_alt"></i>
                  <span>Penarikan Data</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
              
                <ul class="sub">
                  <li><a class="" href="<?php echo base_url('Tarikso');?>">Tarik Data SO Baru</a></li>
                  <li><a class="" href="<?php echo base_url('Tarikpo');?>">Tarik Data PO Baru</a></li>
                  <li><a class="" href="<?php echo base_url('Tariksopir');?>">Tarik Data Sopir</a></li>
                  <li><a class="" href="<?php echo base_url('Tariktm');?>">Tarik Data TM</a></li>
                </ul>
              </li>
            
              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_desktop"></i>
                  <span>Input Data</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="<?php echo base_url('Jobmix');?>">Jobmix</a></li>
                  <li><a class="" href="<?php echo base_url('Inputsp2');?>">SP2</a></li>
                  <li><a class="" href="<?php echo base_url('Injeksi');?>">Injeksi Data VIS</a></li>
                </ul>
              </li>

               <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_genius"></i>
                  <span>Setting</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="<?php echo base_url('Setkobar');?>">Setting Kobar</a></li>
                </ul>
              </li>

              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_table"></i>
                  <span>Laporan</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="basic_table.html">Rekap RR</a></li>
                  <li><a class="" href="basic_table.html">Status Batching</a></li>
                  <li><a class="" href="basic_table.html">Cek SA</a></li>
                  <li><a class="" href="basic_table.html">Realisasi VS SP2</a></li>
                  <li class="sub-menu">
                    <a href="javascript:;" class="">
                      <!-- <i class="icon_desktop"></i> -->
                      <span>Issue Ticket</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                    </a>

                    <ul class="sub">
                      <li><a class="" href="<?php echo base_url('isuetiketharian');?>">Harian</a></li>
                      <li><a class="" href="<?php echo base_url('isuetiketexternal');?>">External</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            <?php elseif($this->session->userdata('level')==='3'):?>
              <li class="active">
                <?php if($this->session->userdata('level')==='1'):?>
                  <a class="" href="<?php echo base_url('utama');?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                  </a>
                  <?php elseif($this->session->userdata('level')==='2'):?>
                    <a class="" href="<?php echo base_url('utama/staff');?>">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                    </a>
                    <?php elseif($this->session->userdata('level')==='3'):?>
                      <?php if($this->session->userdata('level')==='1'):?>
                  <a class="" href="<?php echo base_url('utama');?>">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                  </a>
                  <?php elseif($this->session->userdata('level')==='2'):?>
                    <a class="" href="<?php echo base_url('utama/staff');?>">
                      <i class="icon_house_alt"></i>
                      <span>Dashboard</span>
                    </a>
                    <?php elseif($this->session->userdata('level')==='3'):?>
                      <a class="" href="<?php echo base_url('utama/author');?>">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                      </a>
                    <?php else:?>
                <?php endif;?>
                    <?php else:?>
                <?php endif;?>
              </li>

              <li class="sub-menu">
                <a href="javascript:;" class="">
                  <i class="icon_table"></i>
                  <span>Laporan</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                
                <ul class="sub">
                  <li><a class="" href="basic_table.html">Rekap RR</a></li>
                  <li><a class="" href="basic_table.html">Status Batching</a></li>
                  <li><a class="" href="basic_table.html">Cek SA</a></li>
                  <li><a class="" href="basic_table.html">Realisasi VS SP2</a></li>
                  <li class="sub-menu">
                    <a href="javascript:;" class="">
                      <!-- <i class="icon_desktop"></i> -->
                      <span>Issue Ticket</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                    </a>

                    <ul class="sub">
                      <li><a class="" href="<?php echo base_url('isuetiketharian');?>">Harian</a></li>
                      <li><a class="" href="<?php echo base_url('isuetiketexternal');?>">External</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            <?php else:?>
              <li class="active">
                <a class="" href="<?php echo base_url('Login');?>">
                  <i class="icon_key_alt"></i>
                  <span style="color: red;">Session Telah Habis Silahkan Login Kembali</span>
                </a>
              </li>
              <!-- <?php //$this->load->view('login/loginview');?> -->
            <?php endif;?>
          </ul><!-- sidebar menu end-->
        </div>
      </aside>