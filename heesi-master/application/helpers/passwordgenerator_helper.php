<?php
function PasswordGenerator()
{
	//jumlah panjang karakter angka dan huruf.
	$length_abjad = "2";
	$length_angka = "4";

	//huruf yg dimasukan
	$huruf = "ABCDEFGHJKMNPRSTUVWXYZ";

	//mulai proses generate huruf
	$i = 1;
	$txt_abjad = "";
	while ($i <= $length_abjad) {
		$txt_abjad .= $huruf{mt_rand(0,strlen($huruf))};
		$i++;
	}

	//mulai proses generate angka
	$datejam = date("His");
	$time_md5 = rand(time(), $datejam);
	$cut = substr($time_md5, 0, $length_angka);	

	//mennggabungkan dan mengacak hasil generate huruf dan angka
	$acak = str_shuffle($txt_abjad.$cut);

	return $acak;
}
?>