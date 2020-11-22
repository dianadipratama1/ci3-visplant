<?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebaradmin');?>
    <?php $this->load->view('partial/bcdashboard');?>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box blue-bg">
                <div class="count"><?php echo $totalso ?></div>
                <div class="title">Total Data SO</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box brown-bg">
                <div class="count"><?php echo $totalpo ?></div>
                <div class="title">Total Data PO</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box dark-bg">
                <div class="count"><?php echo $totalsopir ?></div>
                <div class="title">Total Data Sopir</div>                
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box green-bg">
                <div class="count"><?php echo $totaltm ?></div>
                <div class="title">Total Data Truck Mixer</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box red-bg">
                <div class="count">
                  <?php echo $totalsp2 ?>
                   <!-- <i class="fa fa"></i> -->
                </div>
                <div class="title">SP2</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box brown-bg">
                <div class="count">
                  <?php echo $totaljobmix ?>
                  <i class="fa fa-cubes"></i>
                </div>
                <div class="title">Jobmix</div>
              </div><!--/.info-box-->
            </div><!--/.col-->
          </div><!--/.row--><br><br>
          <?php $this->load->view('partial/footer');?>