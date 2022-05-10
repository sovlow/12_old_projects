<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-3">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kabkot"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>PROVINSI</th>
          <th>NAMA</th>
          <th>NAMA EN</th>
          <th>MULAI EXIST</th>
          <th>AKHIR EXIST</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-kabkot">
    </tbody>
  </table>
</div>
</div>

<?php echo $modal_add_kabkot; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKabkot', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
$data['judul'] = 'Kabupaten Kota';
$data['url'] = 'Kabkot/import';
echo show_my_modal('Admin/modals/modal_import', 'import-kabkot', $data);
?>
