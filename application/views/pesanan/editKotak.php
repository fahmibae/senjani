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
                  <form action="<?php echo site_url('c_pesanan/edit_aksi_pesanan/'.$data_kotak->id_kotak)?>" method="post" class="form-horizontal">
                    <input type="text" name="id-edit-kotak" class="d-none" readonly value="<?php echo $data_kotak->id_kotak?>">
                                                
                      <div class="form-group">
                        <label class="control-label" for="nama">Id Kotak</label>
                          <div class="col-sm-12">
                            <input type="text" readonl name="id-kotak" class="form-control" value="<?php echo $data_kotak->id_kotak?>">
                          </div>
                      </div>
                                              
                      <div class="form-group">
                        <label class="control-label" for="jenisPesanan">Status Kotak</label>
                         <div class="col-sm-12">
                           <select class="form-control" name="status-kotak"> 
                             <?php if($data_kotak->status_kotak=="Terpakai"){ 
                                echo "<option value='Terpakai' checked>Terpakai</option>
                                      <option value='Tersedia'>Tersedia</option>";
                                  }elseif($data_kotak->status_kotak=="Tersedia"){
                                echo "<option value='Tersedia' checked>Tersedia</option>
                                  <option value='Terpakai'>Terpakai</option>";
                                  } ?>
                            </select>
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

    
</body>

</html>
