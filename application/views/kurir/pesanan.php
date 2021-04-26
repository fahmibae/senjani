<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Daftar Pesanan</h1>

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

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <table id="tabel" class="table table-bordered">
		          	  <thead>
			            <tr>
                          <th>No Pesanan</th>
					      <th>Nama Pemesan</th>
                          <th>Kontak Pemesan</th>
		                  <th>Nama Menu</th>
                          <th>Tanggal Pesan</th>
		              	  <!-- <th>Status Pembayaran</th> -->
                          <th style="width:60px">Status Pengiriman</th>
                          <th style="width:60px">Aksi</th>
			            </tr>
			            </thead>
			          <tbody>
				          <?php $i = 1; foreach($pesanan as $data_pesanan) {?>
                  <tr>
                    <td><?php echo $i++."."?></td>
                    <td><?php echo $data_pesanan['nama_pemesan']?></td>
                    <td><?php echo $data_pesanan['kontak_pemesan']?></td>
                    <td><?php echo $data_pesanan['nama_menu']?></td>
                    <td><?php echo $data_pesanan['tanggal_pesanan']?></td>
                    <?php if($data_pesanan['status_pesanan'] == 'Diproses'){?>
                        <td><span class="badge badge-secondary badge-warning" style="font-size:14px"><?php echo $data_pesanan['status_pesanan']?></span></td>
                    <?php }else if($data_pesanan['status_pesanan'] == 'Dikirim'){?>
                        <td><span class="badge badge-secondary badge-info" style="font-size:14px"><?php echo $data_pesanan['status_pesanan'] ?></span></td>
                    <?php }else{?>
                        <td><span class="badge badge-secondary badge-success" style="font-size:14px"><?php echo $data_pesanan['status_pesanan']?></span></td>
                    <?php }?>
                    
                    <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $data_pesanan['id_pesanan']?>">
                          <i class="fa fa-pen" style="margin-right:5px"></i>Status
                        </button>
                    </td>
                                        
                    <div id="modalEdit<?php echo $data_pesanan['id_pesanan']?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo base_url('c_kurir/ubah_status')?>" method="post">
                              <?php 
                                $id_pesanan = $data_pesanan['id_pesanan'];
                                $data_pesan = $this->db->query("SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
                                foreach ($data_pesan->result_array() as $value) {
                               ?>
                                <input type="text" name="id-pesanan" class="d-none" value="<?php echo $data_pesanan['id_pesanan']?>">
                                <div class="form-group">
                                  <label class="control-label" for="jenisPesanan">Status Pesanan</label>
                                    <div class="col-sm-12">
                                      <select class="form-control" name="status" id="status">
                                        <?php if ($value['status_pesanan'] == "Diproses") {
                                        echo "<option value='Diproses' disable>Diproses</option>
                                        <option value='Dikirim'>Dikirim</option>
                                        <option value='Selesai'>Selesai</option>";
                                        }elseif ($value['status_pesanan'] == "Dikirim") { 
                                        echo "<option value='Dikirim' disable>Dikirim</option>
                                        <option value='Diproses'>Diproses</option>
                                        <option value='Selesai'>Selesai</option>";
                                        }elseif ($value['status_pesanan'] == "Selesai") { 
                                        echo "<option value='Selesai' disable>Selesai</option>
                                        <option value='Diproses'>Diproses</option>
                                        <option value='Dikirim'>Dikirim</option>";
                                        }?>
                                      </select>
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
                              <?php } ?>
	                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </tr>
                <?php } ?>
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

  
  <!-- Custom scripts for all pages-->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script> 
  
<script type="text/javascript">
 $(document).ready(function() {
    $('#tabel').DataTable();
    status = $('#status-sekarang').val();
    $('.'+status).attr('checked', 'checked');
  });
 
 function hapus_pesanan(link){
        swal({
          title: "Anda yakin ingin hapus data ini?",
          text: "Data akan dihapus secara permanen dari sistem",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = link;
          } 
        });
    }
</script>
</body>

</html>
