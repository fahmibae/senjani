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
          <h1 class="h3 mb-4 text-gray-800">Tambah Karyawan</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form method="post" id="form-user" action="<?php echo base_url('c_kepegawaian/tambah_aksi')?>" class="form-horizontal">
                    <div id="form-personal-information">
                        <div class="form-group">
				                  <label class="control-label col-sm-2" for="nama">Nama Lengkap </label>
				                    <div class="col-sm-12">
				            	        <input type="text" name="nama-karyawan" class="form-control">
				                    </div>
		                	  </div>
                        <div class="form-group">
				                  <label class="control-label col-sm-3" for="nama">Tempat, Tanggal lahir </label>
				                    <div class="col-sm-12">
				            	        <input type="text" name="ttl-karyawan" class="form-control">
				                    </div>
		                	  </div>
                        <div class="form-group">
				                  <label class="control-label col-sm-2" for="jenisMenu">Jenis Kelamin </label>
                            <div class="col-sm-12">
                              <select class="form-control" name="kelamin-karyawan" id="jenisMenu">
                                <option>Laki - laki</option>
                                <option>Perempuan</option>
                              </select>
				                    </div>
		                	  </div>
                        <div class="form-group">
				                  <label class="control-label col-sm-2" for="nama">Agama </label>
				                    <div class="col-sm-12">
				            	        <input type="text" name="agama-karyawan" class="form-control">
				                    </div>
		                	  </div>
                        <div class="form-group">
				                  <label class="control-label col-sm-2" for="nama">Alamat </label>
				                    <div class="col-sm-12">
				            	        <input type="text" name="alamat-karyawan" class="form-control">
				                    </div>
		                	  </div>
			                  <div class="form-group">
			              	      <label class="control-label col-sm-2" for="harga">Telepon </label>
			                    	  <div class="col-sm-12">
			            		          <input type="text" name="telp-karyawan" class="form-control" id="harga" onkeypress="return isNumber(event)">
			              	        </div>
		              	    </div>
		              	</div>
		              	
		              	<div id="user-login-information" class="d-none">
		              	
                            <div class="form-group">
                                  <div class="form-group">
				                      <label class="control-label col-sm-2" for="nama">Jabatan </label>
				                        <div class="col-sm-12">
				                	        <select type="text" name="jabatan-karyawan" class="form-control">
				                	            <option value="Admin">Admin</option>
				                	            <option value="Personel">Personel</option>
				                	            <option value="Kurir">Kurir</option>    
				                	        </select>
				                        </div>
		                    	  </div>
    	                          <div class="form-group">
				                      <label class="control-label col-sm-2" for="nama">Gaji Bulanan (Rp)</label>
				                        <div class="col-sm-12">
				                	        <input type="text" name="gaji" class="form-control" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency">
				                        </div>
		                    	  </div>
				                  <label class="control-label col-md-12" for="username">E-mail<span class="text-success">&nbsp;(Username & password ini akan digunakan karyawan untuk login sistem)</span></label>
				                    <div class="col-sm-12">
				            	        <input type="email" name="email" class="form-control">
				            	        
				                    </div>
		                	  </div>
                            <div class="form-group">
				                  <label class="control-label col-sm-2" for="password">Password </label>
				                    <div class="col-sm-12  form-inline">
				            	        <input type="text" name="password" id="password" class="form-control">
				            	        <button class="btn btn-info" type="button" style="margin-left:10px;" onclick="generate_password()"><i class="fa fa-cog" style="margin-right:5px;"></i>Generate Password</button>
				                    </div>
		                	  </div>
		              	</div>		
                    <div class="modal-footer">
	          	    <button type="button" class="btn btn-warning btn-icon-split d-none" onclick="prev_form()">
                        <span class="icon text-white-50">
                          <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Sebelumnya</span>
                      </button>
                      	
		          	    <button type="button" class="btn btn-success btn-icon-split" onclick="next_form()">
                        <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text" id="btn-submit">Berikutnya</span>
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

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        
        function next_form(){
            if($('#btn-submit').text() == 'Simpan'){
                $('#form-user').submit();
            }else{
                $('#form-personal-information').addClass('d-none');
                $('#user-login-information').removeClass('d-none');
                $('#btn-submit').text('Simpan');
                $('.btn-warning').removeClass('d-none');                
            }                 
        }
        
        function prev_form(){
                $('#user-login-information').addClass('d-none');
                $('#form-personal-information').removeClass('d-none');
                $('.btn-warning').addClass('d-none');
                $('#btn-submit').text('Berikutnya');
        }
        
        function generate_password(){
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	        var string_length = 5;
	        var randomstring = '';
	        for (var i=0; i<string_length; i++) {
		        var rnum = Math.floor(Math.random() * chars.length);
		        randomstring += chars.substring(rnum,rnum+1);
	        }
	        $('#password').val(randomstring);
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
