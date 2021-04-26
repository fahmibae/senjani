<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
</head>
<style>
    .tab-pane{
        margin-top:1.5rem
    }
</style>


<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Daftar Kotak Makanan</h1>

          <div class="row">

          <?php if($this->session->flashdata('edit')): ?>
		 	        <?php if ($this->session->flashdata('edit') == TRUE): ?>
		 		       <div class="alert alert-success">Berhasil Diedit</div>
		 	      <?php elseif ($this->session->flashdata('edit') == FALSE): ?>	
		 		        <div class="alert alert-danger">Gagal Diedit</div>
		 	        <?php endif; ?>
            <?php endif; ?>

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="table-responsive">
                  <table id="table" width="100%" class="table table-bordered">
		                  	  <thead>
                                  <th style="width:1px;">No.</th>
                                  <th>ID Kotak</th>
                                  <th>Status Kotak</th>
                                  <th style="width:50px">Action</th>
			                  </thead>
			                  <tbody>
                          <?php $i = 1; foreach($kotak as $data_kotak) {?>
			                  <tr>
                                <td><?php echo $i."."?></td>
                                <td><?php echo $data_kotak->id_kotak?></td>
                                <td><?php echo $data_kotak->status_kotak?></td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $data_kotak->id_kotak?>"><i class="fa fa-pen" style="margin-right:5px"></i>
                                      Edit
                                    </button>
                                 </td>
                                 
                                 <div id="modalEdit<?php echo $data_kotak->id_kotak?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status Kotak</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="<?php echo base_url('c_kurir/ubah_status_kotak')?>" method="post">
                                                <input type="text" name="id-edit-kotak" class="d-none" value="<?php echo $data_kotak->id_kotak?>">
                                        	    
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                      <select class="form-control" name="status-kotak">
                                                        <?php 
                                                          $id_kotak = $data_kotak->id_kotak;
                                                          $status = $this->db->query("select * from kotak where id_kotak='$id_kotak'");
                                                          foreach ($status->result() as $value) {
                                                            if($value->status_kotak == "Terpakai"){
                                                        echo"
                                                        <option value='Terpakai' disable>Terpakai</option>
                                                        <option value='Tersedia'>Tersedia</option>";
                                                       }elseif($value->status_kotak == "Tersedia"){
                                                        echo"
                                                        <option value='Tersedia' disable>Tersedia</option>
                                                        <option value='Terpakai'>Terpakai</option>";
                                                       }} ?>
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

<script>
    $(document).ready(function() {
    $('#table').DataTable({});
      } );
  </script>
</body>

</html>
