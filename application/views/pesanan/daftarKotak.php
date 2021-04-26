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
          <h1 class="h3 mb-4 text-gray-800">Daftar Kotak Makanan</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#kotak-semua" role="tab" aria-controls="kotak-semua" aria-selected="true">Semua Kotak</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#kotak-tersedia" role="tab" aria-controls="kotak-tersedia" aria-selected="false">Tersedia</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kotak-dipakai" role="tab" aria-controls="kotak-dipakai" aria-selected="false">Dipakai</a>
                  </li>
                </ul>



              <div class="card shadow mb-4">

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

                <div class="tab-content" id="myTabContent">  

                      
                  <!--- TAB SEMUA DATA KOTAK --->
                  <div class="tab-pane fade show active" id="kotak-semua" role="tabpanel" aria-labelledby="kotak-semua-tab">
                        <table class="table table-bordered" id="table-3">
		                  	  <thead>
                                  <th style="width:1px;">No.</th>
                                  <th>ID Kotak</th>
                                  <th>Status Kotak</th>
                                  <th style="width:90px">Action</th>
			                  </thead>
			                  <tbody>
                          <?php $i = 1; foreach($kotak as $data_kotak) {?>
			                  <tr>
                                <td><?php echo $i."."?></td>
                                <td><?php echo $data_kotak->id_kotak?></td>
                                <td><?php echo $data_kotak->status_kotak?></td>
                                <td>
                                    <a href="<?php echo base_url('/c_pesanan/hapus_kotak/'.$data_kotak->id_kotak) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus.?')">
                                      Hapus
                                    </a>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $data_kotak->id_kotak?>">
                                      Edit
                                    </button>
                                 </td>
                                 
                                 <div id="modalEdit<?php echo $data_kotak->id_kotak?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kotak</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="<?php echo base_url('c_pesanan/edit_aksi_kotak')?>" method="post">
                                                <input type="text" name="id-edit-kotak" class="d-none" value="<?php echo $data_kotak->id_kotak?>">
                                                
                                                <div class="form-group">
                                		              <label class="control-label" for="nama">Id Kotak</label>
			                                            <div class="col-sm-12">
			                                    	        <input type="text" readonly name="id-kotak" class="form-control" value="<?php echo $data_kotak->id_kotak?>">
			                                            </div>
                                        	    </div>
                                        	    
                                                <div class="form-group">
		                                          <label class="control-label" for="jenisPesanan">Status Kotak</label>
                                                    <div class="col-sm-12">
                                                      <select class="form-control" name="status-kotak">
                                                        <option value="<?php echo $data_kotak->status_kotak?>" selected hidden><?php echo $data_kotak->status_kotak?></option>
                                                        <option value="Terpakai">Terpakai</option>
                                                        <option value="Tersedia">Tersedia</option>
                                                      </select>
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
                  <!--- END TAB SEMUA DATA KOTAK --->
                  
                   <!--- TAB DATA KOTAK TERSEDIA--->
                  <div class="tab-pane fade" id="kotak-tersedia" role="tabpanel" aria-labelledby="kotak-tersedia-tab">
                    
                    <table class="table table-bordered" id="table-1">
		                  	  <thead>
                                  <th style="width:1px;">No.</th>
                                  <th>ID Kotak</th>
                                  <th>Status Kotak</th>
                                  <th style="width:90px">Action</th>
			                  </thead>
			                  <tbody>
                          <?php $i = 1; foreach($kotak_tersedia as $data_kotak) {?>
			                  <tr>
                                <td><?php echo $i."."?></td>
                                <td><?php echo $data_kotak->id_kotak?></td>
                                <td><?php echo $data_kotak->status_kotak?></td>
                                <td>
                                    <a href="<?php echo base_url('/c_pesanan/hapus_kotak/'.$data_kotak->id_kotak) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus.?')" class="btn btn-danger btn-sm">
                                      Hapus
                                    </a>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $data_kotak->id_kotak?>-tersedia">
                                      Edit
                                    </button>
                                 </td>
                                 
                                 <div id="modalEdit<?php echo $data_kotak->id_kotak?>-tersedia" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kotak</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="<?php echo base_url('c_pesanan/edit_aksi_kotak')?>" method="post">
                                                <input type="text" name="id-edit-kotak" class="d-none" readonly value="<?php echo $data_kotak->id_kotak?>">
                                                
                                                <div class="form-group">
                                		              <label class="control-label" for="nama">Id Kotak</label>
			                                            <div class="col-sm-12">
			                                    	        <input type="text" name="id-kotak" class="form-control" readonly value="<?php echo $data_kotak->id_kotak?>">
			                                            </div>
                                        	    </div>
                                        	    
                                                <div class="form-group">
		                                          <label class="control-label" for="jenisPesanan">Status Kotak</label>
                                                    <div class="col-sm-12">
                                                      <select class="form-control" name="status-kotak">
                                                        <option value="<?php echo $data_kotak->status_kotak?>" selected hidden><?php echo $data_kotak->status_kotak?></option>
                                                        <option value="Terpakai">Terpakai</option>
                                                        <option value="Tersedia">Tersedia</option>
                                                      </select>
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
                  <!--- END TAB DATA KOTAK TERSEDIA--->
                  
                  
                  <!--- TAB DATA KOTAK DIPAKAI--->
                  <div class="tab-pane fade" id="kotak-dipakai" role="tabpanel" aria-labelledby="kotak-dipakai-tab">
                        <table class="table table-bordered" id="table-2">
		                  	  <thead>
                                  <th style="width:1px;">No.</th>
                                  <th>ID Kotak</th>
                                  <th>Status Kotak</th>
                                  <th style="width:90px">Action</th>
			                  </thead>
			                  <tbody>
                          <?php $i = 1; foreach($kotak_dipakai as $data_kotak) {?>
			                  <tr>
                                <td><?php echo $i."."?></td>
                                <td><?php echo $data_kotak->id_kotak?></td>
                                <td><?php echo $data_kotak->status_kotak?></td>
                                <td>
                                    <a href="<?php echo base_url('/c_pesanan/hapus_kotak/'.$data_kotak->id_kotak) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus.?')" class="btn btn-danger btn-sm">
                                      Hapus
                                    </a>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $data_kotak->id_kotak?>-tersedia">
                                      Edit
                                    </button>
                                 </td>

                                 <div id="modalEdit<?php echo $data_kotak->id_kotak?>-tersedia" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kotak</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="<?php echo base_url('c_pesanan/edit_aksi_kotak')?>" method="post">
                                                <input type="text" name="id-edit-kotak" class="d-none" readonly value="<?php echo $data_kotak->id_kotak?>">
                                                
                                                <div class="form-group">
                                                  <label class="control-label" for="nama">Id Kotak</label>
                                                  <div class="col-sm-12">
                                                    <input type="text" name="id-kotak" class="form-control" readonly value="<?php echo $data_kotak->id_kotak?>">
                                                  </div>
                                              </div>
                                              
                                                <div class="form-group">
                                              <label class="control-label" for="jenisPesanan">Status Kotak</label>
                                                    <div class="col-sm-12">
                                                      <select class="form-control" name="status-kotak">
                                                        <option value="<?php echo $data_kotak->status_kotak?>" selected hidden><?php echo $data_kotak->status_kotak?></option>
                                                        <option value="Terpakai">Terpakai</option>
                                                        <option value="Tersedia">Tersedia</option>
                                                      </select>
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
                  <!--- END TAB DATA KOTAK DIPAKAI --->
                </div>
              
              
              
              
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Senjani Kitchen </span>
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

<style>
    .tab-pane{
        margin-top:1.5rem
    }
</style>

<script>
    $(document).ready(function() {
        $('#table-1').DataTable({});
        $('#table-2').DataTable({});
        $('#table-3').DataTable({});
    });
      
    function hapus_kotak(link){
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
  </script>
</body>

</html>
