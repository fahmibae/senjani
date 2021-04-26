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

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <table class="table table-bordered" id="table" cellspacing="0" width="100%">
		          	  <thead>
                          <th style="width:10px">No.</th>
        		          <th>Nama Lengkap</th>
                          <th>Gaji</th>
                          <th>Status Gaji</th>
		                  <th style="width:10px">Action</th>
			          </thead>
			          <tbody>
				            <?php $i = 1; foreach($kepegawaian as $data_kepegawaian) {?>
                          <tr>
                            <td><?php echo $i."."?></td>
                            <td><?php echo $data_kepegawaian->nama_pegawai?></td>
                            <td><?php echo number_format($data_kepegawaian->gaji)?></td>
                            <td><?php echo $data_kepegawaian->jabatan; ?></td>
                            <td>
                                <a href="<?php echo base_url('c_kepegawaian/info_gaji/'.$data_kepegawaian->id_kepegawaian);?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-info"></i>
                                  &nbsp;Info
                                </a>
                            </td>
                              
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
    $('#table').DataTable({});
      } );
  </script>
</body>

</html>
