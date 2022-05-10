<form id="form-tambah-provinsi" method="POST">
<?=get_csrf_token()?>
<div class="modal-content" style="border-radius: 10px">
  <div class="modal-header" style="background-color:SteelBlue; color:white;border-radius: 10px 10px 0 0;">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" style="text-align: center;"><strong>Tambah Data Provinsi</strong></h4>
  </div>
  <div class="form-msg"></div>
  <div class="modal-body">
      <input type="hidden" name="EDIT_BY" value="<?php echo $this->userdata->USERNAME ?>">
      <input type="hidden" name="DATE_MODIFIED" value="<?php echo date('Y-m-d') ?>">
    <div class="profile-user-info profile-user-info-striped">
      <div class="profile-info-row">
        <div class="profile-info-name" style="min-width: 200PX">
          NAMA
        </div>

        <div class="profile-info-value">
          <input class="form-control" type="text" name="NAMA_PROVINSI" id="" placeholder="Masukkan Nama..." style="width: 100%;">
        </div>
      </div>

      <div class="profile-info-row">
        <div class="profile-info-name" style="min-width: 200PX">
          NAMA EN
        </div>

        <div class="profile-info-value">
          <input class="form-control" type="text" name="NAMA_PROVINSI_EN" id="" placeholder="Masukkan Nama English..." style="width: 100%;">
        </div>
      </div>
      
      <div class="profile-info-row">
        <div class="profile-info-name" style="min-width: 200PX">
          MULAI EXIST
        </div>

        <div class="profile-info-value">
          <input type="date" class="form-control" name="MULAI_EXIST" style="width: 100%;">
        </div>
      </div>
      
      <div class="profile-info-row">
        <div class="profile-info-name" style="min-width: 200PX">
          AKHIR EXIST
        </div>

        <div class="profile-info-value">
          <input type="date" class="form-control" name="AKHIR_EXIST" style="width: 100%;">
        </div>
      </div>
      
      <div class="profile-info-row">
        <div class="profile-info-name" style="min-width: 200PX">
          KODE
        </div>

        <div class="profile-info-value">
          <input type="text" class="form-control" name="KODE_PROVINSI" style="width: 100%;">
        </div>
      </div>
    </div>
  </div>

  <div class="modal-footer" style="border-radius:0 0 10px 10px;">
    <button type="submit" class='btn btn-sm btn-primary'>
      <i class='ace-icon fa fa-save'></i>
      Save
    </button>
    <button class='btn btn-sm btn-danger' data-dismiss='modal'>
      <i class='ace-icon fa fa-times'></i>
      Cancel
    </button>
  </div>
</div>
</form>

<script type="text/javascript">
  $('[data-rel=popover]').popover({html:true});
</script>



