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
          <h1 class="h3 mb-4 text-gray-800">Daftar Transaksi</h1>
          
          <div class="row">

          <div class="col-md-12">
          
            <?php if($this->session->flashdata('tambah')): ?>
		 	        <?php if ($this->session->flashdata('tambah') == TRUE): ?>
		 		       <div class="alert alert-success">Berhasil Disimpan</div>
		 	      <?php elseif ($this->session->flashdata('tambah') == FALSE): ?>	
		 		        <div class="alert alert-danger">Gagal Disimpan</div>
		 	        <?php endif; ?>
            <?php endif; ?>

          
          </div>

            
            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" id="table" width="100%">
		          	<thead>
                  <tr>
                  <th style="width:1%">No.</th>
                  <th>Id Transaksi</th>
					        <th>Jenis Transaksi</th>
                  <th>Nama Pemesan</th>
					        <th>Nominal</th>
                  <th>Tanggal Masuk</th>
					        <th style="width:100px">Action</th>
                  </tr>
			           </thead>
			          <tbody>
				          <?php $i = 1; foreach($keuangan as $data_keuangan) {?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_keuangan->id_transaksi?></td>
                    <td><?php echo $data_keuangan->jenis_transaksi?></td>
                    <td><?php echo $data_keuangan->nama_pemesan?></td>
                    <td><?php echo "Rp. ".number_format($data_keuangan->nominal, 2)?></td>
                    <td><?php echo $data_keuangan->tanggal_masuk?></td>
                    <td>
                        <button class="btn btn-danger btn-sm">
                          Hapus
                        </button>
                        <button class="btn btn-success btn-sm">
                          Edit
                        </button>
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
      
    function cari_data(){
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        
        $('#example').DataTable( {
            "ajax": "<?php echo base_url('c_keuangan/get_json_keuangan')?>/"+bulan+"/"+tahun,
            "columns": [
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]
        });
        
    }
  </script>
</body>

</html>
