  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebaradmin');?>
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
                  
              <tbody id="showdatanoso">
              </tbody>
            </table>
            <!-- <div align="right" id="pagination_link"></div>
            <div class="table-responsive" id="country_table"></div> -->
          </div>
        </section>
      </div>
    </div>    

    <script type="text/javascript">
      $(document).ready(function(){
        showdataso();
        function showdataso(){
          $.ajax({
            type: "AJAX",
            url:"<?php echo base_url("Tarikso/nosodata");?>",
            async : true,
            dataType : 'JSON',
            success: function(data){
              var html = '';
              var i;
              for (var i=0; i<data.length; i++) {
                html+='<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        // '<td>'+data[i].IDno_po+'</td>'+
                        '<td>'+data[i].tglbatas+'</td>'+
                        '<td>'+data[i].nomorjo+'</td>'+
                        '<td>'+data[i].nomorso+'</td>'+
                        '<td>'+data[i].lokasi+'</td>'+
                        '<td>'+data[i].nomorsolm+'</td>'+
                        '<td>'+data[i].harsat+'</td>'+
                        '<td>'+data[i].kobar+'</td>'+
                        '<td>'+data[i].nmproyek+'</td>'+
                        '<td>'+data[i].nabar+'</td>'+
                        '<td>'+data[i].jmlso+'</td>'+
                        '<td>'+data[i].tglso+'</td>'+
                        '<td>'+data[i].kopel+'</td>'+
                        '<td>'+data[i].jmlsoasl+'</td>'+
                        '<td>'+data[i].napel+'</td>'+
                        '<td style="text-align:right;">'+
                          '<a href="javascript:void(0);" class="btn btn-danger btn-sm delete" data-IDopj="'+data[i].IDopj+'">Hapus</a>'+
                        '</td>'+
                      '</tr>';
              }
              $('#showdatanoso').html(html);
              $('#mydataso').DataTable();
            }
          });
        }

        // $(".simpanso").click(function(){
        //   $.ajax({
        //     type: "AJAX",
        //     url:"<?php //echo base_url("Tarikso/simpanso");?>",
        //     async : true,
        //     dataType : 'JSON',
        //     success: function(){
        //       showdataso();
        //     }
        //   });
        // });

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
                showdataso();
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
        // showdataso();
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
    </script>

    <?php $this->load->view('partial/footer');?>