<table class="table table-bordered" cellspacing="0" id="table" width="100%">
                <thead>
                  <tr>
                  <th style="width:1%">No.</th>
                  <th>Id Transaksi</th>
                  <th>Jenis Transaksi</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal Masuk</th>
                  <th>Periode</th>
                  <th>Nominal</th>
                  </tr>
                 </thead>
                <tbody>
                  <?php $i = 1; $total = 0; ?>
                   <?php foreach($keuangan->result() as $data_keuangan) : ?>
                  <tr>
                    <td><?php echo $i."."?></td>
                    <td><?php echo $data_keuangan->id_transaksi?></td>
                    <td><?php echo $data_keuangan->jenis_transaksi?></td>
                    <td><?php echo $data_keuangan->deskripsi?></td>
                    <td><?php echo $data_keuangan->tanggal_masuk?></td>
                    <td><?php echo $data_keuangan->periode?></td>
                    <td align="right"><?php echo "Rp. ".number_format($data_keuangan->nominal)?></td>
                  </tr>
                  <?php 

                          $total  = $total + $data_keuangan->nominal;
                          $i++;  ?>
                  
                    <?php endforeach ; ?>

                     <tr style="background-color: #26B99A;">
                        <td colspan="5" align="center" style="color: #fff;"><strong>Total Transaksi</strong></td>
                        <td colspan="3" style="color: #fff; text-align: right;" name="total"><?php echo "Rp. " .number_format($total); ?></td>
                    </tr>
                  </tbody>
                </table>

                <right>
  <?php $tanggal_awal = $this->session->userdata('tanggal_awal');
        $tanggal_akhir = $this->session->userdata('tanggal_akhir');?>
<a href="<?= site_url('c_sortir/cetak');?>" id="print" class="btn btn-info btn-icon-split btnPrint"><span class="icon text-white-50">
          <i class="fas fa-print"></i>
          </span></i><span class="text"> Print</span></a></right>

<script type="text/javascript">
  $(document).ready(function(){
    $(".btnPrint").printPage();
  })
</script>