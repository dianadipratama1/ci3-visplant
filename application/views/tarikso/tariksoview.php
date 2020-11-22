  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
  <?php $this->load->view('tarikso/bctarikso');?>  
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Form Tarik Data SO</header>
          <div class="panel-body">
            <form role="form">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Kode SO</label>
                  <input type="text" class="form-control" id="kodeso" name="kodeso" placeholder="Masukkan Kode SO" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>
                
                <div class="form-group">
                  <a class="btn btn-success" onclick='cariso()'>Tarik Data SO</a>
                  <a class='btn btn-warning' onclick='ceksonewtab()'>Check SO</a>
                </div>
              </div>
            </form>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th> 
                  <th>Tgl Batas</th>
                  <th>Nomor JO</th>
                  <th>Nomor SO</th>
                  <th>Lokasi</th>
                  <th>Nomor SO Lama</th>
                  <th>Harga Satuan</th>
                  <th>Kode Barang</th>
                  <!--th>Alamat</th-->
                  <th>Nama Project</th>
                  <th>Nama Barang</th>
                  <th>Jml SO</th>
                  <th>Tgl SO</th>
                  <th>Kopel</th>
                  <th>Jml SO Asli</th>
                  <th>Nama Pelanggan</th>
                  <!-- <th>Kota</th>
                  <th>sts</th>-->
                  <th>Action</th>
                </tr>
              </thead>
                  
              <tbody id="realisasi2">   
              </tbody>
            </table>
          </div>
        </section>

        <section class="panel">
          <header class="panel-heading">Tabel Data SO</header>
          <div class="panel-body">
            <table class="table table-striped table-hover" cellspacing="0" width="100%" id="mydataso">
              <!-- <input type="text" class="form-control" id="myInput" name="kodeso" placeholder="Search Data SO" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" style="width: 500px;"> -->
              <thead>
                <tr>
                  <th>No</th> 
                  <th>Tgl Batas</th>
                  <th>Nomor JO</th>
                  <th>Nomor SO</th>
                  <th>Lokasi</th>
                  <th>Nomor SO Lama</th>
                  <th>Harga Satuan</th>
                  <th>Kode Barang</th>
                  <th>Nama Project</th>
                  <th>Nama Barang</th>
                  <th>Jml SO</th>
                  <th>Tgl SO</th>
                  <th>Kopel</th>
                  <th>Jml SO Asli</th>
                  <th>Nama Pelanggan</th>
                  <!-- <th>Alamat</th> -->
                  <!-- <th>Kota</th>
                  <th>sts</th> -->
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

        tabel = $('#mydataso').DataTable({ 
          "processing": true,
          "serverSide": true,
          "ordering": true,
          // "lengthChange": false,
          "order": [[ 1, 'desc' ]],
          "ajax":{
                  "url": "<?php echo base_url('Tarikso/view') ?>",
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
                      { "data": "tglbatas" },
                      { "data": "nomorjo" },
                      { "data": "nomorso" },
                      { "data": "lokasi" },
                      { "data": "nomorsolm" },
                      { "data": "harsat" },
                      { "data": "kobar" },
                      { "data": "nmproyek" },
                      { "data": "nabar" },
                      { "data": "jmlso" },
                      { "data": "tglso" },
                      { "data": "kopel" },
                      { "data": "jmlsoasl" },
                      { "data": "napel" },
                      // { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                      //               var html  = "<button type='button' class='btn btn-warning btn-sm btn-xs update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-nomorpo='"+row.nomorpo+"' data-jum_real='"+row.jum_real+"' data-kopel='"+row.kopel+"' data-tanggal='"+row.tanggal+"' data-nomorpolm='"+row.nomorpolm+"' data-namapel='"+row.namapel+"' data-harsat='"+row.harsat+"' data-kobar='"+row.kobar+"' data-nabar='"+row.nabar+"' data-jumlah='"+row.jumlah+"' data-ind_kopel='"+row.ind_kopel+"' data-IDno_po='"+row.IDno_po+"'>EDIT</button>"+" "+"<a href='javascript:void(0);' class='btn btn-danger btn-sm btn-xs delete' data-IDno_po='"+row.IDno_po+"'>HAPUS</a>"
                      //               return html
                      //             } 
                      // },
                      { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                                    var html  = "<a href='javascript:void(0);' class='btn btn-danger btn-sm delete' data-IDopj='"+row.IDopj+"'>HAPUS</a>"
                                    return html
                                  } 
                      },
                    ],
        });


        $(document).on("click",".delete",function(){
          var x = confirm("Yakin Akan Hapus Data Ini?");
          if (x==true) {
            var $ele = $(this).parent().parent();
            $.ajax({
              url:"<?php echo base_url("Tarikso/deleterecords");?>",
              type: "POST",
              cache: false,
              data:{
                      type:2,
                      IDopj:$(this).attr("data-IDopj")
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

        //Search Filter Table Jquery
      //   $("#myInput").on("keyup", function(){
      //     var value = $(this).val().toLowerCase();
      //     $("#table tr").filter(function(){
      //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      //     });
      //   });//end search  
      });
      

      function cariso(){
        var kodeso = document.getElementById('kodeso').value;
        if (kodeso=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          xajax_cariso(document.getElementById('kodeso').value); 
          alert('Yakin Sudah Benar Nomor SO '+kodeso+' Ini ?');
        }
      }

      function simpanso(kodeso,noindex){
        xajax_simpanso(kodeso,noindex);
        tabel.ajax.reload();
      }

      $("#kodeso").keypress(function(e) {
        if(e.which == 13) {
          e.preventDefault();
          cariso();
        }
      });

      function ceksonewtab(){
        var kodeso = document.getElementById('kodeso').value;
        if (kodeso=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          var win = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataBSP&SO_Number='+kodeso+'','DIAN ADI PRATAMA','height=728, width=1244, scrollbar=yes');//open new window
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
          alert(message);
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