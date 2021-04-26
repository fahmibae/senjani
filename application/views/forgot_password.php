<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Senjani kitchen</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary bg-login">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-12 col-lg-12 col-md-12">
          <br>
          <br>
          <br>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-1 d-none d-lg-block">
              </div>
              <div class="col-md-10">
                <div class="p-5">
                  <div class="text-center">
                  <img src="<?php echo base_url('assets/img/LogoSenjani.png')?>" width="280">
                </div>
                <br>
                  <div class="text-center">
                    <b><p class="h6 text-light-900 text-white mb-4 h1">Lupa <i>password</i> jika ingin mengganti <i>password</i> anda</p></b>
                    <?php 
                                $gagal = $this->session->flashdata('gagal');

                                if(!empty($gagal))
                                { ?>

                                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                                   
                               

                                <?php }

                                ?>

                  </div>
                  <form class="user" action="<?php echo site_url('c_forgot_password/check_email')?>" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Check
                    </button>
                    <br>
                    <center><i class="fa fa-arrow-left" style="color: #fff;"></i>&nbsp;<a href="<?php echo site_url('index/index') ?>" style="border-radius: 10%; color: #fff;">
                      Kembali
                  </a>
                </center>
                  </form>
                  <hr>
                </div>
              </div>
              <div class="col-md-1 d-none d-lg-block">
              </div>
            </div>
            
          </div>
        </div>

      </div>

    </div>

  </div>

  <style>
    
    .card{
        background: rgba(0,0,0,0.6);;
    }
    
    .container{
        width: 50%;
    }
  </style>
  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url ('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>

</body>

</html>
