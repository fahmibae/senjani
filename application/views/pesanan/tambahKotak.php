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
          <h1 class="h3 mb-4 text-gray-800">Tambah Kotak</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form method="post" action="<?php echo base_url('c_pesanan/tambah_aksi_kotak')?>" class="form-horizontal">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="jenisPesanan">Id Kotak :</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="id-kotak" required oninvalid="this.setCustomValidity('Id Kotak Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="KOTAK<?php echo sprintf("%05s", $id_kotak);?>" readonly id="id-kotak">
                      </div>
                    </div>
                    
                    <div class="modal-footer">	
		          	      <button class="btn btn-success btn-icon-split " type="submit">
                        <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Tambah</span>
                      </button>
                    </div>
	                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

</body>

</html>
