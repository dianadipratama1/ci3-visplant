<?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
    <?php $this->load->view('partial/bcdashboard');?>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box blue-bg">
                <div class="count">
                  <?php echo $totalso ?>
                  <i class="fa fa-laptop"></i>   
                </div>
                <div class="title">Total Data SO</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box brown-bg">
                <div class="count">
                  <?php echo $totalpo ?>
                  <i class="fa fa-shopping-cart"></i>    
                </div>
                <div class="title">Total Data PO</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box dark-bg">
                <div class="count">
                  <?php echo $totalsopir ?>
                  <i class="fa fa-thumbs-o-up"></i>    
                </div>
                <div class="title">Total Data Sopir</div>                
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box green-bg">
                <div class="count">
                  <?php echo $totaltm ?>
                  <i class="fa fa-flag-o"></i>    
                </div>
                <div class="title">Total Data Truck Mixer</div>
              </div><!--/.info-box-->
            </div><!--/.col-->
          </div><!--/.row--><br><br>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box red-bg">
                <div class="count">
                  <?php echo $totalsp2 ?>
                   <i class="fa fa-cloud-download"></i>
                </div>
                <div class="title">Total Data SP2</div>
              </div><!--/.info-box-->
            </div><!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box brown-bg">
                <div class="count">
                  <?php echo $totaljobmix ?>
                  <i class="fa fa-cubes"></i>
                </div>
                <div class="title">Total Data Jobmix</div>
              </div><!--/.info-box-->
            </div><!--/.col-->
          </div>
          <script type="text/javascript">
            //disable ctrl+i / shortcut inspect element
            document.onkeydown = function(e) {
              if(event.keyCode == 123) {
                return false;
              }

              if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
                return false;
              }
              
              if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
                return false;
              }
              
              if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
                return false;
              }
              
              if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
                return false;
              }

            }//end disable ctrl+i / shortcut inspect element

            //disable klik kanan
            var message = "Silahkan Kembali ! Gunakan Fungsi Website Visplant Ini Dengan Sebaik-Baiknya !";

            function clickIE4(){
              if (event.button==2){
                // alert(message);
                return false;
              }
            }

            function clickNS4(e){
              if (document.layers||document.getElementById&&!document.all){
                if (e.which==2||e.which==3){
                  // alert(message);
                  return false;
                }
              }
            }

            if (document.layers){
              document.captureEvents(Event.MOUSEDOWN);
              document.onmousedown=clickNS4;
            }else if (document.all&&!document.getElementById){
              document.onmousedown=clickIE4;
            }

            document.oncontextmenu=new Function("return false");
            //end disable klik kanan
          </script>
          <?php $this->load->view('partial/footer');?>