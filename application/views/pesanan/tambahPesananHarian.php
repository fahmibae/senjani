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
          <h1 class="h3 mb-4 text-gray-800">Tambah Pesanan Harian</h1>

          <div class="row">

            <div class="col-lg-6">
              <?php 
              $tanggal = $this->session->flashdata('error');
              if(!empty($tanggal)) { ?>

              <div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>  <?= $this->session->flashdata('error'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>   
              <?php } ?>
      

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form action="<?php echo base_url('c_pesanan_harian/tambah_aksi_pesanan')?>" method="post" id="form" class="form-horizontal">
                    <?php $date = Date("Ymd");?>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Id Pesanan</label>
                        <div class="col-sm-12">
                          <input type="text" readonly name="id-pesanan" required oninvalid="this.setCustomValidity('Id Pesanan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" value="PH-<?php echo substr($date, 0, 4) . substr($date, 5, 2) . substr($date,7, 2) . sprintf("%04s", $id_pesanan);?>">
                        </div>
                    </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Nama Pemesan</label>
				                <div class="col-sm-12">
				        	        <input type="text" name="nama-pemesan" required oninvalid="this.setCustomValidity('Nama pemesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control">
				                </div>
		            	  </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Kontak Pemesan</label>
				                <div class="col-sm-12">
				        	        <input type="text" required oninvalid="this.setCustomValidity('Kontak Pemesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="kontak-pesanan" class="form-control">
				                </div>
		            	  </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Alamat Pemesan</label>
                        <div class="col-sm-12">
                          <textarea class="form-control" rows="3" name="alamat" id="alamat" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Tanggal Pesanan</label>
                      <div class="col-sm-12">    
                          <input type="date" required oninvalid="this.setCustomValidity('Tanggal Pesanan Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeyup="date()" id="tanggal-pesanan" name="tanggal-pesanan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Status Pembayaran</label>
                        <div class="col-sm-12">
                          <select type="text" required oninvalid="this.setCustomValidity('Status pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="status-pembayaran" name="status-pembayaran" class="form-control">
                              <option value="LUNAS">LUNAS</option>
                              <option value="DP">DP</option>     
                          </select>
                        </div>
                    </div>
                    <br>
                    <h4> Menu pesanan</h4>
                    <hr>
                    <div class="form-group row" style="margin-right: 0rem; margin-left: 0rem">
                      <div class="col-md-6 mb-3 mb-sm-2">
                          <label class="control-label col-sm-5" for="nama">Pesanan Pagi</label>
                          <select class="form-control" name="menu-pagi" id="menu-pagi" required oninvalid="this.setCustomValidity('Menu Pesanan Pagi Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                          <option value="">Silahkan Pilih</option>
                          <?php $makanan1 = $this->db->query("SELECT * FROM makanan");
                          foreach ($makanan1->result() as $data1) { ?>
                          <option value="<?php echo $data1->nama_menu ?>"><?php echo $data1->nama_menu; ?></option>   
                          <?php } ?>
                          </select> 
                      </div>
                      <div class="col-md-6">
                        <label class="control-label col-sm-5" for="nama">Pesanan Sore</label>
                          <select class="form-control" name="menu-sore" id="menu-sore" required oninvalid="this.setCustomValidity('Menu Pesanan Sore Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                          <option value="">Silahkan Pilih</option>
                          <?php $makanan1 = $this->db->query("SELECT * FROM makanan");
                          foreach ($makanan1->result() as $data1) { ?>
                          <option value="<?php echo $data1->nama_menu ?>"><?php echo $data1->nama_menu; ?></option>   
                          <?php } ?>
                          </select>
                      </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0rem; margin-left: 0rem">
                      <div class="col-md-6 mb-3 mb-sm-0">
                          <input type="number" readonly name="harga-pagi" onfocus="hitung()" id="harga-pagi" class="form-control" required oninvalid="this.setCustomValidity('Menu Pesanan Sore Tidak Boleh Kosong')"  oninput="setCustomValidity('')"> 
                      </div>
                      <div class="col-md-6">
                          <input type="number" readonly name="harga-sore" onfocus="hitung()" id="harga-sore" class="form-control" required oninvalid="this.setCustomValidity('Menu Pesanan Sore Tidak Boleh Kosong')"  oninput="setCustomValidity('')"> 
                      </div>
                    </div>
                    <hr>
                    <br>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Total Harga</label>
                        <div class="col-sm-12">
                          <input type="number" required oninvalid="this.setCustomValidity('Total Harga Tidak Boleh Kosong')" oninput="setCustomValidity('')" onfocus="hitung()" name="total-harga" id="total-harga" class="form-control">
                        </div>
                    </div>
                    <div class="form-group pembayaran" style="display: none;">
                      <label class="control-label col-sm-2" for="nama">Pembayaran</label>
                        <div class="col-sm-12">
                          <input type="number" onkeyup="hitung()" value="0" required oninvalid="this.setCustomValidity('Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" style="display: none;" name="pembayaran" class="form-control" id="pembayaran">
                        </div>
                    </div>
                    <div class="form-group sisa" style="display: none;">
                      <label class="control-label col-sm-2" for="nama">Sisa Pembayaran</label>
                        <div class="col-sm-12">
                          <input type="number" required oninvalid="this.setCustomValidity('Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" style="display: none;" name="sisa" class="form-control" id="sisa">
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
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#menu-pagi').on('input',function(){
      var nama_menu=$(this).val();
      $.ajax({
        type     : "POST",
        url      : "<?php echo base_url('index.php/c_pesanan_harian/proses_tambah_pagi')?>",
        dataType : "JSON",
        data     : {nama_menu : nama_menu},
        cache    : false,
        success  : function(data){
          $.each(data, function(nama_menu, harga){
            $('[name="harga-pagi"]').val(data.harga);
          });
        } 
      });
      return false;
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
    $('#menu-sore').on('input',function(){
      var nama_menu=$(this).val();
      $.ajax({
        type     : "POST",
        url      : "<?php echo base_url('index.php/c_pesanan_harian/proses_tambah_sore')?>",
        dataType : "JSON",
        data     : {nama_menu : nama_menu},
        cache    : false,
        success  : function(data){
          $.each(data, function(nama_menu, harga){
            $('[name="harga-sore"]').val(data.harga);
          });
        } 
      });
      return false;
    });
  });
