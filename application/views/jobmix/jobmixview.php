  <?php $this->load->view('partial/header'); ?>
  <?php $this->load->view('partial/sidebar');?>
  <?php $this->load->view('jobmix/bcjobmix');?>  
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">Data Jobmix</header>
        <div class="panel-body">
          <a class="btn btn-success btn-sm" data-toggle='modal' href="#formtambah">Tambah Data Jobmix</a>
          <table class="table table-striped table-hover" id="mydatajobmix" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>NoIndx</th>
                <th>KdBrg</th>
                <th>Ket</th>
                <th>Air</th>
                <th>SMN</th>
               <!--  <th>Semen1</th> -->
                <th>SMNV</th>
                <th>FA</th>
                <th>Pasir</th>
                <th>PasirB</th>
                <th>BP510</th>
                <th>BP1020</th>
                <th>BP2030</th>
                <!-- <th>BP 525</th> -->
                <th>Add1</th>
                <th>Add2</th>
                <th>Add3</th>
                <!-- <th>Add 4</th>
                <th>Add 5</th>
                <th>Add 6</th> -->
                <!-- <th>sts</th> -->
                <th></th>
              </tr>
            </thead>       
            <!-- <tbody id="showdatanopo"> -->
            <tbody>
            </tbody>
          </table>
        </div>
      </section>

      <div class="modal fade" id="formdetail" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" style="color: red;">Detail Data Jobmix</h4>
              <center><font color="red"></font><p id="pesan"></p></center>
            </div>

            <div class="modal-body">
              <div class="row">
                <!-- <div class="col-md-2">
                  <label>ID</label>
                </div> -->
                <div class="col-md-4">
                  <input type="hidden" style="width: 90px;" name="IDjbmx_detail" id="IDjbmx_detail" placeholder="ID Jobmix" class="form-control" autocomplete="off" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>No Index</label>
                </div>

                <div class="col-md-4">
                  <input type="text" style="width: 90px; color: 998765" name="No_detail" id="No_detail" class="form-control" autocomplete="off" placeholder="No Index" readonly>
                </div>

                <div class="col-md-2">
                  <label>Pasir</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="PASIR_detail" id="PASIR_detail" placeholder="PASIR" class="form-control" autocomplete="off" readonly>
                </div> 
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Kode Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="KD_BRG_detail" id="KD_BRG_detail" placeholder="Kode Barang" class="form-control" autocomplete="off" readonly>
                </div>
                
                <div class="col-md-2">
                  <label>Pasir B</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="PASIRB_detail" id="PASIRB_detail" placeholder="PASIR B" class="form-control" autocomplete="off" readonly>
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Keterangan</label>
                </div>
                
                <div class="col-md-4">
                  <textarea rows="3" style="width: 268px;" cols="50" name="Keterangan_detail" id="Keterangan_detail" placeholder="Keterangan" class="form-control" readonly></textarea>
                </div> 
                
                <div class="col-md-2">
                  <label>Air</label>
                </div>
                
                <div class="col-md-4">
                 <input type="text" name="AIR_detail" id="AIR_detail" placeholder="AIR" class="form-control" autocomplete="off" readonly>
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Semen</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="SEMEN_detail" id="SEMEN_detail" placeholder="SEMEN" class="form-control" autocomplete="off" readonly="">
                </div> 
                
                <div class="col-md-2">
                  <label>BP 1020</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP1020_detail" id="BP1020_detail" placeholder="Batu Pecah 1020" class="form-control" autocomplete="off" readonly>
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Semen V</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="SEMEN2_detail" id="SEMEN2_detail" placeholder="SEMEN V" class="form-control" autocomplete="off" readonly>
                </div>

                <div class="col-md-2">
                  <label>BP 2030</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP2030_detail" id="BP2030_detail" placeholder="Batu Pecah 2030" class="form-control" autocomplete="off" readonly>
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Fly Ash</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="FLYASH_detail" id="FLYASH_detail" placeholder="FLY ASH" class="form-control" autocomplete="off" readonly>
                </div>

                <div class="col-md-2">
                  <label>BP 510</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP510_detail" id="BP510_detail" placeholder="Batu Pecah 510" class="form-control" autocomplete="off" readonly>
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label></label>
                </div>
                
                <div class="col-md-4">
                  <input type="hidden" name="FLYASH_detail" id="FLYASH_detail" placeholder="FLY ASH" class="form-control" autocomplete="off" readonly>
                </div>

                <!-- <div class="col-md-2">
                  <label>Nama Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="nabaredit" id="nabaredit" placeholder="Nama Barang" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  -->  
              </div>

               <div class="row">
                <div class="col-md-2">
                  <label>Addictive 1</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD1_detail" id="ADD1_detail" placeholder="Addictive 1" class="form-control" autocomplete="off" readonly>
                </div>

                <div class="col-md-2">
                  <label>Addictive 4</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD4_detail" id="ADD4_detail" placeholder="Addictive 4" class="form-control" autocomplete="off" readonly>
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Addictive 2</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD2_detail" id="ADD2_detail" placeholder="Addictive 2" class="form-control" autocomplete="off" readonly>
                </div>

                <div class="col-md-2">
                  <label>Addictive 5</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD5_detail" id="ADD5_detail" placeholder="Addictive 5" class="form-control" autocomplete="off" readonly>
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Addictive 3</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD3_detail" id="ADD3_detail" placeholder="Addictive 3" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                </div>

                <div class="col-md-2">
                  <label>Addictive 6</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD6_detail" id="ADD6_detail" placeholder="Addictive 6" class="form-control" autocomplete="off" readonly>
                </div>   
              </div>

              <div class="row">
                <!-- <div class="col-md-2">
                  <label>Status</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="sts_detail" id="sts_detail" placeholder="Status" class="form-control" autocomplete="off" readonly>
                </div> -->   
              </div>

              <div class="row">
               <!--  <div class="col-md-1">
                  <button type="submit" id="updatedata" class="btn btn-warning">Update</button>
                </div>
                <div class="col-md-1">
                  <button type="button" data-dismiss="modal" id="btn-batal" class="btn btn-danger">Batal</button>
                </div> -->
              </div> 
            </div>              
          </div>
        </div>
      </div>

      <div class="modal fade" id="formtambah" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" style="color: green;">Form Tambah Data Jobmix</h4>
              <center><font color="red"></font><p id="pesan"></p></center>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label></label>
                </div>
                <!-- <div class="col-md-4">
                  <input type="text" style="width: 90px;" name="IDjbmx" id="IDjbmx_detail" placeholder="ID Jobmix" class="form-control" autocomplete="off" readonly>
                </div> -->

                 <div class="col-md-2">
                  <label>Density</label>
                </div>
                <div class="col-md-4">
                  <input type="text" name="density_simpan" id="density_simpan" placeholder="Density" class="form-control" autocomplete="off" value="0" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>No Index</label>
                </div>

                <div class="col-md-4">
                  <input type="text" style="width: 90px;" name="No_simpan" id="No_simpan" class="form-control" autocomplete="off" placeholder="No Index" value="1" onkeypress="return hanyaAngka(event)">
                </div>

                <div class="col-md-2">
                  <label>Pasir</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="PASIR_simpan" id="PASIR_simpan" placeholder="PASIR" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix();">
                </div> 
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Kode Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="KD_BRG_simpan" id="KD_BRG_simpan" placeholder="Kode Barang" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>
                
                <div class="col-md-2">
                  <label>Pasir B</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="PASIRB_simpan" id="PASIRB_simpan" placeholder="PASIR B" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Keterangan</label>
                </div>
                
                <div class="col-md-4">
                  <textarea rows="3" style="width: 268px;" cols="50" name="Keterangan_simpan" id="Keterangan_simpan" placeholder="Keterangan" class="form-control" onkeyup="this.value = this.value.toUpperCase()"></textarea>
                </div> 
                
                <div class="col-md-2">
                  <label>Air</label>
                </div>
                
                <div class="col-md-4">
                 <input type="text" name="AIR_simpan" id="AIR_simpan" placeholder="AIR" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Semen</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="SEMEN_simpan" id="SEMEN_simpan" placeholder="SEMEN" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix();">
                </div> 
                
                <div class="col-md-2">
                  <label>BP 1020</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP1020_simpan" id="BP1020_simpan" placeholder="Batu Pecah 1020" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Semen V</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="SEMEN2_simpan" id="SEMEN2_simpan" placeholder="SEMEN V" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" value="0" onkeyup="totaljobmix();">
                </div>

                <div class="col-md-2">
                  <label>BP 2030</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP2030_simpan" id="BP2030_simpan" placeholder="Batu Pecah 2030" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" value="0" onkeyup="totaljobmix();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Fly Ash</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="FLYASH_simpan" id="FLYASH_simpan" placeholder="FLY ASH" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" value="0" onkeyup="totaljobmix();">
                </div>

                <div class="col-md-2">
                  <label>BP 510</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP510_simpan" id="BP510_simpan" placeholder="Batu Pecah 510" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label></label>
                </div>
                
                <div class="col-md-4">
                  <!-- <input type="hidden" name="FLYASH_simpan" id="FLYASH_simpan" placeholder="FLY ASH" class="form-control" autocomplete="off" value="0" onkeypress="return hanyaAngka(event)"> -->
                </div>

                <!-- <div class="col-md-2">
                  <label>Nama Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="nabaredit" id="nabaredit" placeholder="Nama Barang" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>  -->  
              </div>

               <div class="row">
                <div class="col-md-2">
                  <label>Addictive 1</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD1_simpan" id="ADD1_simpan" placeholder="Addictive 1" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" value="0" onkeyup="totaljobmix();">
                </div>

                <div class="col-md-2">
                  <label>Addictive 4</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD4_simpan" id="ADD4_simpan" placeholder="Addictive 4" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" value="0" onkeyup="totaljobmix();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Addictive 2</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD2_simpan" id="ADD2_simpan" placeholder="Addictive 2" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" value="0" onkeyup="totaljobmix();">
                </div>

                <div class="col-md-2">
                  <label>Addictive 5</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD5_simpan" id="ADD5_simpan" placeholder="Addictive 5" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" value="0" onkeyup="totaljobmix();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Addictive 3</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD3_simpan" id="ADD3_simpan" placeholder="Addictive 3" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" value="0" onkeyup="totaljobmix();">
                </div>

                <div class="col-md-2">
                  <label>Addictive 6</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD6_simpan" id="ADD6_simpan" placeholder="Addictive 6" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" value="0" onkeyup="totaljobmix();">
                </div>   
              </div>

              <div class="row">
                <!-- <div class="col-md-2">
                  <label>Status</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="sts_detail" id="sts_detail" placeholder="Status" class="form-control" autocomplete="off" readonly>
                </div> -->   
              </div>

              <div class="row">
                <div class="col-md-1">
                  <button type="submit" id="btnsimpanjobmix" name="btnsimpanjobmix" class="btn btn-success">Simpan</button>
                </div>
                <!-- <div class="col-md-1">
                  <button type="button" data-dismiss="modal" id="btn-batal" class="btn btn-danger">Batal</button>
                </div> -->
              </div> 
            </div>              
          </div>
        </div>
      </div>

      <div class="modal fade" id="formedit" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" style="color: orange;">Form Ubah Data Jobmix</h4>
              <center><font color="red"></font><p id="pesan"></p></center>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- <label></label> -->
                </div>
                <!-- <div class="col-md-4">
                  <input type="text" style="width: 90px;" name="IDjbmx" id="IDjbmx_detail" placeholder="ID Jobmix" class="form-control" autocomplete="off" readonly>
                </div> -->
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>No Index</label>
                </div>

                <div class="col-md-4">
                  <input type="text" style="width: 90px;" name="No_edit" id="No_edit" class="form-control" autocomplete="off" placeholder="No Index" onkeypress="return hanyaAngka(event)">
                </div>

                <div class="col-md-2">
                  <label>Pasir</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="PASIR_edit" id="PASIR_edit" placeholder="PASIR" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div> 
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Kode Barang</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="KD_BRG_edit" id="KD_BRG_edit" placeholder="Kode Barang" class="form-control" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>
                
                <div class="col-md-2">
                  <label>Pasir B</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="PASIRB_edit" id="PASIRB_edit" placeholder="PASIR B" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Keterangan</label>
                </div>
                
                <div class="col-md-4">
                  <textarea rows="3" style="width: 268px;" cols="50" name="Keterangan_edit" id="Keterangan_edit" placeholder="Keterangan" class="form-control" onkeyup="this.value = this.value.toUpperCase()"></textarea>
                </div> 
                
                <div class="col-md-2">
                  <label>Air</label>
                </div>
                
                <div class="col-md-4">
                 <input type="text" name="AIR_simpan" id="AIR_edit" placeholder="AIR_edit" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Semen</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="SEMEN_edit" id="SEMEN_edit" placeholder="SEMEN_edit" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div> 
                
                <div class="col-md-2">
                  <label>BP 1020</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP1020_edit" id="BP1020_edit" placeholder="Batu Pecah 1020" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Semen V</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="SEMEN2_edit" id="SEMEN2_edit" placeholder="SEMEN V" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>

                <div class="col-md-2">
                  <label>BP 2030</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP2030_edit" id="BP2030_edit" placeholder="Batu Pecah 2030" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>  
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Fly Ash</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="FLYASH_edit" id="FLYASH_edit" placeholder="FLY ASH" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>

                <div class="col-md-2">
                  <label>BP 510</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="BP510_edit" id="BP510_edit" placeholder="Batu Pecah 510" class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)" onkeyup="totaljobmix2();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label></label>
                </div> 
              </div>

               <div class="row">
                <div class="col-md-2">
                  <label>Addictive 1</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD1_edit" id="ADD1_edit" placeholder="Addictive 1" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeyup="totaljobmix2();">
                </div>

                <div class="col-md-2">
                  <label>Addictive 4</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD4_edit" id="ADD4_edit" placeholder="Addictive 4" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeyup="totaljobmix2();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Addictive 2</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD2_edit" id="ADD2_edit" placeholder="Addictive 2" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeyup="totaljobmix2();">
                </div>

                <div class="col-md-2">
                  <label>Addictive 5</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD5_edit" id="ADD5_edit" placeholder="Addictive 5" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeyup="totaljobmix2();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label>Addictive 3</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD3_edit" id="ADD3_edit" placeholder="Addictive 3" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeyup="totaljobmix2();">
                </div>

                <div class="col-md-2">
                  <label>Addictive 6</label>
                </div>
                
                <div class="col-md-4">
                  <input type="text" name="ADD6_edit" id="ADD6_edit" placeholder="Addictive 6" class="form-control" autocomplete="off" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeyup="totaljobmix2();">
                </div>   
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label></label>
                </div>   
              </div>

              <div class="row">
                <div class="col-md-6">
                  <button type="submit" id="updatedata" name="btnubahjobmix" class="btn btn-warning">Ubah</button>
                </div>
                <div class="col-md-2">
                  <label>Density</label>
                </div>
                <div class="col-md-2">
                  <input type="text" name="density_edit" id="density_edit" placeholder="Density" class="form-control" autocomplete="off" value="0" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-danger" onclick="totaljobmix2();">Hitung</a>
                </div>
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
      tabel = $('#mydatajobmix').DataTable({ 
        "processing": true,
        "serverSide": true,
        "searching": true,
        "info": true,
        "ordering": true,
        "lengthChange": true,
        "paging" : true,
        "order": [[ 1, 'desc' ]],
        "ajax":{
                "url": "<?php echo base_url('Jobmix/view') ?>",
                "type": "POST"
                },
        "deferRender": false,
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
                      "orderable": false,
                    },
                    { "data": "IDjbmx" },
                    { "data": "No" },
                    { "data": "KD_BRG" },
                    { "data": "Keterangan" },
                    { "data": "AIR" },
                    { "data": "SEMEN" },
                    // { "data": "SEMEN1" },
                    { "data": "SEMEN2" },
                    { "data": "FLYASH" },
                    { "data": "PASIR" },
                    { "data": "PASIRB" },
                    { "data": "BP510" },
                    { "data": "BP1020"},
                    { "data": "BP2030"},
                    // { "data": "BP525"},
                    { "data": "ADD1" },
                    { "data": "ADD2" },
                    { "data": "ADD3" },
                    // { "data": "ADD4" },
                    // { "data": "ADD5"},
                    // { "data": "ADD6" },
                    // { "data": "sts" },
                    { "render": function ( data, type, row ){ // Tampilkan kolom aksi
                                  var html  = "<button type='button' class='btn btn-info btn-xs detail' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formdetail' data-No='"+row.No+"' data-KD_BRG='"+row.KD_BRG+"' data-Keterangan='"+row.Keterangan+"' data-AIR='"+row.AIR+"' data-SEMEN='"+row.SEMEN+"' data-SEMEN2='"+row.SEMEN2+"' data-FLYASH='"+row.FLYASH+"' data-PASIR='"+row.PASIR+"' data-PASIRB='"+row.PASIRB+"' data-BP510='"+row.BP510+"' data-BP1020='"+row.BP1020+"' data-BP2030='"+row.BP2030+"' data-ADD1='"+row.ADD1+"' data-ADD2='"+row.ADD2+"' data-ADD3='"+row.ADD3+"' data-ADD4='"+row.ADD4+"' data-ADD5='"+row.ADD5+"' data-ADD6='"+row.ADD6+"' data-sts='"+row.sts+"' data-IDjbmx='"+row.IDjbmx+"'>Detail</button>"+"<button type='button' class='btn btn-warning btn-xs updatedata' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#formedit' data-No='"+row.No+"' data-KD_BRG='"+row.KD_BRG+"' data-Keterangan='"+row.Keterangan+"' data-AIR='"+row.AIR+"' data-SEMEN='"+row.SEMEN+"' data-SEMEN2='"+row.SEMEN2+"' data-FLYASH='"+row.FLYASH+"' data-PASIR='"+row.PASIR+"' data-PASIRB='"+row.PASIRB+"' data-BP1020='"+row.BP1020+"' data-BP2030='"+row.BP2030+"' data-BP510='"+row.BP510+"' data-ADD1='"+row.ADD1+"' data-ADD2='"+row.ADD2+"' data-ADD3='"+row.ADD3+"' data-ADD4='"+row.ADD4+"' data-ADD5='"+row.ADD5+"' data-ADD6='"+row.ADD6+"' data-sts='"+row.sts+"' data-IDjbmx='"+row.IDjbmx+"'>Ubah</button>"+"<a href='javascript:void(0);' class='btn btn-danger btn-xs delete' data-IDjbmx='"+row.IDjbmx+"'>Hapus</a>"
                                  return html
                                } 
                    },
                  ],
      });

      $('#btnsimpanjobmix').on('click',function(){
        var No_simpan         = $('#No_simpan').val();
        var KD_BRG_simpan     = $('#KD_BRG_simpan').val();
        var Keterangan_simpan = $('#Keterangan_simpan').val();
        var SEMEN_simpan      = $('#SEMEN_simpan').val();
        var SEMEN2_simpan     = $('#SEMEN2_simpan').val();
        var FLYASH_simpan     = $('#FLYASH_simpan').val();
        var PASIR_simpan      = $('#PASIR_simpan').val();
        var PASIRB_simpan     = $('#PASIRB_simpan').val();
        var AIR_simpan        = $('#AIR_simpan').val();
        var BP1020_simpan     = $('#BP1020_simpan').val();
        var BP2030_simpan     = $('#BP2030_simpan').val();
        var BP510_simpan      = $('#BP510_simpan').val();
        var ADD1_simpan       = $('#ADD1_simpan').val();
        var ADD2_simpan       = $('#ADD2_simpan').val();
        var ADD3_simpan       = $('#ADD3_simpan').val();
        var ADD4_simpan       = $('#ADD4_simpan').val();
        var ADD5_simpan       = $('#ADD5_simpan').val();
        var ADD6_simpan       = $('#ADD6_simpan').val();

        if (No_simpan!="" && KD_BRG_simpan!="" && Keterangan_simpan!="" && SEMEN_simpan!="" && SEMEN2_simpan!="" && FLYASH_simpan!="" && PASIR_simpan!="" && PASIRB_simpan!="" && AIR_simpan!="" && BP1020_simpan!="" && BP2030_simpan!="" && BP510_simpan!="" && ADD1_simpan!="" && ADD2_simpan!="" && ADD3_simpan!="" && ADD4_simpan!="" && ADD5_simpan!="" && ADD6_simpan!=""){
          $("#btnsimpanjobmix").attr("disabled","disabled");
          $.ajax({
            url:"<?php echo base_url('Jobmix/savedata');?>",
            type:"POST",
            data:{
              type:1,
              No_simpan         : No_simpan,
              KD_BRG_simpan     : KD_BRG_simpan,
              Keterangan_simpan : Keterangan_simpan,
              SEMEN_simpan      : SEMEN_simpan,
              SEMEN2_simpan     : SEMEN2_simpan,
              FLYASH_simpan     : FLYASH_simpan,
              PASIR_simpan      : PASIR_simpan,
              PASIRB_simpan     : PASIRB_simpan,
              AIR_simpan        : AIR_simpan,
              BP1020_simpan     : BP1020_simpan,
              BP2030_simpan     : BP2030_simpan,
              BP510_simpan      : BP510_simpan,
              ADD1_simpan       : ADD1_simpan,
              ADD2_simpan       : ADD2_simpan,
              ADD3_simpan       : ADD3_simpan,
              ADD4_simpan       : ADD4_simpan,
              ADD5_simpan       : ADD5_simpan,
              ADD6_simpan       : ADD6_simpan,
            },
            cache: false,
            success: function(dataResult){
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode==200){
                alert("Data Jobmix Berhasil Disimpan");
                resetValue();
                $('#formtambah').modal("toggle");
                tabel.ajax.reload();
                // $("#btnsimpanjobmix").removeAttr(dataResult);
                // $('#fupForm').find('input:text').val('');
                // $("#success").show();
                // $('#success').html('Data added successfully !'); 
              }else if (dataResult.statusCode==201){
                alert("Error Occured !");
              }
            }
          });
        }else{
          alert("Data Tidak Lengkap, Harap Isi Data Terlebih Dahulu !!");
        }
      });;
     
      $(function(){
        $('#formdetail').on('show.bs.modal',function(event){
          var button = $(event.relatedTarget);
            // var idjbmx  = button.data('idjbmx');
            var IDjbmx_detail     = button.data('idjbmx');
            var No_detail         = button.data('no');
            var KD_BRG_detail     = button.data('kd_brg');
            var Keterangan_detail = button.data('keterangan');
            var AIR_detail        = button.data('air');
            var SEMEN_detail      = button.data('semen');
            var SEMEN2_detail     = button.data('semen2');
            var FLYASH_detail     = button.data('flyash');
            var PASIR_detail      = button.data('pasir');
            var PASIRB_detail     = button.data('pasirb');
            var BP510_detail      = button.data('bp510');
            var BP1020_detail     = button.data('bp1020');
            var BP2030_detail     = button.data('bp2030');
            var ADD1_detail       = button.data('add1');
            var ADD2_detail       = button.data('add2');
            var ADD3_detail       = button.data('add3');
            var ADD4_detail       = button.data('add4');
            var ADD5_detail       = button.data('add5');
            var ADD6_detail       = button.data('add6');
            var sts_detail        = button.data('sts');
          var modal=$(this);
            // modal.find('#idjbmx_detail').val(idjbmx);
            modal.find('#IDjbmx_detail').val(IDjbmx_detail);
            modal.find('#No_detail').val(No_detail);
            modal.find('#KD_BRG_detail').val(KD_BRG_detail);
            modal.find('#Keterangan_detail').val(Keterangan_detail);
            modal.find('#AIR_detail').val(AIR_detail);
            modal.find('#SEMEN_detail').val(SEMEN_detail);
            modal.find('#SEMEN2_detail').val(SEMEN2_detail);
            modal.find('#FLYASH_detail').val(FLYASH_detail);
            modal.find('#PASIR_detail').val(PASIR_detail);
            modal.find('#PASIRB_detail').val(PASIRB_detail);
            modal.find('#BP510_detail').val(BP510_detail);
            modal.find('#BP1020_detail').val(BP1020_detail);
            modal.find('#BP2030_detail').val(BP2030_detail);
            modal.find('#ADD1_detail').val(ADD1_detail);
            modal.find('#ADD2_detail').val(ADD2_detail);
            modal.find('#ADD3_detail').val(ADD3_detail);
            modal.find('#ADD4_detail').val(ADD4_detail);
            modal.find('#ADD5_detail').val(ADD5_detail);
            modal.find('#ADD6_detail').val(ADD6_detail);
            modal.find('#sts_detail').val(sts_detail);
        });
      });

      $(function(){
        $('#formedit').on('show.bs.modal',function(event){
          var button = $(event.relatedTarget);
            // var idjbmx  = button.data('idjbmx');
            var IDjbmx     = button.data('idjbmx');
            var No         = button.data('no');
            var KD_BRG     = button.data('kd_brg');
            var Keterangan = button.data('keterangan');
            var AIR        = button.data('air');
            var SEMEN      = button.data('semen');
            var SEMEN2     = button.data('semen2');
            var FLYASH     = button.data('flyash');
            var PASIR      = button.data('pasir');
            var PASIRB     = button.data('pasirb');
            var BP510      = button.data('bp510');
            var BP1020     = button.data('bp1020');
            var BP2030     = button.data('bp2030');
            var ADD1       = button.data('add1');
            var ADD2       = button.data('add2');
            var ADD3       = button.data('add3');
            var ADD4       = button.data('add4');
            var ADD5       = button.data('add5');
            var ADD6       = button.data('add6');
          var modal=$(this);
            // modal.find('#idjbmx_detail').val(idjbmx);
            modal.find('#IDjbmx_edit').val(IDjbmx);
            modal.find('#No_edit').val(No);
            modal.find('#KD_BRG_edit').val(KD_BRG);
            modal.find('#Keterangan_edit').val(Keterangan);
            modal.find('#AIR_edit').val(AIR);
            modal.find('#SEMEN_edit').val(SEMEN);
            modal.find('#SEMEN2_edit').val(SEMEN2);
            modal.find('#FLYASH_edit').val(FLYASH);
            modal.find('#PASIR_edit').val(PASIR);
            modal.find('#PASIRB_edit').val(PASIRB);
            modal.find('#BP510_edit').val(BP510);
            modal.find('#BP1020_edit').val(BP1020);
            modal.find('#BP2030_edit').val(BP2030);
            modal.find('#ADD1_edit').val(ADD1);
            modal.find('#ADD2_edit').val(ADD2);
            modal.find('#ADD3_edit').val(ADD3);
            modal.find('#ADD4_edit').val(ADD4);
            modal.find('#ADD5_edit').val(ADD5);
            modal.find('#ADD6_edit').val(ADD6);
        });
      });
      //startt update
      $(document).on('click','#updatedata',function(){
        $.ajax({
                  url : "<?php echo base_url('Jobmix/updaterecords');?>",
                  type : "POST",
                  cache: false,
                  data : { 
                            type: 3,
                            // IDkobarplant:$(this).attr("data-IDkobarplant").val(),
                            idjbmx    : $('#IDjbmx_edit').val(),
                            no        : $('#No_edit').val(),
                            kd_brg    : $('#KD_BRG_edit').val(),
                            keterangan: $('#Keterangan_edit').val(),
                            air       : $('#AIR_edit').val(),
                            semen     : $('#SEMEN_edit').val(),
                            semen2    : $('#SEMEN2_edit').val(),
                            flyash    : $('#FLYASH_edit').val(),
                            pasir     : $('#PASIR_edit').val(),
                            pasirb    : $('#PASIRB_edit').val(),
                            bp510     : $('#BP510_edit').val(),
                            bp1020    : $('#BP1020_edit').val(),
                            bp2030    : $('#BP2030_edit').val(),
                            add1      : $('#ADD1_edit').val(),
                            add2      : $('#ADD2_edit').val(),
                            add3      : $('#ADD3_edit').val(),
                            add4      : $('#ADD4_edit').val(),
                            add5      : $('#ADD5_edit').val(),
                            add6      : $('#ADD6_edit').val(),
                         },
                         // alert(dataResult);
                  success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    // alert(dataResult);
                    if (dataResult.statusCode==200){
                      alert('Data updated successfully !');
                      $('#formedit').modal('toggle');
                      tabel.ajax.reload();  
                    }
                  }
        });
        // alert(ajax);
        return false;
      });//end update

      $(document).on("click",".delete",function(){
          var x = confirm("Yakin Akan Hapus Data Ini?");
          if (x==true) {
            var $ele = $(this).parent().parent();
            $.ajax({
              url:"<?php echo base_url("Jobmix/deleterecords");?>",
              type: "POST",
              cache: false,
              data:{
                      type:2,
                      IDjbmx:$(this).attr("data-IDjbmx")
                    },
              success:function(dataResult){
              // alert(dataResult);
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode==200){
                  $ele.fadeOut().remove();
                }
                alert("Data Successfully Removed");
                tabel.ajax.reload();
              }
            });
          }else{
            return false;
          } 
        });  

      $('.input-tanggal').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true
      });
    });
    
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
    function resetValue(){
      document.getElementById("No_simpan").value          = "1";
      document.getElementById("KD_BRG_simpan").value      = "";
      document.getElementById("Keterangan_simpan").value  = "";
      document.getElementById("SEMEN_simpan").value       = "0";
      document.getElementById("SEMEN2_simpan").value      = "0";
      document.getElementById("FLYASH_simpan").value      = "0";
      document.getElementById("PASIR_simpan").value       = "0";
      document.getElementById("PASIRB_simpan").value      = "0";
      document.getElementById("AIR_simpan").value         = "0";
      document.getElementById("BP1020_simpan").value      = "0";
      document.getElementById("BP2030_simpan").value      = "0";
      document.getElementById("BP510_simpan").value       = "0";
      document.getElementById("ADD1_simpan").value        = "0";
      document.getElementById("ADD2_simpan").value        = "0";
      document.getElementById("ADD3_simpan").value        = "0";
      document.getElementById("ADD4_simpan").value        = "0";
      document.getElementById("ADD5_simpan").value        = "0";
      document.getElementById("ADD6_simpan").value        = "0";
      document.getElementById("density_simpan").value     = "0";
    }

    function totaljobmix(){
      var semen   = document.getElementById("SEMEN_simpan").value;
      var semen2  = document.getElementById("SEMEN2_simpan").value;      
      var flyash  = document.getElementById("FLYASH_simpan").value;      
      var pasir   = document.getElementById("PASIR_simpan").value;       
      var pasirb  = document.getElementById("PASIRB_simpan").value;      
      var air     = document.getElementById("AIR_simpan").value;         
      var bp1020  = document.getElementById("BP1020_simpan").value;      
      var bp2030  = document.getElementById("BP2030_simpan").value;      
      var bp510   = document.getElementById("BP510_simpan").value;       
      var add1    = document.getElementById("ADD1_simpan").value;        
      var add2    = document.getElementById("ADD2_simpan").value;        
      var add3    = document.getElementById("ADD3_simpan").value;        
      var add4    = document.getElementById("ADD4_simpan").value;        
      var add5    = document.getElementById("ADD5_simpan").value;        
      var add6    = document.getElementById("ADD6_simpan").value;        
      // var density = document.getElementById("density").value
      var result  = parseFloat(semen)+parseFloat(semen2)+parseFloat(flyash)+parseFloat(pasir)+parseFloat(pasirb)+parseFloat(air)+parseFloat(bp1020)+parseFloat(bp2030)+parseFloat(bp510)+parseFloat(add1)+parseFloat(add2)+parseFloat(add3)+parseFloat(add4)+parseFloat(add5)+parseFloat(add6);
      if (!isNaN(result)) {
        document.getElementById('density_simpan').value = result;
      }             
    }

    function totaljobmix2(){
      var semen   = document.getElementById("SEMEN_edit").value;
      var semen2  = document.getElementById("SEMEN2_edit").value;      
      var flyash  = document.getElementById("FLYASH_edit").value;      
      var pasir   = document.getElementById("PASIR_edit").value;       
      var pasirb  = document.getElementById("PASIRB_edit").value;      
      var air     = document.getElementById("AIR_edit").value;         
      var bp1020  = document.getElementById("BP1020_edit").value;      
      var bp2030  = document.getElementById("BP2030_edit").value;      
      var bp510   = document.getElementById("BP510_edit").value;       
      var add1    = document.getElementById("ADD1_edit").value;        
      var add2    = document.getElementById("ADD2_edit").value;        
      var add3    = document.getElementById("ADD3_edit").value;        
      var add4    = document.getElementById("ADD4_edit").value;        
      var add5    = document.getElementById("ADD5_edit").value;        
      var add6    = document.getElementById("ADD6_edit").value;        
      // var density = document.getElementById("density").value;
      var result  = parseFloat(semen)+parseFloat(semen2)+parseFloat(flyash)+parseFloat(pasir)+parseFloat(pasirb)+parseFloat(air)+parseFloat(bp1020)+parseFloat(bp2030)+parseFloat(bp510)+parseFloat(add1)+parseFloat(add2)+parseFloat(add3)+parseFloat(add4)+parseFloat(add5)+parseFloat(add6);
      if (!isNaN(result)) {
        document.getElementById('density_edit').value = result;
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