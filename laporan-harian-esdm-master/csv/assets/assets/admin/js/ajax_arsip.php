<script>
    var MyTable = $('#list-data2').dataTable({
    });

    window.onload = function() {
      // tampilIzinEval();
      <?php
      if ($this->session->flashdata('msg') != '') {
        echo "effect_msg();";
      }
      ?>
    }

    function refresh() {
      MyTable = $('#list-data2').dataTable();
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

  // function tampilIzinEval() {
  //   $.get('<?php //echo base_url('Permohonan_izin_eval/tampil2'); ?>', function(data) {
  //     MyTable.fnDestroy();
  //     $('#data-izinEval').html(data);
  //     refresh();
  //   });
  // }
</script>
<script type="text/javascript">
  jQuery(function($) {

    $('[data-rel=popover]').popover({html:true});
    
  });
</script>