  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebaradmin');?>
  <?php $this->load->view('tarikpo/bctarikpo');?>  
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Form Tarik Data PO</header>
        <div class="panel-body">
          <form role="form">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Kode PO</label>
                <input type="text" class="form-control" id="kodepo" name="kodepo" placeholder="Masukkan Kode PO" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
              </div>
                
              <div class="form-group">
                <a class="btn btn-primary" onclick='caripo()'>Tarik Data PO</a>
                <!-- <a href="#modal-fullscreen" data-toggle="modal" class="btn btn-primary">List Data SO</a> -->
                <a class='btn btn-warning' onclick='cekponewtab()'>Check PO</a>
              </div>
            </div>
          </form>

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th> 
                <th>Nomor PO</th>
                <th>Jumlah Real</th>
                <th>Kopel</th>
                <th>Tanggal</th>
                <th>Nomor PO Lama</th>
                <th>Nama Pelanggan</th>
                <th>Harga Satuan</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah PO</th>
                <th>Index Kopel</th>
                <th>Action</th>
              </tr>
            </thead>
                  
            <tbody id="realisasipo">   
            </tbody>
          </table>
        </div>
      </section>

      <section class="panel">
        <header class="panel-heading">Tabel Data PO</header>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="mydatapo" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <!-- <th>ID</th>  -->
                <th>Nomor PO</th>
                <th>Jumlah Real</th>
                <th>Kopel</th>
                <th>Tanggal</th>
                <th>Nomor PO Lama</th>
                <th>Nama Pelanggan</th>
                <th>Harga Satuan</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah PO</th>
                <th>Index Kopel</th>
                <th>Action</th>
               <!--  <th></th> -->
              </tr>
            </thead>       
            <!-- <tbody id="showdatanopo"> -->
            <tbody>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Modal Edit -->
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
             <!--  <div class="row">
                <div class="col-md-2"> -->
                  <!-- <label>ID</label>
                </div> -->
              <!--   <div class="col-md-4">
                  <input type="hidden" name="IDno_poedit" id="IDno_poedit" placeholder="IDno_po" class="form-control" autocomplete="off">
                </div>
              </div> -->

              <div class="row">
                <div class="col-md-2">
                  <label>Nomor PO</label>
                </div>

                <div class="col-md-4">
                  <input type="text" name="nomorpoedit" id="nomorpoedit" class="form-control" autocomplete="off" placeholder="Nomor PO" onkeyup="this.value = this.value.toUpperCase()">
                </div>

                <div class="col-md-2">
                  <label>Jumlah Realisasi</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="jum_realedit" id="jum_realedit" placeholder="Jumlah Realisasi" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Kode Pelanggan</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="kopeledit" id="kopeledit" placeholder="Kode Pelanggan" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div> 
                
                <div class="col-md-2">
                  <label>Tanggal</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="tanggaledit" id="tanggaledit" placeholder="Tanggal" class="input-tanggal form-control" autocomplete="off">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Nomor PO Lama</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="nomorpolmedit" id="nomorpolmedit" placeholder="Nomor PO Lama" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div> 
                
                <div class="col-md-2">
                  <label>Nama Pelanggan</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="namapeledit" id="namapeledit" placeholder="Nama Pelanggan" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Harga Satuan</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="harsatedit" id="harsatedit" placeholder="Harga Satuan" class="form-control" autocomplete="off">
                </div> 
                
                <div class="col-md-2">
                  <label>Kode Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="kobaredit" id="kobaredit" placeholder="Kode Barang" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Jumlah PO</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="jumlahedit" id="jumlahedit" placeholder="Jumlah PO" class="form-control" autocomplete="off">
                </div>

                <div class="col-md-2">
                  <label>Nama Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="nabaredit" id="nabaredit" placeholder="Nama Barang" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Index Kode Pelanggan</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ind_kopeledit" id="ind_kopeledit" placeholder="Index Kode Pelanggan" class="form-control" autocomplete="off">
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
      <!--End Modal Edit-->
    </div>
  </div>    

  <script type="text/javascript">
    var tabel=null;
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
      tabel = $('#mydatapo').DataTable({ 
        "processing": true,
        "serverSide": true,
        "ordering": true,
        // "lengthChange": false,
        "order": [[ 1, 'desc' ]],
        "ajax":{
                "url": "<?php echo base_url('Tarikpoadmin/view') ?>",
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
                    { "data": "nomorpo" },
                    { "data": "jum_real" },
                    { "data": "kopel" },
                    { "data": "tanggal" },
                    { "data": "nomorpolm" },
                    { "data": "namapel" },
                    { "data": "harsat" },
                    { "data": "kobar" },
                    { "data": "nabar" },
                    { "data": "jumlah" },
                    { "data": "ind_kopel" },
                    { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                                  var html  = "<button type='button' class='btn btn-warning btn-sm update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-nomorpo='"+row.nomorpo+"' data-jum_real='"+row.jum_real+"' data-kopel='"+row.kopel+"' data-tanggal='"+row.tanggal+"' data-nomorpolm='"+row.nomorpolm+"' data-namapel='"+row.namapel+"' data-harsat='"+row.harsat+"' data-kobar='"+row.kobar+"' data-nabar='"+row.nabar+"' data-jumlah='"+row.jumlah+"' data-ind_kopel='"+row.ind_kopel+"' data-IDno_po='"+row.IDno_po+"'>EDIT</button>"+" "+"<a href='javascript:void(0);' class='btn btn-danger btn-sm delete' data-IDno_po='"+row.IDno_po+"'>HAPUS</a>"
                                  return html
                                } 
                    },
                    // { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                    //               var html  = "<a href='javascript:void(0);' class='btn btn-danger btn-sm delete' data-IDno_po='"+row.IDno_po+"'>HAPUS</a>"
                    //               return html
                    //             } 
                    // },
                  ],
      });
      //end init
      //ajax delete
      $(document).on("click",".delete",function(){
        var x = confirm("Yakin Akan Hapus Data Ini?");
        if(x==true){
          var $ele = $(this).parent().parent();
          $.ajax({
                    url:"<?php echo base_url("Tarikpoadmin/deleterecords");?>",
                    type: "POST",
                    cache: false,
                    data:{
                            type:2,
                            IDno_po:$(this).attr("data-IDno_po")
                          },
                    success:function(dataResult){
                      // alert(dataResult);
                      var dataResult = JSON.parse(dataResult);
                      if(dataResult.statusCode==200){
                        $ele.fadeOut().remove();
                      }
                    }
          });
          tabel.ajax.reload();
        }else{
          return false;
          //else
        } 
      });
      //end ajax delete
      //view edit
      $(function(){
        $('#formedit').on('show.bs.modal',function(event){
          var button = $(event.relatedTarget);
            var IDno_po   = button.data('IDno_po');
            var nomorpo   = button.data('nomorpo');
            var jum_real  = button.data('jum_real');
            var kopel     = button.data('kopel');
            var tanggal   = button.data('tanggal');
            var nomorpolm = button.data('nomorpolm');
            var namapel   = button.data('namapel');
            var harsat    = button.data('harsat');
            var kobar     = button.data('kobar');
            var nabar     = button.data('nabar');
            var jumlah    = button.data('jumlah');
            var ind_kopel = button.data('ind_kopel');
          var modal=$(this);
            modal.find('#IDno_poedit').val(IDno_po);
            modal.find('#nomorpoedit').val(nomorpo);
            modal.find('#jum_realedit').val(jum_real);
            modal.find('#kopeledit').val(kopel);
            modal.find('#tanggaledit').val(tanggal);
            modal.find('#nomorpolmedit').val(nomorpolm);
            modal.find('#namapeledit').val(namapel);
            modal.find('#harsatedit').val(harsat);
            modal.find('#kobaredit').val(kobar);
            modal.find('#nabaredit').val(nabar);
            modal.find('#jumlahedit').val(jumlah);
            modal.find('#ind_kopeledit').val(ind_kopel);
        });
      });
      //startt update
      $(document).on('click','#updatedata',function(){
        $.ajax({
                  url : "<?php echo base_url('Tarikpoadmin/updaterecords');?>",
                  type : "POST",
                  cache: false,
                  data : { 
                            type: 3,
                            IDno_po: $('#IDno_poedit').val(),
                            nomorpo: $('#nomorpoedit').val(),
                            jum_real: $('#jum_realedit').val(),
                            kopel: $('#kopeledit').val(),
                            tanggal: $('#tanggaledit').val(),
                            nomorpolm: $('#nomorpolmedit').val(),
                            namapel: $('#namapeledit').val(),
                            harsat: $('#harsatedit').val(),
                            kobar: $('#kobaredit').val(),
                            nabar: $('#nabaredit').val(),
                            jumlah: $('#jumlahedit').val(),
                            ind_kopel: $('#ind_kopeledit').val(),
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

      $('.input-tanggal').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true
      });
    });
    //xajax function caripo
    function caripo(){
      var kodepo = document.getElementById('kodepo').value;
      if (kodepo==""){
        alert('Harap Isi Data Terlebih Dahulu !');
      }else{
        xajax_caripo(document.getElementById('kodepo').value); 
        alert('Yakin Sudah Benar Nomor PO '+kodepo+' Ini ?');
      }
    }
    //end xajax function caripo
    //xajax function simpanpo
    function simpanpo(kodepo,noindex){
      xajax_simpanpo(kodepo,noindex);
      tabel.ajax.reload();
    }
    //end xajax function simpanpo
    //jquery onkeypress enter 
    $("#kodepo").keypress(function(e) {
        if(e.which == 13) {
          e.preventDefault();
          caripo();
        }
    });
    //end jquery onkeypress enter
    //jquery onclick cekpo
    function cekponewtab(){
        var kodepo = document.getElementById('kodepo').value;
        if (kodepo=="") {
          alert('Harap Isi Data Terlebih Dahulu !');
        }else{
          var win = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataJT&PO_Number='+kodepo+'','DIAN ADI PRATAMA','height=728, width=1244, scrollbar=yes');//open new window
          // var win = window.open('https://vub.dataon.com:8074/vuberpnew/erp/eaccounting/tools/api/sfservice.cfc?method=getDataBSP&SO_Number='+kodeso+'','DIAN ADI PRATAMA');
          win.focus();
        }
    }
    //end jquery onkeypress
    //funnction input hanya angka
    function hanyaAngka(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        alert('Harap Isi Dengan Angka');
        return false;
      }else{
        return true;
      }
    }
    //end function input hanya angka
  </script>
  <?php $this->load->view('partial/footer');?>