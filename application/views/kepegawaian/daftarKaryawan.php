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
          <h1 class="h3 mb-4 text-gray-800">Daftar Karyawan</h1>

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
              <div class="card shadow mb-4">
                <table class="table table-bordered" id="table">
		          	  <thead>
                          <th style="width:10px">No.</th>
        		          <th>Nama Lengkap</th>
                          <th>Tempat, Tanggal lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Agama</th>
                          <th>Alamat</th>
                          <th>Jabatan</th>
                          <th>Gaji</th>
		                  <th>Telepon</th>
		                  <th>CV</th>
		                  <th style="width:100px">Action</th>
			          </thead>
			          <tbody>
				            <?php $i = 1; foreach($kepegawaian as $data_kepegawaian) {?>
                          <tr>
                            <td><?php echo $i."."?></td>
                            <td><?php echo $data_kepegawaian->nama_pegawai?></td>
                            <td><?php echo $data_kepegawaian->ttl?></td>
                            <td><?php echo $data_kepegawaian->jenis_kelamin?></td>
                            <td><?php echo $data_kepegawaian->agama?></td>
                            <td><?php echo $data_kepegawaian->alamat?></td>
                            <td><?php echo $data_kepegawaian->jabatan?></td>
                            <td><?php echo number_format($data_kepegawaian->gaji)?></td>
                            <td><?php echo $data_kepegawaian->telp?></td>
                            <td>
                            
        			          <?php if($data_kepegawaian->file_cv == ''){?>
			                    <p class="text-danger">-</p>  
			                  <?php } else {?>
                      
                                <a href='<?php echo base_url('c_user/download_cv/?cv_download='.$data_kepegawaian->file_cv);?>' style="color: blue">Unduh</a>
                              <?php }?>
                              
                            </td>
                            <td>
                                <button onclick="hapus_pegawai('<?php echo base_url('/c_kepegawaian/hapus_pegawai/'.$data_kepegawaian->id_kepegawaian)?>')" class="btn btn-danger btn-sm">
                                  Hapus
                                </button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $data_kepegawaian->id_kepegawaian?>">
                                  Edit
                                </button>
                              </td>
                              
                              <div id="modalEdit<?php echo $data_kepegawaian->id_kepegawaian?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="<?php echo base_url('c_kepegawaian/edit_aksi_pegawai')?>" method="post">
                                        <input type="text" name="id-pegawai" class="d-none" value="<?php echo $data_kepegawaian->id_kepegawaian?>">
                                        
                                        <div class="form-group">
				                          <label class="control-label" for="nama">Nama Lengkap </label>
				                            <div class="col-sm-12">
				                    	        <input type="text" name="nama-karyawan" class="form-control" value="<?php echo $data_kepegawaian->nama_pegawai?>">
				                            </div>
		                        	    </div>
                                        <div class="form-group">
		                                  <label class="control-label" for="nama">Tempat, Tanggal lahir </label>
		                                    <div class="col-sm-12">
		                            	        <input type="text" name="ttl-karyawan" class="form-control" value="<?php echo $data_kepegawaian->ttl?>">
		                                    </div>
                                	    </div>
                                        <div class="form-group">
		                                  <label class="control-label" for="jenisMenu">Jenis Kelamin </label>
                                            <div class="col-sm-12">
                                              <select class="form-control" name="kelamin-karyawan" value="<?php echo $data_kepegawaian->jenis_kelamin?>">
                                                <option>Laki - laki</option>
                                                <option>Perempuan</option>
                                              </select>
			                                    </div>
	                                	  </div>
                                        <div class="form-group">
			                                  <label class="control-label" for="nama">Agama </label>
			                                    <div class="col-sm-12">
			                            	        <input type="text" name="agama-karyawan" class="form-control" value="<?php echo $data_kepegawaian->agama?>">
			                                    </div>
		                                	  </div>
                                        <div class="form-group">
			                                  <label class="control-label" for="nama">Alamat </label>
			                                    <div class="col-sm-12">
			                            	        <input type="text" name="alamat-karyawan" class="form-control" value="<?php echo $data_kepegawaian->alamat?>">
			                                    </div>
		                                	  </div>
                                        <div class="form-group">
			                                  <label class="control-label" for="nama">Jabatan </label>
			                                    <div class="col-sm-12">
			                            	        <select type="text" name="jabatan-karyawan" class="form-control">
				                        	            <option value="<?php echo $data_kepegawaian->jabatan?>" selected hidden><?php echo $data_kepegawaian->jabatan?></option>
				                        	            <option value="Admin">Admin</option>
				                        	            <option value="Personel">Personel</option>
				                        	            <option value="Kurir">Kurir</option>    
				                        	        </select>
			                                    </div>
		                                	  </div>
        	                          <div class="form-group">
				                          <label class="control-label col-md-12" for="nama">Gaji Bulanan (Rp)</label>
				                            <div class="col-sm-12">
				                    	        <input name="gaji" class="form-control" id="currency-field"  data-type="currency" value="<?php echo number_format($data_kepegawaian->gaji)?>">
				                            </div>
		                        	  </div>
	                                    <div class="form-group">
                                  	      <label class="control-label" for="harga">Telephone </label>
                                        	  <div class="col-sm-12">
                                		          <input type="text" name="telp-karyawan" class="form-control" value="<?php echo $data_kepegawaian->telp?>">
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
  
   <script>
    $(document).ready(function() {
    $('#table').DataTable();
      } );
      
    function hapus_pegawai(link){
        swal({
          title: "Anda yakin ingin hapus data ini?",
          text: "Data akan dihapus secara permanen dari sistem",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = link;
          } 
        });
    }
    
    // FORMAT MATA UANG
    $("input[data-type='currency']").on({
        keyup: function() {
          formatCurrency($(this));
        },
        blur: function() { 
          formatCurrency($(this), "blur");
        }
    });
  </script>
</body>

</html>
