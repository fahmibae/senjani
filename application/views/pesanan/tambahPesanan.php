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
          <h1 class="h3 mb-4 text-gray-800">Tambah Pesanan</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <form action="<?php echo base_url('c_pesanan/tambah_aksi_pesanan')?>" method="post" class="form-horizontal">
                    <?php $date = Date("Ymd");?>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Id Pesanan</label>
                        <div class="col-sm-12">
                          <input type="text" readonly name="id-pesanan" required oninvalid="this.setCustomValidity('Id Pesanan Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" value="PS-<?php echo substr($date, 0, 4) . substr($date, 5, 2) . substr($date,7, 2) . sprintf("%04s", $id_pesanan);?>">
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
				              <label class="control-label col-sm-2" for="nama">Nama Menu</label>
				                <div class="col-sm-12">
                          <select name="nama-pesanan" id="nama-pesanan" required oninvalid="this.setCustomValidity('Nama pesanan tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control">
                            <option value="">Silahkan pilih</option>
                            <?php 
                                $sql = $this->db->query("select * from makanan");
                                foreach ($sql->result() as $data) {
                            ?>
                            <option value="<?php echo $data->nama_menu ?>"><?php echo $data->nama_menu ?></option>
                          <?php } ?>
                          </select>
				                </div>
		            	  </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Status Pembayaran</label>
				                <div class="col-sm-12">
				        	        <select type="text" id="status-pembayaran" name="status-pembayaran" class="form-control">
				        	            <option value="LUNAS">LUNAS</option>
                              <option value="DP">DP</option>     
				        	        </select>
				                </div>
		            	  </div>
                    <div class="form-group">
				              <label class="control-label col-sm-2" for="nama">Tanggal Pesan</label>
				                <div class="col-md-12">
				        	        <input type="date" required oninvalid="this.setCustomValidity('Tanggal Pesan Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="tanggal-pesanan" name="tanggal-pesanan" class="form-control">
				                </div>
		            	  </div>
			              <div class="form-group">
			          	      <label class="control-label col-sm-2" for="harga">Harga</label>
			                	  <div class="col-sm-12">
			        		          <input type="number" onkeyup="hitung()" name="harga-pesanan" class="form-control" id="harga" required oninvalid="this.setCustomValidity('Harga Tidak Boleh Kosong')" oninput="setCustomValidity('')" onkeypress="return isNumber(event)">
			          	        </div>
		          	    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Kuantitas</label>
                        <div class="col-sm-12">
                          <input type="number" onkeyup="hitung()" id="qty" required oninvalid="this.setCustomValidity('Kuantitas Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="qty" class="form-control">
                        </div>
                    </div>	
                    
                    <div class="form-group pembayaran" style="display: none;">
                      <label class="control-label col-sm-2" for="nama">Pembayaran</label>
                        <div class="col-sm-12">
                          <input type="number" style="display: none;" id="pembayaran" required oninvalid="this.setCustomValidity('Pembayaran Tidak Boleh Kosong')" value="0" oninput="setCustomValidity('')" onkeyup="hitung()" name="pembayaran" class="form-control">
                        </div>
                    </div>
                    <div class="form-group sisa" style="display: none;">
                      <label class="control-label col-sm-2" for="nama">Sisa</label>
                        <div class="col-sm-12">
                          <input type="number" required oninvalid="this.setCustomValidity('Sisa Pembayaran Tidak Boleh Kosong')" oninput="setCustomValidity('')" style="display: none;" id="sisa" name="sisa" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Total Harga</label>
                        <div class="col-sm-12">
                          <input type="number" required oninvalid="this.setCustomValidity('Total Harga Tidak Boleh Kosong')" oninput="setCustomValidity('')" id="total-harga" name="total-harga" class="form-control">
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
    $('#nama-pesanan').on('input',function(){
      var nama_menu=$(this).val();
      $.ajax({
        type     : "POST",
        url      : "<?php echo base_url('index.php/c_pesanan/proses_tambah')?>",
        dataType : "JSON",
        data     : {nama_menu : nama_menu},
        cache    : false,
        success  : function(data){
          $.each(data, function(nama_menu, harga){
            $('[name="harga-pesanan"]').val(data.harga);
          });
        } 
      });
      return false;
    });
  });
</script>

<script type="text/javascript"> 

function hitung() { 
  var harga   = document.getElementById('harga').value; 
  var qty     = document.getElementById('qty').value;
  var bayar   = document.getElementById('pembayaran').value;
  var total   = parseInt(harga) * parseInt(qty);

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
