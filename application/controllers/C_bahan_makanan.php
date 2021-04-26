<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bahan_makanan extends CI_Controller{
 
	function __construct(){
		parent::__construct();
       if ($this->session->userdata('status_login') != "login") {
            ?>
            <script type="text/javascript">
                    alert('Manjing dikit ning halaman login!');
                    window.location='<?php echo base_url('index.php'); ?>'
                </script>
            <?php
        }
	}
 
	function index()
    {
        $url   = "data/tabel.json";
        $content = file_get_contents($url);
        $data['tabel'] = json_decode($content, true);

        $this->load->view('navbar.php');
        $this->load->view('daftarBahan', $data);
    }
 
}
