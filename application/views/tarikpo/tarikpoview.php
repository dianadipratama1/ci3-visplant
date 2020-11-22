  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
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
                <th>Unit Satuan</th>
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
                <th>Unit</th>
                <th>Index Kopel</th>
                <!-- <th>Action</th> -->
               <!--  <th></th> -->
              </tr>
            </thead>       
            <!-- <tbody id="showdatanopo"> -->
            <tbody>
            </tbody>
          </table>
        </div>
      </section>
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
                "url": "<?php echo base_url('Tarikpo/view') ?>",
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
                    { "data": "unit" },
                    { "data": "ind_kopel" },
                    // { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                    //               var html  = "<button type='button' class='btn btn-warning btn-sm btn-xs update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-nomorpo='"+row.nomorpo+"' data-jum_real='"+row.jum_real+"' data-kopel='"+row.kopel+"' data-tanggal='"+row.tanggal+"' data-nomorpolm='"+row.nomorpolm+"' data-namapel='"+row.namapel+"' data-harsat='"+row.harsat+"' data-kobar='"+row.kobar+"' data-nabar='"+row.nabar+"' data-jumlah='"+row.jumlah+"' data-ind_kopel='"+row.ind_kopel+"' data-IDno_po='"+row.IDno_po+"'>EDIT</button>"+" "+"<a href='javascript:void(0);' class='btn btn-danger btn-sm btn-xs delete' data-IDno_po='"+row.IDno_po+"'>HAPUS</a>"
                    //               return html
                    //             } 
                    // },
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
                    url:"<?php echo base_url("Tarikpo/deleterecords");?>",
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
                  url : "<?php echo base_url('Tarikpo/updaterecords');?>",
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