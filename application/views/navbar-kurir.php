<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Senjani Kitchen</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">
  

  <!-- Core plugin JavaScript-->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
    
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

          <img src="<?php echo base_url('assets/img/LogoSenjani.png') ?>" width="90%" height="60" alt="" border="0" /></a>
      
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('c_kurir/dashboard')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKotak" aria-expanded="true" aria-controls="collapsePesanan">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Pesanan</span>
        </a>
        <div id="collapseKotak" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('c_kurir/pesanan_harian')?>">Pesanan Harian</a>
            <a class="collapse-item" href="<?php echo site_url('c_kurir/pesanan')?>">Pesanan Event</a>
          </div>
        </div>
      </li>
      
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('c_kurir/kotak')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Kotak</span></a>
      </li>
      
       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $this->session->userdata('email')?></b></span>
                <?php
                  $data_user = $this->db->query('SELECT kepegawaian.nama_pegawai, kepegawaian.ttl, kepegawaian.jenis_kelamin, kepegawaian.agama, kepegawaian.alamat, kepegawaian.jabatan, kepegawaian.telp FROM kepegawaian, user WHERE kepegawaian.id_kepegawaian="'.$this->session->userdata('id_kepegawaian').'" ORDER BY kepegawaian.nama_pegawai limit 1');
                    foreach ($data_user->result() as $user) { ?>
                      <?php if($user->jenis_kelamin=='Laki-laki') { ?>
                        <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/male.jpg'); ?>">
                      <?php }elseif($user->jenis_kelamin=='Perempuan'){ ?>
                        <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/female.jpg'); ?>">
                      <?php } ?>
                <?php } ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('c_user/profil_kurir')?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('index/logout')?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Logout Modal-->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika anda ingin keluar dari sistem.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <a class="btn btn-primary" href="<?php echo base_url('index/logout')?>">Logout</a>
                </div>
              </div>
            </div>
          </div>
       
       <!-- content javascript -->
      <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
      <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
      <script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
      <script src="<?php echo base_url ('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/index.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/sb-admin-2.js'); ?>"></script>

      <script>
        session = "<?php echo $this->session->userdata('action'); $this->session->set_userdata('action','');?>"
        
        alert_action(session);    
     
        function alert_action(session){
            switch(session){
                case 'tambah_data':
                    swal("Tambah data berhasil!", "Penambahan data berhasil dilakukan", "success");
                break;
                
                case 'edit_data':
                    swal("Edit data berhasil!", "Edit data berhasil dilakukan", "success");
                break;
                
                case 'hapus_data':
                    swal("Hapus data berhasil!", "Penghapusan data berhasil dilakukan", "success");
                break;
            }     
        }
    </script>
     
</body>

</html>
