<?php
/**
* Helper untuk memanggil tanggal dalam bentuk format bahasa indonesia
*
* @package CodeIgniter
* @category Helpers
* @author Fahminudin, S.T (nudinfahmi04@gmail.com)
* @link https://localhost/senjani
* @version 2.0
*/

/**
* Fungsi bulan dalam bahasa indonesia contohnya (april)
* @param int nomer bulan, Date('m')
* @return string nama bulan dalam bahasa indonesia
*/

if(!function_exists('date_default_timezone_get')){
	date_default_timezone_get('Asia/Jakarta');
	$set = date('H:i:s');

	return $set;
	}

