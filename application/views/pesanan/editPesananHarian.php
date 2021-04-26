<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
</head>
 
<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Pesanan</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form action="<?php echo site_url('c_pesanan_harian/edit_aksi_pesanan/'.$data_pesanan->id_pesanan)?>" method="post" class="form-horizontal">
                    <input type="hidden" name="nama-pemesan" required oninvalid="this.setCustomValidity('Nama pemesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $data_pesanan->id_pesanan ?>" class="form-control">
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Nama Pemesan</label>
				                <div class="col-sm-12">
				        	        <input type="text" name="nama-pemesan" required oninvalid="this.setCustomValidity('Nama pemesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $data_pesanan->nama_pemesan ?>" class="form-control">
				                </div>
		            	  </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Kontak Pemesan</label>
				                <div class="col-sm-12">
				        	        <input type="text" required oninvalid="this.setCustomValidity('Kontak Pemesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="kontak-pesanan" class="form-control" value="<?php echo $data_pesanan->kontak_pemesan ?>">
				                </div>
		            	  </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Alamat Pemesan</label>
                        <div class="col-sm-12">
                          <textarea class="form-control" rows="3" name="alamat" id="alamat" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?php echo $data_pesanan->alamat ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Tanggal Pesan</label>
				                <div class="col-sm-12">
				        	        <input type="date" readonly required oninvalid="this.setCustomValidity('Tanggal Pesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $data_pesanan->tanggal_pesanan ?>" name="tanggal-pesanan" class="form-control">
				                </div>
		            	  </div>
                          <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Tanggal Akhir</label>
				                <div class="col-sm-12">
				        	        <input type="date" readonly required oninvalid="this.setCustomValidity('Tanggal Pesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $data_pesanan->tanggal_akhir ?>" name="tanggal-akhir" class="form-control">
				                </div>
		            	  </div>
                    
                    <br>
                    <hr>
                    <div class="form-group row" style="margin-right: 0rem; margin-left: 0rem">
                      <div class="col-md-6 mb-3 mb-sm-2">
                          <label class="control-label col-sm-5" for="nama">Pesanan Pagi</label>
                          <?php $makanan1 = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='".$data_pesanan->id_pesanan."'");
                          foreach ($makanan1->result() as $data1) { ?>
                          <input name="menu-pagi" class="form-control" id="menu-pagi" required oninvalid="this.setCustomValidity('Makanan Pagi Tidak Boleh Kosing')" readonly oninput="setCustomValidity('')" value="<?php echo $data1->menu_pagi ?>">   
                          <?php } ?> 
                      </div>
                      <div class="col-md-6">
                        <label class="control-label col-sm-5" for="nama">Pesanan Sore</label>        
                          <?php $makanan2 = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='".$data_pesanan->id_pesanan."'");
                          foreach ($makanan2->result() as $data2) { ?>
                          <input name="menu-sore" class="form-control" id="menu-sore" required oninvalid="this.setCustomValidity('Makanan Sore Tidak Boleh Kosing')" readonly oninput="setCustomValidity('')" value="<?php echo $data2->menu_sore ?>">   
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0rem; margin-left: 0rem">
                      <div class="col-md-6 mb-3 mb-sm-0">
                      <?php $data_pagi = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='".$data_pesanan->id_pesanan."'");
                      foreach ($data_pagi->result() as $pagi) { ?>
                          <input type="number" readonly name="harga-pagi" value="<?php echo $pagi->harga_pagi; ?>" id="harga-pagi" class="form-control" required oninvalid="this.setCustomValidity('Menu Pesanan Sore Tidak Boleh Kosong')"  oninput="setCustomValidity('')"> 
                      <?php } ?>
                      </div>
                      <div class="col-md-6">
                      <?php $data_sore = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='".$data_pesanan->id_pesanan."'");
                      foreach ($data_sore->result() as $sore) { ?>
                          <input type="number" readonly name="harga-sore" value="<?php echo $sore->harga_sore; ?>" id="harga-sore" class="form-control" required oninvalid="this.setCustomValidity('Menu Pesanan Sore Tidak Boleh Kosong')"  oninput="setCustomValidity('')"> 
                      <?php } ?>
                      </div>
                    </div>
                    <hr>
                    <br>
                          <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Status Pelunasan</label>
				                <div class="col-sm-12">
				        	        <select type="text" readonly name="status-pembayaran" id="status-pembayaran" class="form-control" required oninvalid="this.setCustomValidity('Status Pembayaran tidak boleh kosong')" oninput="setCustomValidity('')">
				        	          <?php 
                            if ($data_pesanan->status_pembayaran == "LUNAS"){
                               echo "<option value='LUNAS' disable>LUNAS</option>
                                    <option value='DP'>DP</option>";
                            }elseif ($data_pesanan->status_pembayaran == "DP") {
                              echo "<option value='DP' disable>DP</option>
                                    <option value='LUNAS'>LUNAS</option>";
                            }
                            ?>     
				        	        </select>
				                </div>
		            	  </div>	
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Pembayaran</label>
                        <div class="col-sm-12">
                          <input type="number" readonly value="<?php echo $data_pesanan->pembayaran ?>" id="pembayaran" required oninvalid="this.setCustomValidity('Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="pembayaran" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Sisa Pembayaran</label>
                        <div class="col-sm-12">
                          <input type="number" readonly value="<?php echo $data_pesanan->sisa_pembayaran ?>" required oninvalid="this.setCustomValidity('Sisa Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="sisa" name="sisa" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Total Harga</label>
                        <div class="col-sm-12">
                          <input type="number" readonly value="<?= $data_pesanan->total_harga ?>" required oninvalid="this.setCustomValidity('Total Harga Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="total-harga" name="total-harga" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">	
		          	      <button type="submit" class="btn btn-success btn-icon-split ">
                        <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Edit</span>
                      </button>
                    </div>
	                </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Senjani Kitchen</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#nama-pesanan').on('input',function(){
      var nama_menu=$(this).val();
      $.ajax({
        type     : "POST",
        url      : "<?php echo base_url('index.php/c_pesanan/proses_tambah')?>",
        dataType : "JSON",
        data     : {nama_menu : nama_menu},
        cache    : false,
        success  : function(data){
          $.each(data, function(nama_menu, harga){
            $('[name="harga-pesanan"]').val(data.harga);
          });
        } 
      });
      return false;
    });
  });
</script>


</body>

</html>
