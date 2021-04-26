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
          <?php $pegawai = $this->db->query('SELECT * FROM kepegawaian WHERE id_kepegawaian="'.$this->session->userdata('id_kepegawaian').'"');
          foreach ($pegawai->result() as $value) { ?>
          <h1 class="h3 mb-4 text-gray-800">Info Gaji <b style="color: red;"><?= $value->nama_pegawai ?></b></h1>
          <?php } ?>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <table class="table table-bordered">
                  <?php 
                    $data_pegawai = $this->db->query('SELECT kepegawaian.id_kepegawaian, user.id_kepegawaian, kepegawaian.nama_pegawai, kepegawaian.jabatan, kepegawaian.alamat, kepegawaian.gaji FROM kepegawaian, user WHERE kepegawaian.id_kepegawaian="'.$this->session->userdata('id_kepegawaian').'"');
                    foreach ($data_pegawai->result() as $data) { ?>
                    <tr>
                        <th style="width:150px">Nama Pegawai</th>
                        <td><?php echo $data->nama_pegawai?></td>    
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?php echo $data->jabatan?></td>    
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $data->alamat?></td>    
                    </tr>
                    <tr>
                        <th>Nominal Gaji</th>
                        <td><?php echo "<b class='text-primary'> Rp ".number_format($data->gaji)."</b>"?></td>    
                    </tr>
                    <?php break; } ?>
                </table>

                <hr class="separator">
                <table class="table table-bordered" id="table">
		          	  <thead>
                          <th style="width:10px">No.</th>
                          <th>Tahun</th>
                          <th>Bulan</th>
                          <th>Status Gaji</th>
                          <th>Tanggal pembayaran</th>
			          </thead>
			          <tbody>

			            <?php $i = 1;
                  $data_gaji = $this->db->query('SELECT gaji_pegawai.tahun, gaji_pegawai.bulan, gaji_pegawai.status, gaji_pegawai.tanggal_pembayaran, gaji_pegawai.id_kepegawaian, user.id_kepegawaian, kepegawaian.id_kepegawaian FROM gaji_pegawai, user, kepegawaian WHERE gaji_pegawai.id_kepegawaian="'.$this->session->userdata('id_kepegawaian').'" AND kepegawaian.id_kepegawaian="'.$this->session->userdata('id_kepegawaian').'" GROUP BY gaji_pegawai.id_kepegawaian');
                    foreach($data_gaji->result() as $data_kepegawaian) {?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $data_kepegawaian->tahun?></td>
                            <td><?php echo $data_kepegawaian->bulan?></td>
                            <td><?php if($data_kepegawaian->status == 'LUNAS'){echo "<b class='text-success'>LUNAS</b>";} else {echo "<b class='text-danger'>BELUM LUNAS</b>";}?></td>
                            <td><?php echo tgl_indo($data_kepegawaian->tanggal_pembayaran) ?></td>
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
