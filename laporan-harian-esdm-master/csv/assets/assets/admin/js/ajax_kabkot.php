<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": true,
	});

	// $(document).ready(function (){
	// 	var table = $('#list-data').DataTable({
	// 		dom: 'lrtip'
	// 	});
		
	// 	$('#table-filter').on('change', function(){
	// 		table.search(this.value).draw();   
	// 	});
	// });

	window.onload = function() {
		tampilKabkot();
		<?php
		if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();	
	}
	

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}
	//Kabkot
	function tampilKabkot() {
		$.get('<?php echo base_url('Kabkot/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kabkot').html(data);
			refresh();
		});
	}

	$(document).on("click", ".detail-dataKabkot", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kabkot/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-kabkot').modal('show');
		})
	})

	$(document).on("click", ".update-dataKabkot", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kabkot/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kabkot').modal('show');
		})
	})

	var id_perizinan;
	$(document).on("click", ".konfirmasiHapus-kabkot", function() {
		id_perizinan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKabkot", function() {
		var id = id_perizinan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kabkot/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKabkot();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on('submit', '#form-update-kabkot', function(e){
		var formData = new FormData($(this)[0]);

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kabkot/prosesUpdate'); ?>',
			data: formData,
			processData: false,
			contentType: false
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKabkot();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kabkot").reset();
				$('#update-kabkot').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#form-tambah-kabkot').submit(function(e) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kabkot/prosesTambah'); ?>',
			data: formData,
			processData: false,
			contentType: false
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKabkot();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kabkot").reset();
				$('#tambah-kabkot').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-kabkot').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})
	$('#update-kabkot').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})
</script>