<style type="text/css">
.st_total {
  font-size: 9pt;
  font-weight: bold;
  font-family:Verdana, Arial, Helvetica, sans-serif;
}
.sub_field {
  font-size: 9pt;
  font-family:Verdana, Arial, Helvetica, sans-serif;
}
.style6 {
  color: #000000;
  font-size: 9pt;
  font-weight: bold;
  font-family: Arial;
}
.style9 {
  color: #000000;
  font-size: 9pt;
  font-weight: normal;
  font-family: Arial;
}
.style9b {
  color: #000000;
  font-size: 9pt;
  font-weight: bold;
  font-family: Arial;
}
.style19b {
  color: #000000;
  font-size: 11pt;
  font-weight: bold;
  font-family: Arial;
}
.style10b {
  color: #000000;
  font-size: 11pt;
  font-weight: bold;
  font-family: Arial;
}
 .chzn-container-single .chzn-search input{
  width: 100%;
}
</style>

  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="7">
      <div align="center">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20%" rowspan="3" valign="top" class="style19b">
            <img src="<?php echo base_url('assets/img/LogoSenjani.png') ?>" style="margin-bottom: -12px; width: 250px;"><br/>
            </td>
            <td colspan="3"><div align="center" class="style9b">
              <div align="left" class="style19b"><strong><u>Laporan Keuangan</u></strong></div>
            </div></td>
            </tr>
          <tr>
            <td width="11%" height="18" class="style9">Tanggal Cetak </td>
            <td width="1%" class="style9"><div align="center">:</div></td>
            <td width="14%" class="style9"><u><?php echo Date('d F Y', strtotime($this->session->userdata('tanggal_awal'))); ?></u> sampai <u><?php echo Date('d F Y', strtotime($this->session->userdata('tanggal_akhir'))); ?></u></td>
          </tr>
        </table>
          </div>
       </td>
    </tr>
  </table>
   </br>
 </br>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="15" class="style6"><div align="left">Pemasukan</div></td>
    </tr>
    <tr>
      <td colspan="10">
      <hr />      
      </td>
    </tr>
    <tr>
      <td colspan="1" align="right" class="sub_field">Pembayaran pesanan</td>
      <td colspan="6" width="200" align="right"><div id="total" class="st_total" align="right">Rp. <?php echo number_format($laporan_pembayaran_pesanan) ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="1" align="right" class="sub_field">Lain-lain</td>
      <td colspan="6" width="200" align="right"><div id="total" class="st_total" align="right">Rp. <?php echo number_format($laporan_pemasukan_lain) ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="10">
      <hr />      </td>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <td colspan="6" align="right" class="st_total">TOTAL PEMASUKAN</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">

        Rp. <?php echo number_format($laporan_pembayaran_pesanan + $laporan_pemasukan_lain); ?>
      </div></td>
    </tr>   
    <tr>
      <td style="color: #fff;">&nbsp;</td>
    </tr>
    <tr>
      <td width="15" class="style6"><div align="left">Pengeluaran</div></td>
    </tr>
    <tr>
      <td colspan="10">
      <hr />      
      </td>
    </tr>
    <tr>
      <td colspan="1" align="right" class="sub_field">Pembayaran gaji pegawai</td>
      <td colspan="6" width="200" align="right"><div id="total" class="st_total" align="right">Rp. <?php echo number_format($laporan_pembayaran_gaji) ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="1" align="right" class="sub_field">Pembelian aset</td>
      <td colspan="6" width="200" align="right"><div id="total" class="st_total" align="right">Rp. <?php echo number_format($laporan_pembelian_aset) ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="1" align="right" class="sub_field">Pembelian bahan-bahan</td>
      <td colspan="6" width="200" align="right"><div id="total" class="st_total" align="right">Rp. <?php echo number_format($laporan_pembelian_bahan) ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="10">
      <hr />      </td>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <td colspan="6" align="right" class="st_total">TOTAL PENGELUARAN</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">

        Rp. <?php echo number_format($laporan_pembayaran_gaji + $laporan_pembelian_aset + $laporan_pembelian_bahan); ?>
      </div></td>
    </tr>   
    <tr>
      <td style="color: #fff;">&nbsp;</td>
    </tr>
    <tr>
      <td style="color: #fff;">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="10">
      <hr />      </td>
    </tr>
  </table>
 
  <table width="98%" align="center">
    <tr>
      <td colspan="6" align="right" class="st_total">TOTAL KAS KEUANGAN</td>
      <td width="200" align="right"><div id="total" class="st_total" align="right">

        Rp. <?php echo number_format($laporan_pembayaran_pesanan + $laporan_pemasukan_lain - $laporan_pembayaran_gaji - $laporan_pembelian_aset - $laporan_pembelian_bahan); ?>
      </div></td>
    </tr>
  </table>
  
   <table width="98%" border="0" align="center">
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
    <?php
      $data_user = $this->db->query('SELECT kepegawaian.nama_pegawai FROM kepegawaian, user WHERE kepegawaian.id_kepegawaian="'.$this->session->userdata('id_kepegawaian').'" ORDER BY kepegawaian.nama_pegawai limit 1');
        foreach ($data_user->result_array() as $user) {
        ?>
     <td colspan="3"><div align="center" class="style9"><?php echo $user['nama_pegawai'] ?></div></td>
    <?php } ?>
     <td colspan="3">&nbsp;</td>
     <td colspan="3"></td>
   </tr>
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
     <td colspan="3">&nbsp;</td>
   </tr>
   <tr>
     <td width="82"><div align="right">(</div></td>
     <td width="89">
     <div align="center" class="style9"></div></td>
     <td width="76">)</td>
   </tr>
 </table>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.printPage.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".btnPrint").printPage();
  })
</script>
