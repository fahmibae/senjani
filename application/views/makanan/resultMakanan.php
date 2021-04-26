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
          <div class="row">
            <div class="col-md-6">
                <h1 class="h3 mb-4 text-gray-800">Daftar Menu</h1>
            </div>

            <div class="col-md-3">
              <!-- Topbar Search -->
              <?php echo form_open('c_makanan/sortir_down', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
                    <div class="input-group">
                      <input type="hidden" id="keyword" name="keyword" class="form-control bg-white border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="terendah">
                      <div class="input-group">
                        <button class="btn btn-primary" id="search" type="submit">
                          <i class="fas fa-arrow-down fa-sm"></i>
                        </button>
                      </div>
                    </div>
              <?php echo form_close() ?>
              <?php echo form_open('c_makanan/sortir_up', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
                    <div class="input-group">
                      <input type="hidden" id="keyword" name="keyword" class="form-control bg-white border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="tertinggi">
                      <div class="input-group">
                        <button class="btn btn-primary" id="search" type="submit">
                          <i class="fas fa-arrow-up fa-sm"></i>
                        </button>
                      </div>
                    </div>
              <?php echo form_close() ?>
            </div>

            <div class="col-md-3">
              <!-- Topbar Search -->
              <?php echo form_open('c_makanan/search', array('class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right', 'role' => 'search'))  ?>
                    <div class="input-group">
                      <input type="text" id="keyword" name="keyword" class="form-control bg-white border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" id="search" type="submit">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                        
                      </div>
                    </div>
                  <?php echo form_close() ?>
            </div>
          </div>

                    <div class="row">

            <div class="col-lg-6">
                  <?php 
                  $i = 1; foreach($makanan as $data_makanan) { ?>

              <div class="card shadow mb-4" id="<?php echo str_replace(" ", "", $data_makanan->nama_menu)?>">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary float-left"><?php echo $data_makanan->nama_menu?></h6>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <img src="<?php echo base_url($data_makanan->foto)?>" class="img-deskripsi" align="left">
                        </div>
                        <div class="col-md-7">
                          <p class="text-justify"><?php echo $data_makanan->deskripsi?></p><br>
                        </div>
                        <div class="col-md-2">
                          <h6 class="row justify-content-end float-right font-weight-bold"><?php echo 'Rp. '.number_format($data_makanan->harga , 2 )?></h6> 
                        </div>
                      </div>

                      <button data-toggle="modal" data-target="#modalEdit<?php echo $data_makanan->id_makanan?>" class="btn btn-success btn-icon-split btn-menu">
                        <span class="icon text-white-50">
                          <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Edit</span>
                      </button>
                        
                        
                      <a href="<?php echo base_url('c_makanan/delete_aksi/'.$data_makanan->id_makanan);?>" onclick="return confirm('Apakah anda yakin ingin menghapus.?')" class="btn btn-danger btn-icon-split btn-hapus btn-menu">
                        <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                      </a>
                      <!-- Circle Buttons (Default) -->
                    </div>
                  </div>
                  
                  
                    <div id="modalEdit<?php echo $data_makanan->id_makanan ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="<?php echo base_url('c_makanan/edit_aksi_menu')?>" enctype="multipart/form-data" method="post">
                                    <input type="text" name="id-menu" class="d-none" value="<?php echo $data_makanan->id_makanan?>">
                                    <div class="form-group">
                                    <label class="control-label " for="jenisMenu">Kategori Menu</label>
                                        <div class="col-sm-12">
                                          <select class="form-control" name="kategori-menu" id="jenisMenu">
                                            <option value="<?php echo $data_makanan->kategori?>" selected hidden><?php echo $data_makanan->kategori?></option>
                                            <option>Makanan</option>
                                            <option>Minuman</option>
                                            <option>Dessert</option>
                                          </select>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label " for="nama">Nama Menu</label>
                                    <div class="col-sm-12">
                                      <input type="text" name="nama-menu" class="form-control" value="<?php echo $data_makanan->nama_menu?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label " for="harga">Harga</label>
                                      <div class="col-sm-12">
                                        <input type="text" name="harga-menu" class="form-control" id="harga" value="<?php echo $data_makanan->harga?>">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="control-label " for="deskripsiMenu">Deskripsi Menu</label>
                                      <div class="col-sm-12">
                                            <textarea type="text" name="deskripsi-menu" class="form-control" cols="40" rows="5" id="deskripsiMenu" ><?php echo $data_makanan->deskripsi?></textarea>
                                    </div>
                                  </div>
                                 <div class="form-group">
                                  <label class="control-label " for="deskripsiMenu">Foto Makanan</label>
                                    <div class="col-md-12">
                                      <img src="<?php echo base_url($data_makanan->foto) ?>" width="100">
                                    </div>
                                    <div class="col-md-12">
                                      <input class="form-control" readonly value="<?php echo $data_makanan->foto ?>" id="foto" name="foto">
                                    </div>

                                 </div>

                                    <div class="form-group">
                                        <input type="hidden" name="foto-menu-prev" value="<?php echo $data_makanan->foto?>">
                                      <label class="control-label " for="deskripsiMenu">Upload Foto</label>
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
                                        <span class="text">Simpan</span>
                                      </button>
                                    </div>
                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>
                  
                  <?php $i++;} ?>

        </div>
      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Senjani Kitchen 2019</span>
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
  
  <style>
    .btn-hapus{
        bottom: 0;
    }
    
    .btn-menu{
        position: relative !important;
        float: right;
    }
    
    .card-body{
        padding-bottom: 0px !important;
    }
  </style>
  
</body>

</html>
