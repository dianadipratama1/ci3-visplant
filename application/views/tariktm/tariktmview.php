  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
  <?php $this->load->view('tariktm/bctariktm');?>  
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Form Tarik Data TM</header>
          <div class="panel-body">
            <div class="col-lg-2">
              <label><input type="radio" name="colorRadio" value="notm">Kode No TM</label>
            </div>
            <div class="col-lg-2">
              <label><input type="radio" name="colorRadio" value="noaset">Kode Asset TM</label>
              <!-- <label><input type="radio" name="colorRadio" value="blue"> blue</label> -->
            </div>

            <div class="notm box">
              <div class="form-group">
                <input type="text" class="form-control" id="kodetm" name="kodetm" placeholder="Masukkan Kode No TM Dengan Lengkap" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
              </div>
              
              <div class="form-group">
                  <a class="btn btn-default" onclick='caritm()'>Tarik Data TM</a>
                  <a class='btn btn-warning' onclick='cektmnewtab()'>Check Data TM</a>
              </div>

              <div class="form-group">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Serial</th> 
                      <th>Nomor TM</th>
                      <th>Deskripsi Aset</th>
                      <th>Nomor Polisi</th>
                      <th>Kode Aset</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                            
                  <tbody id="realisasitm">   
                  </tbody>
                </table>
              </div>
            </div>

            <div class="noaset box">
              <div class="form-group">
                <input type="text" class="form-control" id="kodeaset" name="kodeaset" placeholder="Masukkan Kode Asset TM  Dengan Lengkap" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
              </div>
              
              <div class="form-group">
                  <a class="btn btn-info" onclick='cariaset();'>Tarik Data Asset</a>
                  <a class='btn btn-warning' onclick='cekasetnewtab();'>Check Data Asset</a>
              </div>

               <div class="form-group">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Serial</th> 
                      <th>Nomor TM</th>
                      <th>Deskripsi Aset</th>
                      <th>Nomor Polisi</th>
                      <th>Kode Aset</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                            
                  <tbody id="realaset">   
                  </tbody>
                </table>
              </div>
            </div>
