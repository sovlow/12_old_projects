<form id="form-tambah-gunung" method="POST">
<?=get_csrf_token()?>

<div class="modal-content" style="border-radius: 10px">
  <div class="modal-header" style="background-color:SteelBlue; color:white;border-radius: 10px 10px 0 0;">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" style="text-align: center;"><strong>Pusdatin</strong></h4>
    
  </div>
<div class="form-msg"></div>
<tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5; font-size:14px;" colspan="4">Yth. Bapak Menteri ESDM & </td> 
                    
</tr><br />

<tr bgcolor="efefef">
                   
                    <td width="20%" style="padding:0 5 0 5; font-size:14px;" colspan="4">Yth. Bapak Wamen ESDM</td>
</tr>
<br />
<br />
<tr bgcolor="efefef">
                   
                    <td width="20%" style="padding:0 5 0 5; font-size:14px;" colspan="4">Berikut dengan hormat kami laporkan Status Produksi Minyak dan Gas Bumi, Lifting, ICP, Harga BBM, Premium Reborn, Mineral dan Batubara, serta Ketenagalistrikan, per tanggal <?php echo date('d M Y')?> sbb :</td>
</tr>
	
  <table cellpadding="0" cellspacing="0" border="0" width="595" align="center">
	
    <tr>
		<td class="border">
