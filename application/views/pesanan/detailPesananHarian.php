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
          <h1 class="h3 mb-4 text-gray-800">Detail Pesanan <a style="color: red"></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
          <a href="<?php echo site_url('c_pesanan_harian/index') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a></h1>

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
                        <th>Menu Pagi</th>
                        <td><?php echo $value->menu_pagi?></td>    
                    </tr>
                    <tr>
                        <th>Menu Sore</th>
                        <td><?php echo $value->menu_sore?></td>    
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

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#semua" role="tab" aria-controls="semua" aria-selected="true">Semua Pesanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pagi" role="tab" aria-controls="pagi" aria-selected="false">Pesanan Pagi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#sore" role="tab" aria-controls="sore" aria-selected="false">Pesanan Sore</a>
                  </li>
                  
                </ul>


              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="tab-content" id="myTabContent"> 
                <!--DATA SEMUA-->
                
                <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                  <form action="<?php echo base_url('c_pesanan_harian/tambah_aksi_detail')?>" method="post" class="form-horizontal">
                      <!--Data Rutinitas Pagi-->  
                      <input type="hidden" name="tanggal-pesanan1" id="tanggal-pesanan" value="<?php echo Date('Y-m-d'); ?>">    
                      <?php $data_rutinitas = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='$pesanan->id_pesanan' GROUP BY menu_pagi");
                      foreach($data_rutinitas->result() as $data1) { ?>
                      <input type="hidden" readonly id="nama-menu" name="nama-menu1" class="form-control" value="<?php echo $data1->menu_pagi ?>">
                      <input type="hidden" readonly id="harga" name="harga1" class="form-control" value="<?php echo $data1->harga_pagi ?>">
                      <?php } ?>
                      <input type="hidden" readonly id="waktu" name="waktu1" class="form-control" value="PAGI">
                      <input type="hidden" readonly id="status-pengiriman" name="status-pengiriman1" class="form-control" value="Diproses">
                      <?php $data_kotak = $this->db->query("SELECT * FROM kotak WHERE status_kotak='Tersedia' ORDER BY id_kotak ASC limit 1");
                      foreach($data_kotak->result() as $data_kotak1) { ?>
                      <input type="hidden" readonly id="id-kotak1" name="id-kotak1" class="form-control" value="<?php echo $data_kotak1->id_kotak ?>">
                      <?php } ?>
                      <!--END Data Rutinitas Pagi-->
                      <input type="hidden" readonly id="id-pesanan" name="id-pesanan" class="form-control" value="<?php echo $pesanan->id_pesanan ?>">
                      <!--Data Rutinitas Sore-->  
                      <input type="hidden" name="tanggal-pesanan2" id="tanggal-pesanan" value="<?php echo Date('Y-m-d'); ?>">    
                      <?php $data_rutinitas2 = $this->db->query("SELECT * FROM pesanan_harian WHERE id_pesanan='$pesanan->id_pesanan' GROUP BY menu_sore");
                      foreach($data_rutinitas2->result() as $data2) { ?>
                      <input type="hidden" readonly id="nama-menu" name="nama-menu2" class="form-control" value="<?php echo $data2->menu_sore ?>">
                      <input type="hidden" readonly id="harga" name="harga2" class="form-control" value="<?php echo $data2->harga_sore ?>">
                      <?php } ?>
                      <input type="hidden" readonly id="waktu" name="waktu2" class="form-control" value="SORE">
                      <input type="hidden" readonly id="status-pengiriman" name="status-pengiriman2" class="form-control" value="Diproses">
                      <?php $data_kotak2 = $this->db->query("SELECT * FROM kotak WHERE status_kotak='Tersedia' ORDER BY id_kotak ASC limit 1, 1");
                      foreach($data_kotak2->result() as $data_kotak2) { ?>
                      <input type="hidden" readonly id="id-kotak2" name="id-kotak2" class="form-control" value="<?php echo $data_kotak2->id_kotak ?>">
                      <?php } ?>
                      <!--END Data Rutinitas Sore-->
                      
                      <button type="submit" class="btn btn-success">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                      </button>
                    
                  </form>
                <table id="tabel" width="100%" class="table table-bordered">
                  <thead>
                  <tr>
                          <th style="font-size: 11px;">Id</th>
                          <th style="font-size: 11px;">Tanggal Pesan</th>
                          <th style="font-size: 11px;">Nama Menu</th>
                          <th style="font-size: 11px;">Harga</th>      
                          <th style="font-size: 11px;">Waktu</th>
                          <th style="font-size: 11px;">Status Pengiriman</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $i = 1; foreach($detail_pesanan as $data_pesanan) {?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_pesanan->tanggal_pesanan?></td>
                    <td><?php echo $data_pesanan->nama_menu?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->harga)?></td>
                    <td><?php echo $data_pesanan->waktu?></td>
                    <td><?php echo $data_pesanan->status_pengiriman?></td>   
                  </tr>
                <?php $i++;} ?>
                </tbody>
              </table>
            </div>
            <!--END DATA SEMUA-->

            <!-- DATA PAGI -->
            <div class="tab-pane fade" id="pagi" role="tabpanel" aria-labelledby="pagi-tab">
                <table id="tabel_pagi" width="100%" class="table table-bordered">
                  <thead>
                  <tr>
                          <th style="font-size: 11px;">Id</th>
                          <th style="font-size: 11px;">Tanggal Pesan</th>
                          <th style="font-size: 11px;">Nama Menu</th>
                          <th style="font-size: 11px;">Harga</th>      
                          <th style="font-size: 11px;">Waktu</th>
                          <th style="font-size: 11px;">Status Pengiriman</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $i = 1; foreach($pesanan_pagi as $data_pagi) {?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_pagi->tanggal_pesanan?></td>
                    <td><?php echo $data_pagi->nama_menu?></td>
                    <td><?php echo $data_pagi->harga?></td>
                    <td><?php echo $data_pagi->waktu?></td>
                    <td><?php echo $data_pagi->status_pengiriman?></td>                                                        
                  </tr>
                <?php $i++;} ?>
                </tbody>
              </table>
            </div>

            <!--END DATA PAGI-->


            <!-- DATA SORE -->
            <div class="tab-pane fade" id="sore" role="tabpanel" aria-labelledby="sore-tab">
                <table id="tabel_sore" width="100%" class="table table-bordered">
                  <thead>
                  <tr>
                          <th style="font-size: 11px;">Id</th>
                          <th style="font-size: 11px;">Tanggal Pesan</th>
                          <th style="font-size: 11px;">Nama Menu</th>
                          <th style="font-size: 11px;">Harga</th>      
                          <th style="font-size: 11px;">Waktu</th>
                          <th style="font-size: 11px;">Status Pengiriman</th>
                  </tr>
                  </thead>
                <tbody>
                  <?php $i = 1; foreach($pesanan_sore as $data_sore) {?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_pesanan->tanggal_pesanan?></td>
                    <td><?php echo $data_pesanan->nama_menu?></td>
                    <td><?php echo $data_pesanan->harga?></td>
                    <td><?php echo $data_pesanan->waktu?></td>
                    <td><?php echo $data_pesanan->status_pengiriman?></td>                    
                  </tr>
                <?php $i++;} ?>
                </tbody>
              </table>
            </div>

            <!--END DATA SORE-->


           

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
 $(document).ready(function() {
    $('#tabel_rutinitas').DataTable({});
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
