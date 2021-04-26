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
          <h1 class="h3 mb-4 text-gray-800">Tambah Transaksi</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form method="post" action="<?php echo base_url('c_keuangan/tambah_aksi')?>" class="form-horizontal">
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="jenisPesanan">Jenis Transaksi :</label>
                        <div class="col-sm-12">
                          <select class="form-control" name="jenis-transaksi" id="jenisPesanan">
                            <option>Pengeluaran</option>
                            <option>Pemasukan</option>
                          </select>
				                </div>
		            	  </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Deskripsi :</label>
                      <div class="col-sm-12">
				                <select class="form-control" name="deskripsi" id="deskripsi">
                            <option>Pemasukan lain-lain</option>
                            <option>Pembelian aset</option>
                            <option>Pembelian bahan-bahan</option>
                          </select>
                        </div>
		            	  </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Nominal :</label>
				                <div class="col-sm-12">
				        	        <input type="number" name="nominal-transaksi" class="form-control">
				                </div>
		            	  </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Tanggal Masuk :</label>
                        <div class="col-sm-12">
                          <input type="date" name="tanggal-masuk" id="tanggal-masuk" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">	
		          	      <button type="submit" class="btn btn-success btn-icon-split ">
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
    $('#nama-pemesan').on('input',function(){
      var nama_pemesan=$(this).val();
      $.ajax({
        type     : "POST",
        url      : "<?php echo base_url('index.php/c_keuangan/proses_tambah')?>",
        dataType : "JSON",
        data     : {nama_pemesan : nama_pemesan},
        cache    : false,
        success  : function(data){
          $.each(data, function(nama_pemesan, harga){
            $('[name="nominal-transaksi"]').val(data.harga);
          });
        } 
      });
      return false;
    });
  });
</script>
