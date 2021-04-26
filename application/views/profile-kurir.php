<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Profile</h1>

          <div class="col-md-12">
          <?php if($this->session->flashdata('edit')): ?>
		 	        <?php if ($this->session->flashdata('edit') == TRUE): ?>
		 		       <div class="alert alert-success">Berhasil Diedit</div>
		 	      <?php elseif ($this->session->flashdata('edit') == FALSE): ?>	
		 		        <div class="alert alert-danger">Gagal Diedit</div>
		 	        <?php endif; ?>
            <?php endif; ?>
          </div>


          <div class="row">

            <div class="col-lg-6">
              <?php foreach($profil as $data_profil){?>
              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url('c_user/edit_data')?>">
                <table class="table table-bordered">
                  
		          <tr>
                    <th style="color: blue">Email</th>
		            <td><input class="form-control" type="email" name="email" readonly="readonly" value="<?php echo $data_profil->email ?>"></td>
		          </tr>
		          
		          
		            <input class="form-control" name="password" type="hidden" readonly="readonly" value="<?php echo $data_profil->password ?>">
		          
		          
		          <tr>
                    <th style="color: blue">Nama Lengkap</th>
		            <td><input class="form-control" name="nama" value="<?php echo $data_profil->nama_pegawai ?>"></td>
		          </tr>
                  
                  <tr>
                    <th style="color: blue">Alamat</th>
		            <td><input class="form-control" name="alamat" value="<?php echo $data_profil->alamat ?>"></td>
		          </tr>
		          
		          <tr>
                    <th style="color: blue">No. Telepon</th>
		            <td><input class="form-control" name="telepon" value="<?php echo $data_profil->telp ?>"></td>
		          </tr>

              <tr>
                    <th style="color: blue">URL File</th>
                <td><input type="text" name="cv-prev" class="form-control" value="<?php echo $data_profil->file_cv ?>" readonly="readonly"></td>
              </tr>
		          
                  <tr>
                    <th style="color: blue">Upload CV</th>
			          <th>
                      <div class="btn btn-primary">
                        <input type="file" id="cv" name="cv"><i class="fa fa-upload"></i> Upload
                      </div>
                    </th>
		          </tr>
		          
                  <tr>
                    <th style="color: blue">Download CV</th>
			          <th>
			          
			          <?php if($data_profil->file_cv == ''){?>
			            <p class="text-danger">Anda belum mengunggah CV</p>  
			          <?php } else {?>
                      
                        <a href='<?php echo base_url('c_user/download_cv/?cv_download='.$data_profil->file_cv);?>' style="color: green"><i class="fa fa-file" style="margin-right: 5px"></i>Download file</a>
                      
                      <?php } ?>
                    </th>
	              </tr>
	              
	              <?php } ?>
            </table>
                <div class="modal-footer">	       	  
	          	  <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-pen"></i>
                    </span>
                    <span id="btn-edit-teks" class="text">Edit</span>
                  </button>
                </div>
              </form>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  
  
</body>

</html>