<!-- content begin -->
            <table cellpadding="0" cellspacing="1" border="0" width="100%">
               
               
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">1. PRODUKSI MINYAK</p></td>
                </tr>
  <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_prod_minyak");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
		
		
  ?>
  				
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">	<div align="left">Produksi Minyak Harian Tanggal <?php echo date('d M Y')?> : <?php echo $row['PROD_HARIAN']?> BOPD</div></td>
                  
                    
                </tr>
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Rata - rata Produksi Bulanan : <?php echo $row['PROD_BULANAN']?> BOPD</td>
                </tr>
               
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Rata - rata Produksi Tahunan : <?php echo $row['PROD_TAHUNAN']?> BOPD</td>
                </tr>
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Target APBN : <?php echo $row['APBN']?> BOPD</td>
                </tr>
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                
  <?php              
	}
   ?>             
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
               
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">2. ICP</p></td>
                </tr>
                 <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_icp");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
       
        $no++;
		
  ?>
  
  				
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['KETERANGAN']?></td>
                </tr>
                
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
               
               
  <?php              
	}
   ?>       
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">3. PRODUKSI GAS</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_prod_gas");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
		
		
  ?>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">	<div align="left">Produksi Harian Gas Tanggal <?php echo date('d M Y')?> : <?php echo $row['PROD_HARIAN']?> MMSCFD</div></td>
                  
                    
                </tr>
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Rata - rata Produksi Bulanan : <?php echo $row['PROD_BULANAN']?> MMSCFD</td>
                </tr>
               
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Rata - rata Produksi Tahunan : <?php echo $row['PROD_TAHUNAN']?> MMSCFD</td>
                </tr>
                
                
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>       <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">4. PRODUKSI EKUIVALEN MINYAK DAN GAS</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_prod_ekui_migas");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        
        $no++;
		
  ?>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">	<div align="left">Produksi Harian Tanggal <?php echo date('d M Y')?> : <?php echo $row['PROD_HARIAN']?> BOEPD</div></td>
                  
                    
                </tr>
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Rata - rata Produksi Bulanan : <?php echo $row['PROD_BULANAN']?> BOEPD</td>
                </tr>
               
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Rata - rata Produksi Tahunan : <?php echo $row['PROD_TAHUNAN']?> BOEPD</td>
                </tr>
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Target Lifting APBN : <?php echo $row['APBN']?> BOEPD</td>
                </tr>
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>     <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">5. LIFTING TAHUN BERJALAN</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_lift_tb");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
		
        $no++;
		
  ?>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">LIFTING MINYAK BUMI :</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['LIFT_MB']?></td>
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">POSISI STOCK HARI INI :</td>
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5">
					<?php echo $row['POSISI_STOCK']?>
                    </td>
                   
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">SALUR GASI :</td>
                </tr>
                <tr bgcolor="efefef">
                    <td style="padding:0 5 0 5"><?php echo $row['SALUR_GAS']?></td>
                    
                </tr>
                
               
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>     <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">6. HARGA BBM</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_harga_bbm");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
		
		
  ?>
                
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">A. JENIS BBM TERTENTU</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['JENIS_TERTENTU']?></td>
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">B. JENIS BBM UMUM</td>
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5">
					<?php echo $row['BBM_UMUM']?>
                    </td>
                   
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">C. PROGRAM INDONESIA SATU HARGA</td>
                </tr>
                <tr bgcolor="efefef">
                    <td style="padding:0 5 0 5"><?php echo $row['PROG_IND_SATU_HRG']?></td>
                    
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">D. PER NEGARA:</td>
                </tr>
                <tr bgcolor="efefef">
                    <td style="padding:0 5 0 5">
					<?php echo $row['HARGA_PERNEGARA']?></td>
                    
                </tr>
                
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>     <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
               
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">7. PROGRES PENYALURAN PREMIUM JAMALI</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_prog_peny_prem_jamali");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
	
		
  ?> 
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">PROGRES :</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['PROGRES']?></td>
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">CATATAN :</td>
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5">
					<?php echo $row['CATATAN']?>
                    </td>
                   
                </tr>
                
               
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>     <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">8. BERITA OPEC HARIAN</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_berita_opec_harian");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
        $no++;
		
  ?>
               
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">BERITA :</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['BERITA']?></td>
                </tr>
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>     <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">9. HARGA BATUBARA ACUAN</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_harga_bb_acuan");
    $no=1;
	$urutan='A';
    foreach ($dataGunung->result_array() as $row)
	{
        
        $no++;
		
  ?>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $urutan?>. Harga : <?php echo $row['HARGA']?></td>
                    
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Sumber :</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['SUMBER']?></td>
                </tr>
                
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>
   			<tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                <!--<tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="center" style="color: rgb(51,102,255)">10. HARGA MINERAL ACUAN</p></td> 
                </tr>-->
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">10. HARGA MINERAL ACUAN</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_harga_mineral_acuan");
    $no=1;
	$urutan='A';
    foreach ($dataGunung->result_array() as $row)
	{
        
        $no++;
		
  ?>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $urutan?>. Harga : <?php echo $row['HARGA']?></td>
                    
                </tr>
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">Sumber :</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['SUMBER']?></td>
                </tr>
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
  <?php              
	}
   ?>     
   			<tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
                
                <tr>
                <td width="20%" align="center" bgcolor="#D0E4FF" class="border" style="padding:0 5 0 5; font-size:14px" colspan="4"><p align="left"style="color: rgb(51,102,255)">11. STATUS KETENAGALISTRIKAN</p></td>
                </tr>
                <?php
    //include 'koneksi.php';
   // $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
	$dataGunung = $this->db->query("SELECT * from r_lap_pusdatin_stts_tl");
    $no=1;
    foreach ($dataGunung->result_array() as $row)
	{
        //$jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki laki';
		
		
  ?>
                
                
                
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4">STATUS :</td>
                    
                </tr>
                <tr bgcolor="efefef">
                    <td width="20%" style="padding:0 5 0 5" colspan="4"><?php echo $row['STATUS']?></td>
                </tr>
                
                <tr><td height="1" colspan="4" bgcolor='#aaafff'></td></tr>
                
  <?php              
	}
   ?>
            </table>
            
<!-- end content begin -->
		</td>
    </tr>
	<!--<tr><td height="25" align="center" bgcolor="#D0E4FF" class="border">
    	
		</td>
	</tr>-->
</table>

</div>
</form>