<!-- 
            <div class="abu2 box">
          
        </div> -->

            <!-- <div class="blue box">You have selected <strong>blue radio button</strong> so i am here</div> -->
          </div>
        </section>

        <section class="panel">
          <header class="panel-heading">Tabel Data SO</header>
          <div class="panel-body">
            <table class="table table-striped table-hover" cellspacing="0" width="100%" id="mydatatm">
              <thead>
                <tr>
                  <th>No</th> 
                  <th>Kode Aset</th>
                  <th>Nomor TM</th>
                  <th>Nomor Polisi</th>
                  <th>No Index</th>
                  <th>Berat</th>
                  <th>Action</th>
                </tr>
              </thead>
                  
              <tbody>
              </tbody>
            </table>
            <!-- <div align="right" id="pagination_link"></div>
            <div class="table-responsive" id="country_table"></div> -->
          </div>
        </section>
      </div>
    </div>

    <style>
        .box{
            color: #fff;
            padding: 20px;
            display: none;
            margin-top: 20px;
            font-color: rgb(123, 24, 22);
        }
        .red{ background: #ff0000; }
        .notm{ background: #FFFFFF; }
        .noaset{ background: #FFFFFF; }
        .green{ background: #228B22; }
        .blue{ background: #0000ff; }
    </style>    

    <script type="text/javascript">
      var tabel=null;
      $(document).ready(function(){
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings){
          return{
                  "iStart": oSettings._iDisplayStart,
                  "iEnd": oSettings.fnDisplayEnd(),
                  "iLength": oSettings._iDisplayLength,
                  "iTotal": oSettings.fnRecordsTotal(),
                  "iFilteredTotal": oSettings.fnRecordsDisplay(),
                  "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                  "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
        };

        tabel = $('#mydatatm').DataTable({ 
          "processing": true,
          "serverSide": true,
          "ordering": true,
          // "lengthChange": false,
          "order": [[ 1, 'desc' ]],
          "ajax":{
                  "url": "<?php echo base_url('Tariktm/view') ?>",
                  "type": "POST"
                  },
          "deferRender": true,
          "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]],
          "rowCallback": function (row, data, iDisplayIndex){
            var info  = this.fnPagingInfo();
            var page  = info.iPage;
            var length= info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
          },
          
          "columns":[
                      { 
                        "data": null,
                        "orderable": false 
                      },
                      // { "data": "IDno_po" },
                      { "data": "kdaset" },
                      { "data": "tm" },
                      { "data": "nopol" },
                      { "data": "noindex" },
                      { "data": "berat" },
                      // { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                      //               var html  = "<button type='button' class='btn btn-warning btn-sm btn-xs update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-nomorpo='"+row.nomorpo+"' data-jum_real='"+row.jum_real+"' data-kopel='"+row.kopel+"' data-tanggal='"+row.tanggal+"' data-nomorpolm='"+row.nomorpolm+"' data-namapel='"+row.namapel+"' data-harsat='"+row.harsat+"' data-kobar='"+row.kobar+"' data-nabar='"+row.nabar+"' data-jumlah='"+row.jumlah+"' data-ind_kopel='"+row.ind_kopel+"' data-IDno_po='"+row.IDno_po+"'>EDIT</button>"+" "+"<a href='javascript:void(0);' class='btn btn-danger btn-sm btn-xs delete' data-IDno_po='"+row.IDno_po+"'>HAPUS</a>"
                      //               return html
                      //             } 
                      // },
                      { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                                    var html  = "<a href='javascript:void(0);' class='btn btn-danger btn-sm delete' data-IDtm='"+row.IDtm+"'>HAPUS</a>"
                                    return html
                                  } 
                      },
                    ],
        });

        $('input[type="radio"]').click(function(){
          var inputValue = $(this).attr("value");
          var targetBox = $("." + inputValue);
          $(".box").not(targetBox).hide();
          $(targetBox).show();
        });


        $(document).on("click",".delete",function(){
          var x = confirm("Yakin Akan Hapus Data Ini?");
          if (x==true) {
            var $ele = $(this).parent().parent();
            $.ajax({
              url:"<?php echo base_url("Tariktm/deleterecords");?>",
              type: "POST",
              cache: false,
              data:{
                      type:2,
                      IDtm:$(this).attr("data-IDtm")
                    },
              success:function(dataResult){
              // alert(dataResult);
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode==200){
                  $ele.fadeOut().remove();
                }
                tabel.ajax.reload();
              }
            });
          }else{
            return false;
          } 
        });   
      });
      

      function caritm(){
        var kodetm = document.getElementById('kodetm').value;
        if (kodetm=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          xajax_caritm(document.getElementById('kodetm').value); 
          alert('Yakin Sudah Benar Nomor TM '+kodetm+' Ini ?');
        }
      }

      function cariaset(){
        var kodeaset = document.getElementById('kodeaset').value;
        if (kodeaset=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          xajax_cariaset(document.getElementById('kodeaset').value); 
          alert('Yakin Sudah Benar Nomor Aset '+kodeaset+' Ini ?');
        }
      }

      function simpantm(kodetm,noindex){
        xajax_simpantm(kodetm,noindex);
        tabel.ajax.reload();
      }

      function simpanaset(kodeaset,noindex){
        xajax_simpanaset(kodeaset,noindex);
        tabel.ajax.reload();
      }

      $("#kodetm").keypress(function(e) {
        if(e.which == 13) {
          e.preventDefault();
          caritm();
        }
      });

      function cektmnewtab(){
        var kodetm = document.getElementById('kodetm').value;
        if (kodetm=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          var cektm = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&TM_Number='+kodetm+'','DIAN ADI PRATAMA','height=728, width=1244, scrollbar=yes');//open new window
          // var cektm = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&TM_Number='+kodetm+'','DIAN ADI PRATAMA');
          cektm.focus();
        }
      }

      function cekasetnewtab(){
        var kodeaset = document.getElementById('kodeaset').value;
        if (kodeaset=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          var win = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataVehicle&Asset_Code='+kodeaset+'','DIAN ADI PRATAMA','height=728, width=1244, scrollbar=yes');//open new window
          // var win = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataBSP&SO_Number='+kodeso+'','DIAN ADI PRATAMA');
          win.focus();
        }
      }

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