</script>

<script type="text/javascript"> 

function hitung() { 
  var harga_pagi   = document.getElementById('harga-pagi').value; 
  var harga_sore   = document.getElementById('harga-sore').value;
  var bayar        = document.getElementById('pembayaran').value;
  var total        = parseInt(harga_pagi) + parseInt(harga_sore) * 14;

  if ( !isNaN(total)){
    total_harga = document.getElementById('total-harga').value = total;
  }

  var sisa   = parseInt(total_harga) - parseInt(bayar);

  if ( !isNaN(sisa)){
    sisa_bayar = document.getElementById('sisa').value = sisa;
  }
 
}
</script>

<script type="text/javascript">
  $(function(){
    $("#status-pembayaran").change(function(){
        if($(this).val() == "DP"){
          $(".pembayaran").show();
          $("#pembayaran").show();
          $(".sisa").show();
          $("#sisa").show();
        }else{
          $(".pembayaran").hide();
          $("#pembayaran").hide();
          $(".sisa").hide();
          $("#sisa").hide();
        }  
    });
  });
</script>

<!--<script type="text/javascript">
function showTime(){
    var hari  = new Date();
    var jam   = hari.getHours();
    var menit = hari.getMinutes();
    var detik = hari.getSeconds();

    jam   = checkTime(jam);
    menit = checkTime(menit);
    detik = checkTime(detik);

    document.getElementById('tanggal-pesanan').value = jam + ":" + menit + ":" + detik;
  }
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  
</script>-->


</body>

</html>
