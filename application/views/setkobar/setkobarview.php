  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
  <?php $this->load->view('setkobar/bcsetkobar');?>  
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Attention !</header>
        <div class="panel-body">
          <font color="red">Nb : <br></font>
          <font color="blue"><strong>0 = Kondisi Tidak Aktif <br></strong></font> 
          <font color="green"><strong>1 = Kondisi Aktif</strong></font>
        </div>
      </section>
    </div>
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Setting Kobar</header>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="mydatakobarplant" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>       
            <!-- <tbody id="showdatanopo"> -->
            <tbody>
            </tbody>
          </table>
        </div>
      </section>

      <div class="modal fade" id="formedit" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" style="color: red;">Setting Data Kode Barang</h4>
              <center><font color="red"></font><p id="pesan"></p></center>
            </div>

            <div class="modal-body">
              <div class="row">
                <!-- <div class="col-lg-3">
                  <label>ID</label>
                </div> --> 
                <div class="col-lg-9">
                  <input type="hidden" name="idkobarplant_modal" id="idkobarplant_modal" placeholder="idkobarplant" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-3">
                    <label>Nama Barang</label>                    
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="nabar_modal" name="nabar_modal" placeholder="Nama Barang" readonly>
                  </div>
              </div>

              <div class="row">
                <div class="col-lg-3">
                    <label>Kode Barang</label>  
                  </div>
                  
                  <div class="col-lg-9">
                    <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="kobar_modal" name="kobar_modal" placeholder="Kode Barang">
                  </div>
              </div>

              <div class="row">
                <div class="col-lg-3">
                    <label>Status</label>
                  </div>

                  <div class="col-lg-6">
                    <input type="text" class="form-control" id="sts_modal" name="sts_modal" placeholder="Status" readonly>
                    <!-- <input type="checkbox" name="status" id="status" value="1"> Aktif -->
                   <!--  <select id="status" name="status" class="form-control" >
                      <option value="1">Aktif</option>
                      <option value="2">Tidak Aktif</option>
                    </select> -->
                  </div>
              </div>

              <div class="row">
                <div class="col-md-1">
                  <button type="submit" id="updatedata" class="btn btn-warning">Update</button>
                </div>
               <!--  <div class="col-md-1">
                  <button type="button" data-dismiss="modal" id="btn-batal" class="btn btn-danger">Batal</button>
                </div> -->
              </div> 
            </div>              
          </div>
        </div>
      </div>
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
      tabel = $('#mydatakobarplant').DataTable({ 
        "processing": true,
        "serverSide": true,
        "searching": true,
        "info": true,
        "ordering": true,
        "lengthChange": true,
        "paging" : true,
        "order": [[ 1, 'desc' ]],
        "ajax":{
                "url": "<?php echo base_url('Setkobar/view') ?>",
                "type": "POST"
                },
        "deferRender": false,
        "aLengthMenu": [[20, 40, 60],[ 20, 40, 60]],
        "rowCallback": function (row, data, iDisplayIndex){
          var info  = this.fnPagingInfo();
          var page  = info.iPage;
          var length= info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
        },
        
        "columns":[
                    // { 
                    //   "data": null,
                    //   "orderable": false,
                    // },
                    { "data": "IDkobarplant" },
                    { "data": "nabar" },
                    { "data": "kobar" },
                    { "data": "sts" },
                    { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                                  var html  = "<button type='button' class='btn btn-warning btn-sm btn-xs update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-nabar='"+row.nabar+"' data-kobar='"+row.kobar+"' data-sts='"+row.sts+"' data-IDkobarplant='"+row.IDkobarplant+"'>EDIT</button>"
                                  return html
                                } 
                    },
                  ],
      });
     
      $(function(){
        $('#formedit').on('show.bs.modal',function(event){
          var button = $(event.relatedTarget);
            var IDkobarplant  = button.data('idkobarplant');
            var nabar         = button.data('nabar');
            var kobar         = button.data('kobar');
            var sts           = button.data('sts');
          var modal=$(this);
            modal.find('#idkobarplant_modal').val(IDkobarplant);
            modal.find('#nabar_modal').val(nabar);
            modal.find('#kobar_modal').val(kobar);
            modal.find('#sts_modal').val(sts);
        });
      });
      //startt update
      $(document).on('click','#updatedata',function(){
        $.ajax({
                  url : "<?php echo base_url('Setkobar/updaterecords');?>",
                  type : "POST",
                  cache: false,
                  data : { 
                            type: 3,
                            // IDkobarplant:$(this).attr("data-IDkobarplant").val(),
                            idkobarplant  : $('#idkobarplant_modal').val(),
                            nabar         : $('#nabar_modal').val(),
                            kobar         : $('#kobar_modal').val(),
                            sts           : $('#sts_modal').val(),
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