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
          <h1 class="h3 mb-4 text-gray-800">Daftar Bahan</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->

              <div class="card shadow mb-4">
                <div class="table-responsive">
                <table id="tabel" width="100%" class="table table-bordered">
                  <thead>
                  <tr>
                          <th style="font-size: 11px; display: none;">No</th>
                          <th style="font-size: 11px;">No</th>
                          <th style="font-size: 11px;">Komoditas</th>
                          <th style="font-size: 11px;">Harga Periode I</th>
                          <th style="font-size: 11px;">Harga Periode II</th>
                          <th style="font-size: 11px;">Harga Periode III</th>
                          <th style="font-size: 11px;">Harga Periode IV</th>
                          <th style="font-size: 11px;">Harga Periode V</th>
                          <th style="font-size: 11px;">Harga Periode VI</th>
                         
                  </tr>
                  </thead>
                <tbody>
                  <?php $i = 1; foreach($tabel as $data) { ?>
                  <tr>
                          <td style="display: none;"><?php echo $i."."?></td>
                          <td><?php echo $data['name']?></td>
                          <td><?php echo $data['komoditas']?></td>
                          <td><?php echo $data['periode1']?></td>
                          <td><?php echo $data['periode2']?></td>
                          <td><?php echo $data['periode3']?></td>
                          <td><?php echo $data['periode4']?></td>
                          <td><?php echo $data['periode5']?></td>
                          <td><?php echo $data['periode6']?></td>
                  </tr>
                <?php $i++;} ?>
                </tbody>
              </table>
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


</body>

</html>
