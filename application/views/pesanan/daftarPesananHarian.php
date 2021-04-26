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

          <div class="row">

          <!-- Page Heading -->
          <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Daftar Pesanan Harian</h1>
          </div>
          <div class="col-md-6">
            <!-- Topbar Search -->
            <?php echo form_open('c_pesanan_harian/sortir_down', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
                    <div class="input-group">
                      <input type="hidden" id="keyword" name="keyword" class="form-control bg-white border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="terendah">
                      <div class="input-group">
                        <button class="btn btn-primary" id="search" type="submit">
                          <i class="fas fa-arrow-down fa-sm"></i>
                        </button>
                      </div>
                    </div>
              <?php echo form_close() ?>
              <?php echo form_open('c_pesanan_harian/sortir_up', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
                    <div class="input-group">
                      <input type="hidden" id="keyword" name="keyword" class="form-control bg-white border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="tertinggi">
                      <div class="input-group">
                        <button class="btn btn-primary" id="search" type="submit">
                          <i class="fas fa-arrow-up fa-sm"></i>
                        </button>
                      </div>
                    </div>
              <?php echo form_close() ?>
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

          

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="table-responsive">
                <!--DATA SEMUA-->
                <table id="tabel" width="100%" class="table table-bordered">
		          	  <thead>
			            <tr>
                          <th style="font-size: 11px;">No</th>
                          <th style="font-size: 11px;">Id Pesanan</th>
					                <th style="font-size: 11px;">Nama Pemesan</th>
                          <th style="font-size: 11px;">Kontak Pemesan</th>
                          <th style="font-size: 11px;">Alamat</th>
                          <th style="font-size: 11px;">Tanggal Pesan</th>
                          <th style="font-size: 11px;">Total Harga</th>
                          <th style="font-size: 11px;">Pembayaran</th>
                          <th style="font-size: 11px;">Sisa Pembayaran</th>
                          <th style="font-size: 11px;">Status Pelunasan</th>
                          <th style="font-size: 11px;">Action</th>
			            </tr>
			            </thead>
			          <tbody>
				          <?php $i = 1; foreach($pesanan as $data_pesanan) {?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_pesanan->id_pesanan?></td>
                    <td><?php echo $data_pesanan->nama_pemesan?></td>
                    <td><?php echo $data_pesanan->kontak_pemesan?></td>
                    <td><?php echo $data_pesanan->alamat?></td>
                    <td><?php echo $data_pesanan->tanggal_pesanan?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->total_harga)?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->pembayaran)?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->sisa_pembayaran)?></td>
                    <?php if($data_pesanan->sisa_pembayaran==0){
                      echo "<td style='color:green'><b>LUNAS</b></td>";
                    }else{
                      echo "<td style='color:red'><b>BELUM LUNAS</b></td>";
                    } ?>                   
                    <td>
                        <a href="<?php echo site_url('c_pesanan_harian/view_edit/'.$data_pesanan->id_pesanan) ?>" class="btn btn-success btn-sm">
                          Edit
                        </a>
                        <a href="<?php echo site_url('c_pesanan_harian/view_detail_pesanan/'.$data_pesanan->id_pesanan) ?>" class="btn btn-info btn-sm">Lihat</a>
                        <?php if($data_pesanan->sisa_pembayaran==0){
                          echo"";
                        }else{?>
                        <a href="<?php echo site_url('c_pesanan_harian/index_hutang/'.$data_pesanan->id_pesanan) ?>" class="btn btn-warning btn-sm">Pembayaran</a>
                        <?php } ?>
                    </td>
                    
                  </tr>
                <?php $i++;} ?>
		          	</tbody>
		          </table>
            </div>
            <!--END DATA SEMUA-->
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

<script type="text/javascript">
 $(document).ready(function() {
    $('#tabel_pagi').DataTable({});
  } );
</script>

<script type="text/javascript">
 $(document).ready(function() {
    $('#tabel_sore').DataTable({});
  } );
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
