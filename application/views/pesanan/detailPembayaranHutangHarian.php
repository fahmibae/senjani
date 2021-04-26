<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="<?php echo base_url('assets/vendor/bootstrap/dataTables.bootstrap4.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Pembayaran Hutang <a style="color: red"></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
          <a href="<?php echo site_url('c_pesanan_harian/index') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a></h1>
          <hr>
          <div class="row">
            <div class="col-lg-6">
          <div class="card shadow mb-4">
                <table class="table table-bordered">
                  <?php
                    $pesanan_harian = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='$pesanan->id_pesanan'");
                    foreach ($pesanan_harian->result() as $value) { ?>
                    <tr>
                        <th style="width:200px">Nama Pemesan</th>
                        <td><?php echo $value->nama_pemesan?></td>    
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><?php echo $value->kontak_pemesan?></td>    
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $value->alamat?></td>    
                    </tr>
                    <tr>
                        <th>Tanggal Pesan</th>
                        <td><?php echo date('d F Y', strtotime($value->tanggal_pesanan));?></td>    
                    </tr>
                    <tr>
                        <th>Berlaku Sampai</th>
                        <td><?php echo date('d F Y', strtotime($value->tanggal_akhir))?></td>    
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp. <?php echo number_format($value->total_harga)?></td>    
                    </tr>
                    <tr>
                        <th>Pembayaran</th>
                        <td>Rp. <?php echo number_format($value->pembayaran)?></td>    
                    </tr>
                    <tr>
                        <th>Sisa Pembayaran</th>
                        <td>Rp. <?php echo number_format($value->sisa_pembayaran)?></td>    
                    </tr>
                   <?php } ?>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-12">
          <?php if($this->session->flashdata('edit')): ?>
		 	        <?php if ($this->session->flashdata('edit') == TRUE): ?>
		 		       <div class="alert alert-success">Berhasil Diedit</div>
		 	      <?php elseif ($this->session->flashdata('edit') == FALSE): ?>	
		 		        <div class="alert alert-danger">Gagal Diedit</div>
		 	        <?php endif; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('tambah')): ?>
		 	        <?php if ($this->session->flashdata('tambah') == TRUE): ?>
		 		       <div class="alert alert-success">Berhasil Disimpan</div>
		 	      <?php elseif ($this->session->flashdata('tambah') == FALSE): ?>	
		 		        <div class="alert alert-danger">Gagal Disimpan</div>
		 	        <?php endif; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('hapus')): ?>
		 	        <?php if ($this->session->flashdata('hapus') == TRUE): ?>
		 		       <div class="alert alert-success">Berhasil Dihapus</div>
		 	      <?php elseif ($this->session->flashdata('hapus') == FALSE): ?>	
		 		        <div class="alert alert-danger">Gagal Dihapus</div>
		 	        <?php endif; ?>
            <?php endif; ?>
          </div>

          <?php if($check->sisa_pembayaran==0) {  
            echo "";
          }else{ ?>
            <!--Form Input-->
          <h1 class="h3 mb-4 text-gray-800">Input Pembayaran</h1>
          <hr>
          <div class="row">
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                  <div class="card-body">
                  <form action="<?php echo base_url('c_pesanan_harian/tambah_aksi_hutang')?>" method="post" class="form-horizontal">
                    <div class="form-group row">
                      <div class="col-md-2 mb-3 mb-sm-2">
                          <label class="control-label col-sm-10" style="font-size: 12px;" for="nama">No. Pembayaran</label>
                            <input type="text" class="form-control" name="nomor-pembayaran" id="nomor-pembayaran" required oninvalid="this.setCustomValidity('Nomor Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                      </div>
                      <div class="col-md-3">
                          <label class="control-label col-sm-10" style="font-size: 12px;" for="nama">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required oninvalid="this.setCustomValidity('Tanggal Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                      </div>
                      <div class="col-md-2">
                        <label class="control-label col-sm-5" style="font-size: 12px" for="nama">ATM</label>
                            <select class="form-control" name="atm" id="atm" required oninvalid="this.setCustomValidity('ATM Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                              <option value="">Pilih ATM</option>
                              <option value="Mandiri">Mandiri</option>
                              <option value="BRI">BRI</option>
                              <option value="BNI">BNI</option>
                              <option value="BCA">BCA</option>
                              <option value="Bank Jatim">Bank Jatim</option>
                              <option value="Pegadaian">Mandiri</option>
                              <option value="Lainnya">Lainnya</option>
                            </select>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label col-sm-10" style="font-size: 12px;" for="nama">Jumlah pembayaran</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" required oninvalid="this.setCustomValidity('Jumlah Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
                      </div>                   
                    <input type="hidden" name="id-pesanan" id="id-pesanan" required oninvalid="this.setCustomValidity('Jumlah Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?php echo $pesanan->id_pesanan ?>">
                    <div class="col-md-2">
                      <label class="control-label col-sm-10" style="font-size: 12px; color: #FFF;" for="nama">Jumlah</label>
                        <button type="submit" class="btn btn-success btn-icon-split ">
                        <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Bayar</span>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--END form input-->
          <?php } ?>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <table id="tabel" width="100%" class="table table-bordered">
		          	  <thead>
			            <tr>
                          <th style="font-size: 11px;">Id</th>
					                <th style="font-size: 11px;">Nomor Pembayaran</th>
                          <th style="font-size: 11px;">ATM</th>
		                      <th style="font-size: 11px;">Jumlah</th>
			            </tr>
			            </thead>
			          <tbody>
				          <?php $i = 1; foreach($hutang as $data_hutang) {?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_hutang->nomor_pembayaran?></td>
                    <td><?php echo $data_hutang->atm?></td>
                    <td><?php echo $data_hutang->jumlah?></td>
                  </tr>
                <?php $i++;} ?>
		          	</tbody>
		          </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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


  
<script type="text/javascript">
 $(document).ready(function() {
    $('#tabel').DataTable({});
  } );
</script>
</body>

</html>
