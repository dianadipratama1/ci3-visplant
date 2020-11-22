<html>
    <head>
        <title>VISPLANT BSP</title>
        <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css')?>">
        <link rel="shortcut icon" href="<?php echo base_url('asset/img/logoheadervub.png');?>"/>
        <style>
            .form-signin{
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading, .form-signin .checkbox{
                margin-bottom: 10px;
            }
            .form-signin .checkbox{
                font-weight: normal;
            }
            .form-signin .form-control{
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .form-signin .form-control:focus{
                z-index: 2;
            }
            .form-signin input[type="text"]{
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }
            .form-signin input[type="password"]{
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
            .account-wall{
                margin-top: 20px;
                padding: 40px 0px 20px 0px;
                background-color: #f7f7f7;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            }
            .login-title{
                color: #555;
                font-size: 18px;
                font-weight: 400;
                display: block;
            }
            .profile-img{
                width: 96px;
                height: 96px;
                margin: 0 auto 10px;
                display: block;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
            }
            .need-help{
                margin-top: 10px;
            }
            .new-account{
                display: block;
                margin-top: 10px;
            }
        </style>
    </head>
  
    <body>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">LOGIN VISPLANT</h1>
                    <h6 class="text-center"> <font color="red"><?php echo $this->session->flashdata('msg');?></font></h6>
                    <div class="account-wall">
                        <div id="form-login">
                            <form class="form-signin" method="POST" action="<?php echo base_url('Login/auth')?>">
                                <img class="profile-img" src="<?php echo base_url('asset/img/iconlogin1.png');?>" alt="">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" autocomplete="off" autofocus>
                                </div>
                                    
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control inputan" placeholder="Masukkan Password Anda" autocomplete="off">
                                </div>

                                 <div class="form-group">
                                   <br>
                                </div>

                                <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="remember-me"> Remember me
                                    </label>
                                </div> -->

                                <button class="btn btn-lg btn-primary btn-block" name="login" id="login" type="submit" value="Login">Masuk</button>
                            </form>
                        </div>    
                    </div>
                    <!-- <a href="#" class="text-center new-account">Buat Akun </a> -->
                    <!-- <div id="error" style="margin-top: 10px"></div> -->
                </div>
                <div class="col-sm-8 col-md-6 col-md-offset-3">     
                    Copyright - Varia Usaha Beton Information System Plant BSP - Powered by © TIK 2020
                </div>
            </div>
        </div>
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
        <script src="<?php echo base_url('asset/js/jquery.js')?>"/></script>
        <script src="<?php echo base_url('asset/js/jquery-ui-1.10.4.min.js')?>"/></script>
        <script src="<?php echo base_url('asset/js/jquery-1.8.3.min.js')?>"/></script>
        <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-ui-1.9.2.custom.min.js')?>"/></script>
        <!-- bootstrap -->
        <script src="<?php echo base_url('asset/js/bootstrap.min.js')?>"/></script>
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
    </body>
</html>