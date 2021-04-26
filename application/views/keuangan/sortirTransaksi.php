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

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
              <div class="loader" style="text-align: center"></div>
              <br>
                <div id="hasil">
               <form class="form-inline" method="POST" action="<?php echo site_url('c_sortir/cari') ?>">
                  <label class="sr-only" for="inlineFormInputName2">Bulan</label>
                  <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" required oninvalid="this.setCustomValidity('Tanggal Awal Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                  <div class="col-sm-1" style="text-align: center">
                  <h6>Sampai</h6>
                  </div>
                  <label class="sr-only" for="inlineFormInputGroupUsername2">Tahun</label>
                  <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required oninvalid="this.setCustomValidity('Tanggal Akhir Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                  <div class="col-md-4">
                  <button type="submit" id="check" class="btn btn-success btn-icon-split" style="width: 80px; height: 36px;"><span class="icon text-white-50"><i class="fas fa-search"></i><span class="text">Check</span></button>
                  </div>
                </form>
               </div>
               <br>
               <div id="result"></div>
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

  <script type="text/javascript">
    $(function(){
        $("#check").click(function() {
            var $form = $('#hasil').find('form'),
                $tanggal_awal = $("#tanggal_awal").val(),
                $tanggal_akhir = $("#tanggal_akhir").val(),
                $url = $form.attr('action');
            $.ajax({
                type: "POST",
                url: $url,
                dataType: "html",
                data: "tanggal_awal="+$tanggal_awal+"&tanggal_akhir="+$tanggal_akhir,
                cache:false,
                success: function(data){
                    $(".loader").fadeIn(500).fadeOut(500).queue(function(){
                        $('#result').html(data);
                    });
                }
            });
            return false;
        });
    });
</script>

</body>

</html>
