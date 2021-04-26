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
            <h1 class="h3 mb-4 text-gray-800">Daftar Pesanan</h1>
          </div>

          
          <div class="col-md-6">
            <!-- Topbar Search -->
            <?php echo form_open('c_pesanan/sortir_down', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
                    <div class="input-group">
                      <input type="hidden" id="keyword" name="keyword" class="form-control bg-white border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="terendah">
                      <div class="input-group">
                        <button class="btn btn-primary" id="search" type="submit">
                          <i class="fas fa-arrow-down fa-sm"></i>
                        </button>
                      </div>
                    </div>
              <?php echo form_close() ?>
              <?php echo form_open('c_pesanan/sortir_up', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
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
                <table id="tabel" width="100%" class="table table-bordered">
		          	  <thead>
			            <tr>
                          <th style="font-size: 11px;">No</th>
                          <th style="font-size: 11px;">Id Pesanan</th>
					                <th style="font-size: 11px;">Nama Pemesan</th>
                          <th style="font-size: 11px;">Kontak Pemesan</th>
                          <th style="font-size: 11px;">Alamat</th>
		                      <th style="font-size: 11px;">Nama Menu</th>
                          <th style="font-size: 11px;">Tanggal Pesan</th>
		              	      <th style="font-size: 11px;">Status Pembayaran</th>
                          <th style="font-size: 11px;">Status Pengiriman</th>
                          <th style="font-size: 11px;">Harga Satuan</th>
                          <th style="font-size: 11px;">Qty</th>
                          <th style="font-size: 11px;">Pembayaran</th>
                          <th style="font-size: 11px;">Total Harga</th>
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
                    <td><?php echo $data_pesanan->nama_menu?></td>
                    <td><?php echo $data_pesanan->tanggal_pesanan?></td>
                    <?php if($data_pesanan->status_pembayaran=="LUNAS"){
                      echo "<td style='color:green;'><b>LUNAS</b></td>";
                    }else{
                      echo "<td style='color:red;'><b>DP</b></td>";
                    } ?>
                    <?php if($data_pesanan->status_pesanan=="Diproses"){
                      echo "<td style='color:orange;'><b>Diproses</b></td>";
                    }elseif($data_pesanan->status_pesanan=="Dikirim"){
                      echo "<td style='color:skyblue;'><b>Dikirim</b></td>";
                    }elseif ($data_pesanan->status_pesanan=="Selesai") {
                      echo "<td style='color:green;'><b>Selesai</b></td>";
                    } ?>
                    <td>Rp. <?php echo number_format($data_pesanan->harga)?></td>
                    <td><?php echo $data_pesanan->qty?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->pembayaran)?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->total_harga)?></td>
                    <td>Rp. <?php echo number_format($data_pesanan->sisa_pembayaran)?></td>
                    <?php if($data_pesanan->sisa_pembayaran==0){
                      echo "<td style='color:green;'><b>LUNAS<b></td>";
                    }else{
                      echo "<td style='color:red;'><b>BELUM LUNAS</b></td>";
                    } ?>
                    <td>
                        <a href="<?php echo site_url('c_pesanan/view_edit/'.$data_pesanan->id_pesanan) ?>" class="btn btn-success btn-sm">
                          Edit
                        </a>
                        <?php if($data_pesanan->sisa_pembayaran == 0){
                          echo "";
                        }else{ ?>
                        <a href="<?php echo site_url('c_pesanan/index_hutang/'.$data_pesanan->id_pesanan) ?>" class="btn btn-warning btn-sm">Pembayaran</a>
                        <?php } ?>
                    </td>
                                        
                    <div id="modalEdit<?php echo $data_pesanan->id_pesanan?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo base_url('c_pesanan/edit_aksi_pesanan')?>" method="post">
                              <?php 
                                $id_pesanan = $data_pesanan->id_pesanan;
                                $data_pesan = $this->db->query("SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
                                foreach ($data_pesan->result() as $data_pesanan) {
                               ?>
                                <input type="text" name="id-pesanan" class="d-none" value="<?php echo $data_pesanan->id_pesanan?>">
                                <div class="form-group">
				                          <label class="control-label" for="nama">Nama Pemesan</label>
				                            <div class="col-sm-12">
				                    	        <input type="text" name="nama-pemesan" class="form-control" value="<?php echo $data_pesanan->nama_pemesan?>">
				                            </div>
		                        	  </div>
                                <div class="form-group">
				                          <label class="control-label" for="nama">Kontak Pemesan</label>
				                            <div class="col-sm-12">
				                    	        <input type="text" name="kontak-pesanan" class="form-control" value="<?php echo $data_pesanan->kontak_pemesan?>">
				                            </div>
		                        	  </div>
                                <div class="form-group">
			                        <label class="control-label" for="jenisPesanan">Jenis Pesanan</label>
                                    <div class="col-sm-12">
                                      <select class="form-control" name="jenis-pesanan" id="jenisPesanan">
                                        <option value="<?php echo $data_pesanan->jenis_pesanan?>" selected hidden><?php echo $data_pesanan->jenis_pesanan?></option>
                                        <option value="Harian">Harian</option>
                                        <option value="Event">Event</option>
                                      </select>
				                            </div>
		                        	  </div>
		                        	  <div class="form-group">
                                  <label class="control-label" for="nama">Nama Menu</label>
                                    <div class="col-sm-12">
                                      <select name="nama-pesanan" id="nama-pesanan" required oninvalid="this.setCustomValidity('Nama pesanan tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control">
                                        <option value="<?php echo $data_pesanan->nama_menu ?>" disabled style="color: red"><?php echo $data_pesanan->nama_menu ?></option>
                                        
                                        <?php 
                                          $makanan = $this->db->query("SELECT * FROM makanan");
                                          foreach ($makanan->result() as $data) {
                                           echo "<option value='$data->nama_menu'>$data->nama_menu</option>"; 
                                          }
                                         ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group">
				                          <label class="control-label" for="nama">Status Pembayaran</label>
				                            <div class="col-sm-12">
				                    	        <select type="text" name="status-pembayaran" class="form-control">
				                    	            <option value="<?php echo $data_pesanan->status_pembayaran?>" selected hidden><?php echo $data_pesanan->status_pembayaran?></option>
				                    	            <option value="LUNAS">Harian</option>
                                                    <option value="DP">Event</option>     
				                    	        </select>
				                            </div>
		                        	  </div>
                                <div class="form-group">
			                          <label class="control-label" for="nama">Tanggal Pesan</label>
				                          <div class="col-sm-12">
				                    	      <input type="text" name="tanggal-pesanan" class="form-control" value="<?php echo $data_pesanan->tanggal_pesanan?>">
				                          </div>
		                        	  </div>
			                          <div class="form-group">
			                      	      <label class="control-label" for="harga">Harga</label>
		                            	  <div class="col-sm-12">
		                    		        <input type="text" name="harga-pesanan" class="form-control" id="harga" value="<?php echo $data_pesanan->harga?>">
		                      	          </div>
		                      	    </div>	
                                <div class="modal-footer">	
		                      	      <button type="submit" class="btn btn-success btn-icon-split ">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                  </button>
                                </div>
                              <?php } ?>
	                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    
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
