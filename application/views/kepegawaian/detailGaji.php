<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php
        function tgl_indo($tanggal){
	        $bulan = array (
		        1 =>   'Januari',
		        'Februari',
		        'Maret',
		        'April',
		        'Mei',
		        'Juni',
		        'Juli',
		        'Agustus',
		        'September',
		        'Oktober',
		        'November',
		        'Desember'
	        );
	        $pecahkan = explode('-', $tanggal);
	        
	        // variabel pecahkan 0 = tanggal
	        // variabel pecahkan 1 = bulan
	        // variabel pecahkan 2 = tahun
         
	        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
  ?>
</head>

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Info Gaji Karyawan</h1>

          <div class="row">

            <div class="col-lg-6">
            
              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:150px">Nama Pegawai</th>
                        <td><?php echo $data_kepegawaian->nama_pegawai?></td>    
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?php echo $data_kepegawaian->jabatan?></td>    
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $data_kepegawaian->alamat?></td>    
                    </tr>
                    <tr>
                        <th>Nominal Gaji</th>
                        <td><?php echo "<b class='text-primary'> Rp ".number_format($data_kepegawaian->gaji)."</b>"?></td>    
                    </tr>
                </table>

                <div class="col-md-12">

                  <?php if($this->session->flashdata('tambah')): ?>
                    <?php if ($this->session->flashdata('tambah') == TRUE): ?>
                    <div class="alert alert-success">Berhasil Disimpan</div>
                  <?php elseif ($this->session->flashdata('tambah') == FALSE): ?>	
                      <div class="alert alert-danger">Gagal Disimpan</div>
                    <?php endif; ?>
                  <?php endif; ?>

                </div>  

                <?php 
                $berhasil = $this->session->flashdata('berhasil');
                  if(!empty($berhasil)) { ?>   
                    <div class='alert alert-success' role="alert"><?= $this->session->flashdata('berhasil','Berhasil Tersimpan'); ?></div>
                <?php } ?> 

                <?php 
                  $maaf = $this->session->flashdata('maaf');
                  if(!empty($maaf)){ ?>
                    <div class="alert bg-danger" role="alert" style="color:#fff;">  <?= $this->session->flashdata('maaf','maaf data sudah tersedia'); ?><a href="#" class="pull-right"></a></div>
                <?php } ?>

                <form method="post" id="form-user" action="<?php echo base_url('c_kepegawaian/tambah_gaji')?>" class="form-horizontal">
                  <input type="hidden" name="id_kepegawaian" id="id_kepegawaian" class="form_control" value="<?php echo $data_kepegawaian->id_kepegawaian ?>">                
                  <input type="hidden" name="bulan" id="bulan" class="form_control" value="<?php echo Date('F'); ?>">
                  <input type="hidden" name="tahun" id="tahun" class="form_control" value="<?php echo Date('Y'); ?>">
                  <input type="hidden" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form_control" value="<?php echo Date('Y-m-d') ?>">
                  <input type="hidden" name="gaji" id="gaji" class="form_control" value="<?php echo $data_kepegawaian->gaji ?>">

                  <right><button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                  </span></i><span class="text"> Tambah</span></button>
                  </right>
   
                </form>

                <hr class="separator">
                <table class="table table-bordered" id="table">
		          	  <thead>
                          <th style="width:10px">No.</th>
                          <th>Tahun</th>
                          <th>Bulan</th>
                          <th>Status Gaji</th>
                          <th>Tanggal pembayaran</th>
		                  <th style="width:80px">Action</th>
			          </thead>
			          <tbody>
			            <?php $i = 1; foreach($kepegawaian as $data_kepegawaian) {?>
                          <tr>
                            <td><?php echo $i."."?></td>
                            <td><?php echo $data_kepegawaian->tahun?></td>
                            <td><?php echo $data_kepegawaian->bulan?></td>
                            <td><?php if($data_kepegawaian->status == 'LUNAS'){echo "<b class='text-success'>LUNAS</b>";} else {echo "<b class='text-danger'>BELUM LUNAS</b>";}?></td>
                            <td><?php echo tgl_indo($data_kepegawaian->tanggal_pembayaran) ?></td>
                            <td align="center">
                                <?php if($data_kepegawaian->status == 'BELUM LUNAS'){?>
                                    <button data-toggle="modal" data-target="#modalEdit<?php echo $data_kepegawaian->id_gaji?>" class="btn btn-success btn-sm">BAYAR GAJI</button>
                                <?php }else{?>
                                    <button class="btn btn-sm">LUNAS</button>
                                <?php }?>


                                <div id="modalEdit<?php echo $data_kepegawaian->id_gaji ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                <br/>
                                
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-info"><p align="left">Konfirmasi data pembayaran gaji pegawai. jika ingin melakukan pembayaran tekan <b style="color: green;">Lanjutkan</b>, jika tidak maka anda dapat tekan <b style="color: red;">Batal</b></p></div>
                                <form action="<?php echo base_url('c_kepegawaian/bayar_gaji/'.$data_kepegawaian->id_gaji)?>" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="status" class="d-none" value="LUNAS">
                                    <input type="hidden" name="tanggal_pembayaran" class="d-none" value="<?php echo date('Y-m-d') ?>">
                                    <input type="hidden" name="nominal" class="d-none" value="<?php echo $data_kepegawaian->gaji ?>">
                                     
                                    <div class="modal-footer">  
                                      <button type="submit" class="btn btn-success btn-icon-split ">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Lanjutkan</span>
                                      </button>
                                      <button data-dismiss="modal" type="button" class="btn btn-danger btn-icon-split ">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-window-close"></i>
                                        </span>
                                        <span class="text">Batal</span>
                                      </button>
                                    </div>
                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>


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
    
    
   <style>
        .separator{
            border: none;
            height:5px;
            color: #e3e5e8;
            background-color: #e3e5e8;
        }
        
   </style>
     
   <script>
    $(document).ready(function() {
        $('#table').DataTable();
     });
      
    function bayar_gaji(id_gaji, id_kepegawaian){
        swal("Apakah Anda ingin membayar gaji karyawan ini?", {
          buttons: {
            cancel: "Batal",
            catch: {
              text: "Ya",
              value: "ya",
            }
          },
        })
        .then((value) => {
          switch (value) {
            case "ya":
              window.location = "<?php echo base_url('c_kepegawaian/bayar_gaji/"+id_gaji+"/"+id_kepegawaian+"')?>";
              break;
          }
        });

    }
    
  </script>
</body>

</html>
