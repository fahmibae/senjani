<!DOCTYPE html>
<html lang="en">

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rekapitulasi Pesanan</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">keluaran bulan ini</div>
                      
                     <div class='h5 mb-0 font-weight-bold text-gray-800'><?php echo "Rp. " . number_format($total_pengeluaran,0,',','.'); ?></div>
                                   
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemasukkan bulan ini</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo "Rp. " . number_format($total_pemasukan,0,',','.'); ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pemprosesan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_proses + $total_proses1 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengiriman</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kirim + $total_kirim1 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penyelesaian</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_selesai + $total_selesai1 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pendapatan Perbulan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="linechart" height="300" width="600"></canvas>
                  </div>
                </div>
              </div>
            </div>
             <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-3">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pemesanan Terlaris</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="donutchart" width="500" height="500" ></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>


                    <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pendapatan Per Minggu</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="mylinechart" height="200" width="600"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pendapatan Per Hari</h6>
                </div>
                <!-- Card Body -->
                <div class='card-body'>
                  <div class='chart-area'>
                    <canvas id='mylinechart2' height='200' width='600'></canvas>
                  </div>
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

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/chart.js/chart.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/vendor/chart.js/chart.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/chart-data.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/chart-min.js'); ?>"></script>
  <!-- Bootstrap core JavaScript-->
  <?php 
    foreach ($hasil as $data) {
      $data_periode = Date('Y');
      $data_bulan[] = Date('F', strtotime($data->tanggal_masuk));
      $data_total[] = $data->total_pesanan;
    }
  ?>
<script type="text/javascript">
const CHART = document.getElementById("linechart");
console.log(CHART);
let linechart = new Chart(CHART, {
  type: 'line',
  data: data = {
    labels: <?php echo json_encode($data_bulan) ?>,
    datasets: [
    {
      label: <?php echo json_encode($data_periode) ?>,
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(75,192,192,0.4)",
      borderColor: "rgba(75,192,192,1)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "rgba(75,192,192,1)",
      pointBackgroundColor: "#fff",
      pointBorderWidth: 1,
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(75,192,192,1)",
      pointHoverBorderColor: "rgba(220,220,220,1)",
      pointHoverBorderWidth: 2,
      pointRadius: 1,
      pointHitRadius: 10,
      data: <?php echo json_encode($data_total) ?>,
    }
  ]
}
});
</script>
<?php 
    foreach ($hasil_mingguan as $data) {
      $data_periode_minggu = Date('W');
      $data_mingguan[] = Date('D', strtotime($data->tanggal_masuk));
      $data_total_mingguan[] = $data->total_pesanan_mingguan;
    }
  ?>
<script type="text/javascript">
var ctx = document.getElementById('mylinechart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($data_mingguan)?>,
        datasets: [{
            label: <?php echo json_encode('Pekan Ke-'. $data_periode_minggu) ?>,
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: <?php echo json_encode($data_total_mingguan) ?>,
        }]
    },
    legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

    // Configuration options go here
    options: {}
});
</script>
<?php 
    foreach ($hasil_terlaris as $data) {
      $data_makanan[] = $data->nama_menu;
      $data_total_terlaris[] = $data->total_terlaris;
      $check = json_encode($data_total_terlaris);
      $total = str_replace('"', '', $check);
    }
  ?>

<script type="text/javascript">
  var ctx = document.getElementById("donutchart").getContext("2d");
  var data = {
    labels: <?php echo json_encode($data_makanan) ?>,
    datasets: [
    {
      label: "Data Pemesanan Terlaris",
      data: <?php echo $total; ?>,
      backgroundColor: [
        '#1cc88a',
        '#36b9cc',
        '#e74a3b',
        '#f8f9fc',
        '#000000',
        '#f6c23e',
        '#000000'
      ]
    }]
  };
  var donutchart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: {responsive: true}
  });
</script>

<?php 
    foreach ($hasil_harian as $data) {
      $data_periode_hari = Date('F');
      $data_harian[] = Date('D', strtotime($data->tanggal_masuk));
      $data_total_harian[] = $data->total_pesanan_hari;
    }
  ?>
<script type="text/javascript">
var ctx = document.getElementById('mylinechart2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($data_harian)?>,
        datasets: [{
            label: <?php echo json_encode($data_periode_hari);?>,
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: <?php echo json_encode($data_total_harian) ?>,
        }]
    },
    legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

    // Configuration options go here
    options: {}
});
</script>


</body>

</html>
