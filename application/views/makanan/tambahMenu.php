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
          <h1 class="h3 mb-4 text-gray-800">Tambah Menu</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form action="<?php echo base_url('c_makanan/tambah_aksi')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
		                <label class="control-label col-sm-2" for="jenisMenu">Kategori Menu</label>
                        <div class="col-sm-12">
                          <select class="form-control" name="kategori-menu" id="jenisMenu">
                            <option>Makanan</option>
                            <option>Minuman</option>
                            <option>Dessert</option>
                          </select>
                        </div>
            	    </div>
            	    <div class="form-group">
		                <label class="control-label col-sm-2" for="nama">Nama Menu</label>
		                <div class="col-sm-12">
		        	        <input type="text" name="nama-menu" class="form-control">
		                </div>
            	    </div>
	                <div class="form-group">
	          	        <label class="control-label col-sm-2" for="harga">Harga</label>
	                	  <div class="col-sm-12">
	        		          <input type="text" name="harga-menu" class="form-control" id="harga">
	          	        </div>
	          	    </div>
                    <div class="form-group">
		          	      <label class="control-label col-sm-2" for="deskripsiMenu">Deskripsi Menu</label>
	                	  <div class="col-sm-12">
                            <textarea type="text" name="deskripsi-menu" class="form-control" cols="40" rows="5" id="deskripsiMenu"></textarea>
			          	  </div>
	          	    </div>	
                    <div class="form-group">
	          	        <label class="control-label col-sm-2" for="deskripsiMenu">Upload Foto</label>
	                	<div class="col-sm-12">
                          <div class="btn btn-primary">
                            <input type="file" name="upload-menu"><i class="fa fa-upload"></i> Upload Foto
                          </div>
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
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>
