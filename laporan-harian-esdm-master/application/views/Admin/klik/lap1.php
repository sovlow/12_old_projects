<div class="box-body">
<table id="list-data" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal Laporan</th>
      <th>Berita</th>
      <th>Jenis</th>
      <th>Url</th>
      <th style="text-align: center;">Aksi</th>
    </tr>
  </thead>
  <tbody>
<?php
$no = 1;
foreach ($dataSet as $data) {
  ?>
  <tr>
    <td width="2%"><?php echo $no; ?></td>
    <td><?php echo $data->TANGGAL_LAPORAN; ?></td>
    <td><?=nl2br(htmlspecialchars($data->BERITA))?></td>
    <td><?php echo $data->JENIS; ?></td>
    <td><?php echo $data->URL; ?></td>
    <td class="text-center" style="min-width:230px;">

    <button class="btn btn-warning update-dataDraftKlikMigas btn-minier" data-id="<?php echo $data->ID_LAPORAN; ?>" data-jenis="<?php echo 1 ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
    <?php if($IS_POST == 'Y'){ ?>
      <button class="btn btn-success konfirmasiPost-admin btn-minier" data-id="<?php echo $data->ID_LAPORAN; ?>" data-toggle="modal" data-target="#konfirmasiPostSingle"><i class="glyphicon glyphicon-ok"></i> POST</button>          
  <?php } ?>
  </td>
</tr>
<?php
$no++;
}
?>

</tbody>
</table>
<div id="tempat-modal"></div>
</div>

<script type="text/javascript">
  
</script>

