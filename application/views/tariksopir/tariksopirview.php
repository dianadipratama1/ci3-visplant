  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
  <?php $this->load->view('tariksopir/bctariksopir');?>  
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Form Tarik Data Sopir</header>
        <div class="panel-body">
          <form role="form">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Kode Pegawai</label>
                <input type="text" class="form-control" id="kodepgw" name="kodepgw" placeholder="Masukkan Kode Pegawai" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
              </div>
                
              <div class="form-group">
                <a class="btn btn-warning" onclick='carisopir()'>Tarik Data Sopir</a>
                <a class='btn btn-danger' onclick='ceksopirnewtab()'>Check Sopir</a>
              </div>
            </div>
          </form>

          <table class="table table-striped table-hover" >
            <thead>
              <tr>
                <th>No</th> 
                <th>ID Pegawai</th>
                <th>Nama Sopir</th>
                <th>Action</th>
              </tr>
            </thead>
                  
            <tbody id="realisasisopir">   
            </tbody>
          </table>
        </div>
      </section>

      <section class="panel">
        <header class="panel-heading">Tabel Data Sopir</header>
        <div class="panel-body">
          <table class="table table-striped table-hover" cellspacing="0" width="100%" id="mydatasopir">
            <!-- <input type="text" class="form-control" id="myInput" name="kodeso" placeholder="Search Data SO" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" style="width: 500px;"> -->
            <thead>
              <tr>
                <th>No</th> 
                <!-- <th>ID</th> -->
                <th>No Pegawai</th>
                <th>Nama Sopir</th>
                <th>Kode Sopir</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Action</th>
              </tr>
            </thead>
                  
            <tbody>
            </tbody>
          </table>
        </div>
      </section>

      <div class="modal fade" id="formedit" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" style="color: red;">Edit Data PO</h4>
              <center><font color="red"></font><p id="pesan"></p></center>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-2">
                  <label>ID</label>
                </div>
                <div class="col-md-4">
                  <input type="text" name="idsopiredit" id="idsopiredit" placeholder="ID Sopir" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Nomor Pegawai</label>
                </div>

                <div class="col-md-4">
                  <input type="text" name="nopegedit" id="nopegedit" class="form-control" autocomplete="off" placeholder="Nomor Pegawai" onkeyup="this.value = this.value.toUpperCase()">
                </div>

                <div class="col-md-2">
                  <label>Nama Sopir</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="nm_sopiredit" id="nm_sopiredit" placeholder="Nama Sopir" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Kode Sopir</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="kd_sopiredit" id="kd_sopiredit" placeholder="Kode Sopir" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div> 
                
                <div class="col-md-2">
                  <label>Alamat</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="alamatedit" id="alamatedit" placeholder="Alamat" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Kota</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="kotaedit" id="kotaedit" placeholder="Kota" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div> 
              </div>

              <div class="row">
                <div class="col-md-1">
                  <button type="submit" id="updatedata" class="btn btn-warning">Update</button>
                </div>
                <div class="col-md-1">
                  <button type="button" data-dismiss="modal" id="btn-batal" class="btn btn-danger">Batal</button>
                </div>
              </div> 
            </div>              
          </div>
        </div>
      </div>
    </div>
  </div>    

    <script type="text/javascript">
      $(document).ready(function(){
         //setting datatables 
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
        //end setting datatables
        //init tabel datat dengan datatables
        tabel = $('#mydatasopir').DataTable({ 
          "processing": true,
          "serverSide": true,
          "ordering": true,
          // "lengthChange": false,
          "order": [[ 1, 'desc' ]],
          "ajax":{
                  "url": "<?php echo base_url('Tariksopir/view') ?>",
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
                      // { "data": "IDspr" },
                      { "data": "nopeg" },
                      { "data": "nm_sopir" },
                      { "data": "kd_sopir" },
                      { "data": "alamat" },
                      { "data": "kota" },
                      { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                                    var html  = "<a href='javascript:void(0);' class='btn btn-danger btn-sm delete' data-IDspr='"+row.IDspr+"'>HAPUS</a>"
                                    return html
                                  } 
                      },
                      // { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                      //               var html  = "<button type='button' class='btn btn-warning btn-sm btn-xs update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-nopeg='"+row.nopeg+"' data-nm_sopir='"+row.nm_sopir+"' data-kd_sopir='"+row.kd_sopir+"' data-alamat='"+row.alamat+"' data-kota='"+row.kota+"' data-IDspr='"+row.IDspr+"'>EDIT</button>"+" "+"<a href='javascript:void(0);' class='btn btn-danger btn-sm btn-xs delete' data-IDspr='"+row.IDspr+"'>HAPUS</a>"
                      //               return html
                      //             } 
                      // },
                    ],
        });

        $(document).on("click",".delete",function(){
          var x = confirm("Yakin Akan Hapus Data Ini?");
          if (x==true) {
            var $ele = $(this).parent().parent();
            $.ajax({
              url:"<?php echo base_url("Tariksopir/deleterecords");?>",
              type: "POST",
              cache: false,
              data:{
                      type:2,
                      IDspr:$(this).attr("data-IDspr")
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

        //view edit
      $(function(){
        $('#formedit').on('show.bs.modal',function(event){
          var button  = $(event.relatedTarget);
            var idsopir   = button.data('IDspr');
            var nopeg     = button.data('nopeg');
            var kd_sopir  = button.data('kd_sopir');
            var nm_sopir  = button.data('nm_sopir');
            var alamat    = button.data('alamat');
            var kota      = button.data('kota');
          var modal=$(this);
            modal.find('#idsopiredit').val(idsopir);
            modal.find('#nopegedit').val(nopeg);
            modal.find('#kd_sopiredit').val(kd_sopir);
            modal.find('#nm_sopiredit').val(nm_sopir);
            modal.find('#alamatedit').val(alamat);
            modal.find('#kotaedit').val(kota);
        });
      });
      //startt update
      $(document).on('click','#updatedata',function(){
        $.ajax({
                  url : "<?php echo base_url('Tariksopir/updaterecords');?>",
                  type : "POST",
                  cache: false,
                  data : { 
                            type: 3,
                            IDspr:    $('#idsopiredit').val(),
                            nopeg:    $('#nopegedit').val(),
                            nm_sopir: $('#nm_sopiredit').val(),
                            kd_sopir: $('#kd_sopiredit').val(),
                            alamat:   $('#alamatedit').val(),
                            kota:     $('#kotaedit').val(),
                         },
                  success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode==200){
                      alert('Data updated successfully !');
                      $('#formedit').modal('toggle');
                      tabel.ajax.reload();  
                    }
                  }
        });
        return false;
      });//end update  
      });

      function simpansopir(kodepgw,noindex){
        xajax_simpansopir(kodepgw,noindex);
        tabel.ajax.reload();
      }

      function carisopir(){
        var kodepgw = document.getElementById('kodepgw').value;
        if (kodepgw=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          xajax_carisopir(document.getElementById('kodepgw').value); 
          alert('Yakin Sudah Benar Kode Pegawai '+kodepgw+' Ini ?');
        }
      }

      $("#kodepgw").keypress(function(e) {
        if(e.which == 13) {
          e.preventDefault();
          carisopir();
        }
      });

      function ceksopirnewtab(){
        var kodepgw = document.getElementById('kodepgw').value;
        if (kodepgw=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          var win = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataDriver&EMP_ID='+kodepgw+'','DIAN ADI PRATAMA','height=728, width=1244, scrollbar=yes');//open new window
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