<script type="text/javascript">
  $('[data-rel=popover]').popover({html:true});
</script>
<script type="text/javascript">


$(document).ready(function(){

  tampilProfile_perusahaan();
  get_kabkot($('#PROVINSI'));
  
  $('#PROVINSI').change(function(){
    get_kabkot(this);
  });
});

function get_kabkot(provinsi_data) {
  var id=$(provinsi_data).val();
  var curr_id_kabkot = "<?=isemptyor($gunung->ID_KABKOT, '')?>";

  $.ajax({
    url : "<?php echo base_url();?>Gunung/get_kabkot",
    method : "POST",
    data : {id: id},
    async : false,
    dataType : 'json',
    success: function(data){
      if(data.length != 0) {
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          var is_selected = "";
          if(data[i].ID_KABKOT == curr_id_kabkot) {
            is_selected = "selected";
          }

          html += '<option ' + is_selected +' value="'+data[i].ID_KABKOT+'">'+data[i].NAMA_KABKOT+'</option>';
        }
        $('.KABKOT').html(html);
      } else {
        var html = '<option value="">--PILIH PROVINSI DAHULU--</option>';
        $('.KABKOT').html(html);
      }
    }
  });
}

// Profile perusahaan
function tampilProfile_perusahaan() {
		$.get('<?php echo base_url('Profile_perusahaan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-akta').html(data);
			refresh();
            check_akta();
		});
	}

	$(document).on("click", ".update-dataAkta", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Profile_perusahaan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-akta').modal('show');
		})
	})

	var id_perizinan;
	$(document).on("click", ".konfirmasiHapus-dataAkta", function() {
		id_perizinan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataAkta", function() {
		var id = id_perizinan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Profile_perusahaan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilProfile_perusahaan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on('submit', '#form-update-akta', function(e){
		var formData = new FormData($(this)[0]);

		$('#update-akta').modal('hide');

    	$.blockUI({ message: '<h1><img src="" />Loading..</h1>' });

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Profile_perusahaan/updateAkta'); ?>',
			data: formData,
			processData: false,
            contentType: false
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProfile_perusahaan();
			if (out.status == 'form') {
				$.unblockUI(); 
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				$.unblockUI(); 
				document.getElementById("form-update-akta").reset();
				$('#update-akta').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-tambah-akta', function(e) {
		var formData = new FormData($(this)[0]);

		$('#tambah-akta').modal('hide');

    	$.blockUI({ message: '<h1><img src="" />Loading..</h1>' });

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Profile_perusahaan/tambahAkta'); ?>',
			data: formData,
			processData: false,
            contentType: false
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProfile_perusahaan();
			if (out.status == 'form') {
				$.unblockUI(); 
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				$.unblockUI(); 
				document.getElementById("form-tambah-akta").reset();
				$("#form-tambah-akta input[flag='input-file']").ace_file_input('reset_input');
				$('#tambah-akta').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-akta').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	$('#update-akta').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

    function check_akta() {
      var table = $("#list-data").DataTable();

      if (!table.data().any()) {
        if(typeof akta_empty_callback === "function") {
          akta_empty_callback();
        }
      } else {
        if(typeof akta_exists_callback === "function") {
          akta_exists_callback();
        }     
      }
    }
	
	$(document).on('submit', '#form-submit-profile', function(e) {
		
		return false;
	});
	
  // Datepicker
  $('.tgl_dokumen_datepicker').datepicker({
    format: 'yyyy-mm-dd',
    endDate: '<?=date("Y-m-d")?>'
  });

  $('.tgl_dokumen_datepicker').on('changeDate show', function(e) {
    this.setCustomValidity('');
  });

  $('.tgl_kedaluarsa_datepicker').on('changeDate show', function(e) {
    this.setCustomValidity('');
  });

  $('.tgl_kedaluarsa_datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '<?=date("Y-m-d")?>'
  });
</script>