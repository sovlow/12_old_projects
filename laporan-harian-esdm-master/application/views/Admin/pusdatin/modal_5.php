<?php
$kemarin = date("d-m-Y", mktime(0,0,0, date("m"), date("d")-1, date("Y")));

?>
<!--<form id="form-tambah" method="POST">
<?=get_csrf_token()?>-->

 <div class="main-container ace-save-state" id="laporan5">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<div class="page-header">
							<h1>
								Lifting Tahun Berjalan
							</h1>
						</div><!-- /.page-header -->
<!-- Upload CSV -->                                                
<form id="upload" method="POST" enctype="multipart/form-data">
<?=get_csrf_token()?>
    <!--<div class="row">-->
        <div class="profile-info-name"> File CSV </div>
        <div class="profile-info-value">
        	<input type="file" name="userfile" class="btn-sm btn-primary">
        	
        </div>
        
        <div class="profile-info-value">
            <button id="upload" type="submit" class="btn-sm btn-primary">Import CSV<i class="fa fa-upload"></i></button>   
        </div>
    <!--</div>-->
</form>  
<!-- END Upload CSV -->                         
                        
                        
<form id="form-tambah" method="POST">
<?=get_csrf_token()?>
						<div class="row">
							<div class="col-xs-12 col-sm-9">
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> Tanggal Laporan </div>

										<div class="profile-info-value">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
												<input class="form-control date-picker" name="TANGGAL_LAPORAN" id="id-date-picker-1" type="text"  value="<?php echo $kemarin ?>" data-date-format="dd-mm-yyyy" disabled />
                                                <button  type="button" class="btn btn-success btn-minier" onclick="LtbjGet()" id="select-gunung">Show Before</button> 
											</div>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Lifting Minyak Bumi </div>

										<div class="profile-info-value">
											<textarea required class="form-control" type="text" name="LIFT_MB" id="LIFT_MB" placeholder="Lifting Minyak Bumi" style="resize: vertical;"></textarea>
										</div>
									</div>
                                    
                                    <div class="profile-info-row">
										<div class="profile-info-name"> Salur Gas </div>

										<div class="profile-info-value">
											<textarea required class="form-control" type="text" name="SALUR_GAS" id="SALUR_GAS" placeholder="Salur Gas" style="resize: vertical;"></textarea>
										</div>
									</div>
                                    
                                    <div class="profile-info-row">
										<div class="profile-info-name"> Lifting Elpigi</div>

										<div class="profile-info-value">
											<textarea required class="form-control" type="text" name="LIFT_GAS" id="LIFT_GAS" placeholder="Lifting Minyak Gas" style="resize: vertical;"></textarea>
										</div>
									</div>

									<!--<div class="profile-info-row">
										<div class="profile-info-name"> Posisi Stock hari ini </div>

										<div class="profile-info-value">
											<textarea required class="form-control" type="text" name="POSISI_STOCK" id="POSISI_STOCK" placeholder="Posisi Stock hari ini" style="resize: vertical;"></textarea>
										</div>
									</div>-->

									
								</div>
								<div class="space-10"></div>
								<div class="profile-user-info profile-user-info-striped" style="border: none;">
									<div class="profile-info-row" style="text-align: right;">
										<!--<button class="btn btn-success">
											<i class="ace-icon fa fa-check-square-o align-top bigger-125"></i>
											Posting
										</button>-->
										<button class="btn btn-primary">
											<i class="ace-icon fa fa-pencil-square-o align-top bigger-125"></i>
											Simpan Draft
										</button>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>	
	</form>
    
<script type="text/javascript">
// Submit upload
    $('#upload').submit(function(e) {
        var form = $('#upload')[0];
        var formData = new FormData(form);
    
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: '<?php echo base_url('Lap_pusdatin/prosesUploadLT'); ?>',
            data: formData,
            processData: false,
            contentType: false
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);
            if (out.status == true) {
			   $('#LIFT_MB').val(out.LIFT_MB);
			   $('#LIFT_GAS').val(out.LIFT_GAS);
               $("#POSISI_STOCK").val(out.POSISI_STOCK);
               $("#SALUR_GAS").val(out.SALUR_GAS);
              // $("#APBN").val(out.APBN);
			   //$("#DETAIL").val(out.DETAIL);
			  // $("#KETERANGAN").val(out.KETERANGAN);
            } else {
                alert(out.errorMsg);
            }
        })
        .error(function(data) {
            console.log(data);
        })

        e.preventDefault();
    });
// End Submit upload

function LtbjGet(){
	 var tanggal = $('#id-date-picker-1').val();
	//alert(tanggal); 
	// lakukan ajax 
	// untuk mendapatkan keterangan dan detail  sebelum tanggal tersebut
	$.ajax({
		type: "GET",
		dataType: "JSON",
		async: true,
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		url: "<?php echo site_url('Lap_pusdatin/showBeforeDateLiftingBj'); ?>",
		data: {
			"tanggal": tanggal
		},
		success: function(response){
			//var dataa = JSON.parse(response.KETERANGAN);
			//alert(dataa);
			//console.log(response["keterangan"]);
			//alert(response.keterangan);
			// tampilkan pada form di field keterangan dan detail
			
			
			
			//alert(response.gunung);
			//$('select[name="JENIS"]').val(response.jenis);
			//$('textarea[name="BERITA"]').val(response.berita);
			$('textarea[name="LIFT_MB"]').val(response.liftmb);
			$('textarea[name="LIFT_GAS"]').val(response.liftgas);
			$('textarea[name="POSISI_STOCK"]').val(response.posisistock);
			$('textarea[name="SALUR_GAS"]').val(response.salurgas);
		
			
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});
	
	//var detail = $('').val;
	//alert(keterangan);
  }
</script>    
    
    
<script type="text/javascript">
  jQuery(function($) {

    $('[data-rel=popover]').popover({html:true});
    $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
    
  });
  
  $('#form-tambah').submit(function(e) {
    var formData = new FormData($(this)[0]);
    var ID_JENIS_LAPORAN = $("#ID_JENIS_LAPORAN").val();
    formData.append("ID_JENIS_LAPORAN", ID_JENIS_LAPORAN);

    $.ajax({
      method: 'POST',
      url: '<?php echo base_url('Lap_pusdatin/prosesTambah'); ?>',
      data: formData,
      processData: false,
            contentType: false
    })
    .done(function(data) {
      var out = jQuery.parseJSON(data);
      if (out.status == 'form') {
        $('.form-msg').html(out.msg);
        effect_msg_form();
      } else {
        document.getElementById("form-tambah").reset();
        $('.msg').html(out.msg);
        effect_msg();
      }
    })
    .error(function(data) {
      console.log(data);
    })

    e.preventDefault();
  });
</script>