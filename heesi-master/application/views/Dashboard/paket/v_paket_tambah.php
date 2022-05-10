<!DOCTYPE html>
<html>
<body>
	<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Entry Paket</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          
          	
          	<?php echo validation_errors('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> ', '</div>'); ?>
          
          	<?php echo form_open('') ?>
				<div class="card shadow mb-4">
					<div class="card-header py-3">
  						<h6 class="m-0 font-weight-bold text-primary">Paket</h6>
					</div>
					<div class="card-body">
						<table class="table table-borderless" width="100%" cellspacing="0">
								<tr>
									<th><h3><b>Data Paket</b></h3></th>
								<tr>
								<tr>
									<td>
										<div class="form-group">
					    					<label class="col-lg-9 col-form-label">Nama Paket <label class="font-weight-light font-italic text-danger">*</label></label>
					    					
											<div class="col-lg-9">
												<input type="text" class="form-control" name="nama_paket" required>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">
										   	<label class="col-lg-9 col-form-label">Tahun</label>
											<div class="col-lg-9">
												<input value="<?php echo Hijriah(); ?>" class="form-control" name="kode_tahun" readonly>
											</div>
										</div>
									</td>
									<td>
										
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
						    				<label class="col-lg-9 col-form-label">Jenis Paket <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										    	<select class="form-control" name="jenis_paket" required>
											    	<?php foreach($jenis as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Program Paket <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										    	<select class="form-control" name="program_paket" required>
											    	<?php foreach($program as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">No. HP Pengurus <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="hp_petugas_3" required>
									    	</div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">No. HP Pembimbing <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="hp_petugas_2" required>
									    	</div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">No. HP Dokter <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="text" class="form-control" name="hp_petugas_1" required>
										    </div>
										</div>
									</td>
								</tr>
							</table>

							<table class="table table-borderless" width="100%" cellspacing="0">
								<tr>
									<th colspan="3"><h3><b>Hotel, Akomodasi, dan Syarikah</b></h3></th>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Mekkah <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
									      		<select class="form-control select2" name="akomodasi_1" id="akomodasi_1" style="width: 200px;" required>
											    	<?php foreach($mekkah as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
										    <label for="tgl_berangkat" class="col-lg-11 col-form-label">Tanggal Masuk <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-11">
										      <input type="text" class="form-control datepicker" name="tgl_masuk_mekkah" id="tgl_masuk_mekkah" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
										    <label for="tgl_berangkat" class="col-lg-11 col-form-label">Tanggal Keluar <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-11">
										      <input type="text" class="form-control datepicker" name="tgl_keluar_mekkah" id="tgl_keluar_mekkah" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">Hari <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="h_akomodasi_1" id="h_akomodasi_1" readonly>
									    	</div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-15 col-form-label">Konsumsi Mekkah <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-15">
										      <select class="form-control" name="komsumsi_1" id="komsumsi_1">
											    	<?php foreach($komsumsi as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Madinah <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										    	<select class="form-control select2" name="akomodasi_2" id="akomodasi_2" style="width: 200px;">
											    	<?php foreach($madinah as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
												</select>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
										    <label for="tgl_berangkat" class="col-lg-11 col-form-label">Tanggal Masuk <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-11">
										      <input type="text" class="form-control datepicker" name="tgl_masuk_madinah" id="tgl_masuk_madinah" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
										    <label for="tgl_berangkat" class="col-lg-11 col-form-label">Tanggal Keluar <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-11">
										      <input type="text" class="form-control datepicker" name="tgl_keluar_madinah" id="tgl_keluar_madinah" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">Hari <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="h_akomodasi_2" id="h_akomodasi_2" readonly="">
									    	</div>
									    </div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-15 col-form-label">Konsumsi Madinah <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-15">
										      <select class="form-control" name="komsumsi_2" id="komsumsi_2">
											    	<?php foreach($komsumsi as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Maktab Armuzna <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <select class="form-control" name="h_akomodasi_8" style="width: 200px;">
											    	<?php foreach($armani as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
									<td colspan="2">
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Konsumsi Armuzna <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <select class="form-control" name="komsumsi_3">
											    	<?php foreach($komsumsi as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Jeddah <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      	<select class="form-control select2" name="akomodasi_3" id="akomodasi_3" style="width: 200px;">
											    	<?php foreach($jeddah as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
												</select>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
										    <label for="tgl_berangkat" class="col-lg-11 col-form-label">Tanggal Masuk <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-11">
										      <input type="text" class="form-control datepicker" name="tgl_masuk_jeddah" id="tgl_masuk_jeddah" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
										    <label for="tgl_berangkat" class="col-lg-11 col-form-label">Tanggal Keluar <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-11">
										      <input type="text" class="form-control datepicker" name="tgl_keluar_jeddah" id="tgl_keluar_jeddah" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">Hari <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="h_akomodasi_3" id="h_akomodasi_3" readonly="">
									    	</div>
									    </div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-form-label" style="width: 150px;">Konsumsi Jeddah <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-15">
										      <select class="form-control" name="komsumsi_4" id="komsumsi_4">
											    	<?php foreach($komsumsi as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Syarikah Transportasi <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <select class="form-control select2" name="transport" id="transport">
											    	<?php foreach($transport as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
								</tr>
							</table>

							<table class="table table-borderless" width="100%" cellspacing="0">
								<tr>
									<th><h3><b>Transit</b></h3></th>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Hotel Transit <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <select class="form-control select2" name="hotel_transit" id="hotel_transit" style="width: 100%">
											    	<?php foreach($mekkah as $row){
											    		echo '<option value="'.$row->description.'">'.$row->description.'</option>';
											    	} ?>
											    </select>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Tanggal Masuk <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="text" class="form-control datepicker" name="tgl_masuk_transit" id="tgl_masuk_transit" required>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Kapasitas Kamar <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="number" class="form-control" name="kapasitas_kamar_transit" min="0" id="kapasitas_kamar_transit" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Tanggal Keluar <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="text" class="form-control datepicker" name="tgl_keluar_transit" id="tgl_keluar_transit" required>
										    </div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Alamat <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <textarea class="form-control" name="alamat_hotel_transit" id="alamat_hotel_transit" rows="3" required></textarea>
										    </div>
										</div>
									</td>
								</tr>
							</table>

							<table class="table table-borderless" width="100%" cellspacing="0">
								<tr>
									<th><h3><b>Mutawif dan Harga Paket</b></h3></th>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Mutawif 1 <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="text" class="form-control" name="petugas_as_1" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">No. HP <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="hp_petugas_as_1" required>
									    	</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Mutawif 2 <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="text" class="form-control" name="petugas_as_2" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">No. HP <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="hp_petugas_as_2" required>
									    	</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label class="col-lg-9 col-form-label">Mutawif 3 <label class="font-weight-light font-italic text-danger">*</label></label>
										    <div class="col-lg-9">
										      <input type="text" class="form-control" name="petugas_as_3" required>
										    </div>
										</div>
									</td>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">No. HP <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									      		<input type="text" class="form-control" name="hp_petugas_as_3" required>
									    	</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">Jumlah Kasur <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									    		<input type="text" class="form-control" name="jumlah_kasur" value="Double" readonly>
									    	</div>
										</div>
									</td>
									<td>
										<div class="form-group-row">
									    	<label class="col-lg-9 col-form-label">Harga Double <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									    		<div class="input-group">
										    		<div class="input-group-prepend">
											        	<div class="input-group-text">USD</div>
											        </div>
										      		<input type="number" class="form-control" name="harga_double" min="0" required>
									      		</div>
									    	</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">Jumlah Kasur <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									    		<input type="text" class="form-control" name="jumlah_kasur" value="Triple" readonly>
									    	</div>
										</div>
									</td>
									<td>
										<div class="form-group-row">
									    	<label class="col-lg-9 col-form-label">Harga Triple <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									    		<div class="input-group">
										    		<div class="input-group-prepend">
											        	<div class="input-group-text">USD</div>
											        </div>
										      		<input type="number" class="form-control" name="harga_triple" min="0" required>
									      		</div>
									    	</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
									    	<label class="col-lg-9 col-form-label">Jumlah Kasur <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									    		<input type="text" class="form-control" name="jumlah_kasur" value="Quadra" readonly>
									    	</div>
										</div>
									</td>
									<td>
										<div class="form-group-row">
									    	<label class="col-lg-9 col-form-label">Harga Quadra <label class="font-weight-light font-italic text-danger">*</label></label>
									    	<div class="col-lg-9">
									    		<div class="input-group">
										    		<div class="input-group-prepend">
											        	<div class="input-group-text">USD</div>
											        </div>
										      		<input type="number" class="form-control" name="harga_quadra" min="0" required>
									      		</div>
									    	</div>
										</div>
									</td>
								</tr>
							</table>
						<input type="submit" value="Simpan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="" data-target="">
					</div>
				</div>
			</form>
		</div>
		
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
            placeholder: "Pilih"
        });

		$("#tgl_keluar_mekkah, #tgl_keluar_madinah, #tgl_masuk_jeddah, #tgl_keluar_jeddah, #h_akomodasi_3, #komsumsi_4, #kapasitas_kamar_transit, #alamat_hotel_transit, #tgl_masuk_transit, #tgl_keluar_transit").prop('disabled', true);

		$('#akomodasi_1').val('None');
    	$('#akomodasi_1').trigger('change');
    	$('#akomodasi_2').val('None');
    	$('#akomodasi_2').trigger('change');
		$('#akomodasi_3').val('None');
    	$('#akomodasi_3').trigger('change');
    	$('#hotel_transit').val('None');
    	$('#hotel_transit').select2().trigger('change');
	});

	$("#akomodasi_1").on("change", function(){
		var value = $("#akomodasi_1").val();
		if (value == 'None') {
			$("#tgl_masuk_mekkah, #tgl_keluar_mekkah, #h_akomodasi_1, #komsumsi_1").val('');
			$("#tgl_masuk_mekkah, #tgl_keluar_mekkah, #h_akomodasi_1, #komsumsi_1").prop('disabled', true);
		}else{
			$("#tgl_masuk_mekkah, #h_akomodasi_1, #komsumsi_1").prop('disabled', false);
		}
	});
	$("#akomodasi_2").on("change", function(){
		var value = $("#akomodasi_2").val();
		if (value == 'None') {
			$("#tgl_masuk_madinah, #tgl_keluar_madinah, #h_akomodasi_2, #komsumsi_2").val('');
			$("#tgl_masuk_madinah, #tgl_keluar_madinah, #h_akomodasi_2, #komsumsi_2").prop('disabled', true);
		}else{
			$("#tgl_masuk_madinah, #h_akomodasi_2, #komsumsi_2").prop('disabled', false);
		}
	});

	$("#akomodasi_3").on("change", function(){
		var value = $("#akomodasi_3").val();
		if (value == 'None') {
			$("#tgl_masuk_jeddah, #tgl_keluar_jeddah, #h_akomodasi_3, #komsumsi_4").val('');
			$("#tgl_masuk_jeddah, #tgl_keluar_jeddah, #h_akomodasi_3, #komsumsi_4").prop('disabled', true);
		}else{
			$("#tgl_masuk_jeddah, #h_akomodasi_3, #komsumsi_4").prop('disabled', false);
		}
	});

	$("#hotel_transit").on("change", function(){
		var value = $("#hotel_transit").val();
		if (value == 'None') {
			$("#kapasitas_kamar_transit, #alamat_hotel_transit, #tgl_masuk_transit, #tgl_keluar_transit").val('');
			$("#kapasitas_kamar_transit, #alamat_hotel_transit, #tgl_masuk_transit, #tgl_keluar_transit").prop('disabled', true);
		}else{
			$("#kapasitas_kamar_transit, #alamat_hotel_transit, #tgl_masuk_transit").prop('disabled', false);
		}
	});

	$("#tgl_masuk_mekkah, #tgl_masuk_madinah, #tgl_masuk_jeddah, #tgl_masuk_transit").datepicker({
	    autoclose: true,
	    todayHighlight: true,
	});

	
	$("#tgl_masuk_mekkah").on("change", function(){
		$("#tgl_keluar_mekkah").prop('disabled', false);
		$("#tgl_keluar_mekkah").val('');
		$("#h_akomodasi_1").val('');

		currentDate = $("#tgl_masuk_mekkah").val();
		
		$("#tgl_keluar_mekkah").datepicker({
			autoclose: true,
	    	todayHighlight: true,
		    startDate: currentDate,
	    });
	});

	//SET AUTO HARI
	$("#tgl_keluar_mekkah").on("change", function(){
		tanggal_awal = Date.parse($("#tgl_masuk_mekkah").val());
		tanggal_akhir = Date.parse($("#tgl_keluar_mekkah").val());
		
        var timeDiff = tanggal_akhir - tanggal_awal;
        daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
		
		$("#h_akomodasi_1").val(daysDiff);
	});

	$("#tgl_masuk_madinah").on("change", function(){
		$("#tgl_keluar_madinah").prop('disabled', false);
		$("#tgl_keluar_madinah").val('');
		$("#h_akomodasi_2").val('');

		currentDate = $("#tgl_masuk_madinah").val();
		
		$("#tgl_keluar_madinah").datepicker({
			autoclose: true,
	    	todayHighlight: true,
		    startDate: currentDate,
	    });
	});

	$("#tgl_keluar_madinah").on("change", function(){
		tanggal_awal = Date.parse($("#tgl_masuk_madinah").val());
		tanggal_akhir = Date.parse($("#tgl_keluar_madinah").val());
		
        var timeDiff = tanggal_akhir - tanggal_awal;
        daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
		
		$("#h_akomodasi_2").val(daysDiff);
	});

	$("#tgl_masuk_jeddah").on("change", function(){
		$("#tgl_keluar_jeddah").prop('disabled', false);
		$("#tgl_keluar_jeddah").val('');
		$("#h_akomodasi_3").val('');

		currentDate = $("#tgl_masuk_jeddah").val();
		
		$("#tgl_keluar_jeddah").datepicker({
			autoclose: true,
	    	todayHighlight: true,
		    startDate: currentDate,
	    });
	});

	$("#tgl_keluar_jeddah").on("change", function(){
		tanggal_awal = Date.parse($("#tgl_masuk_jeddah").val());
		tanggal_akhir = Date.parse($("#tgl_keluar_jeddah").val());
		
        var timeDiff = tanggal_akhir - tanggal_awal;
        daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
		
		$("#h_akomodasi_3").val(daysDiff);
	});

	$("#tgl_masuk_transit").on("change", function(){
		$("#tgl_keluar_transit").prop('disabled', false);
		currentDate = $("#tgl_masuk_transit").val();
		
		$("#tgl_keluar_transit").datepicker({
			autoclose: true,
	    	todayHighlight: true,
		    startDate: currentDate,
	    });
	});

</script>