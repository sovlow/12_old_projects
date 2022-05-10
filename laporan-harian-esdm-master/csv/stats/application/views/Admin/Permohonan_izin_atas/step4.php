 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 <style type="text/css">
 button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}
</style>
<div class="row">
  <div class="box-body">

    <div class="widget-main">
      <div id="fuelux-wizard-container">
        <div>
          <ul class="steps">
            <li data-step="1">
              <!-- 
                edited by rendra 14:18, 03/07/2018 
                menambahkan href dan menambahkan style pada span class=step
              -->
              <a href="<?php echo base_url()?>Permohonan_izin_atas/step1" style="display: block; cursor: auto;">
                <span class="step" style="cursor: pointer;">1</span>
                <span class="title">Profile Perusahaan</span>
              </a>
            </li>

            <li data-step="2">
              <!-- 
                edited by rendra 14:18, 03/07/2018 
                menambahkan href dan menambahkan style pada span class=step
              -->
              <a href="<?php echo base_url()?>Permohonan_izin_atas/step3/<?php echo $bidder->ID_PERUSAHAAN?>" style="display: block; cursor: auto;">
                <span class="step" style="cursor: pointer;">2</span>
                <span class="title">Dokumen Persyaratan</span>
              </a>
            </li>

            <li data-step="3" class="active">
              <span class="step">3</span>
              <span class="title">Data Permohonan</span>
            </li>

            <li data-step="4">
              <span class="step">4</span>
              <span class="title">Draft Produk Izin</span>
            </li>

            <li data-step="5">
              <span class="step">5</span>
              <span class="title">Persetujuan/Pengesahan</span>
            </li>
          </ul>
        </div>
        <hr />

      </div>

    </div><!-- /.widget-main -->


    <form>
    <?=get_csrf_token()?>
     <iframe style="margin-top: 10px; border: 0px;" src="<?=$enkriptedQS?>" width="100%" scrolling="no"></iframe>
     <p id="callback">
     </p>
   </form>

 </div>
 <div style="overflow:auto;">
  <div style="float:left;">
    <button class="btn-sm btn-danger"><a href="<?php echo site_url('Permohonan_izin_atas') ?>" style="color: white"><i class="fa fa-times"></i> Cancel</a></button>
  </div>
  <div style="float:right;">
    <a href="<?php echo base_url()?>Permohonan_izin_atas/step3/<?php echo $bidder->ID_PERUSAHAAN?>" class="btn btn-info btn-minier"><i class="fa fa-chevron-left"></i> Kembali</a>
    <a href="<?php echo base_url()?>Permohonan_izin_atas/step5/<?php echo $bidder->ID_PERUSAHAAN?>" class="btn btn-success btn-minier">Berikutnya <i class="fa fa-chevron-right"></i></a>
  </div>
</div>
</form>
</div>
</div>

<div id="tempat-modal"></div>


<style type="text/css">
textarea{
  width: 100%;
  resize: vertical;
}
div.col-md-12{
  margin-top: 10px;
}
div.col-md-8{
  padding: 0;
}
.steps li.active .step{
  background-color: #fff000;
}
table.table-bordered thead td{
  background-color: #c0d9ec;
  color: black;
  font-weight: 700;
}
</style>
<script type="text/javascript">

  iFrameResize({
        log                     : true,                  // Enable console logging
        inPageLinks             : true,
        resizedCallback         : function(messageData){ // Callback fn when resize is received
          // $('p#callback').html(
          //   '<b>Frame ID:</b> '    + messageData.iframe.id +
          //   ' <b>Height:</b> '     + messageData.height +
          //   ' <b>Width:</b> '      + messageData.width +
          //   ' <b>Event type:</b> ' + messageData.type
          //   );
        },
        messageCallback         : function(messageData){ // Callback fn when message is received
          // $('p#callback').html(
          //   '<b>Frame ID:</b> '    + messageData.iframe.id +
          //   ' <b>Message:</b> '    + messageData.message
          //   );
          alert(messageData.message);
          // document.getElementsByTagName('iframe')[0].iFrameResizer.sendMessage('Hello back from parent page');
        },
        closedCallback         : function(id){ // Callback fn when iFrame is closed
          // $('p#callback').html(
          //   '<b>IFrame (</b>'    + id +
          //   '<b>) removed from page.</b>'
          //   );
        }
      });

  function f_show(obj) {
    if(obj.value){
      $('div[id^=dokumen]').attr("style","display:none");
      $("#dokumen"+obj.value).attr("style","display:block");
    } else {        
      $('div[id^=dokumen]').attr("style","display:none");
    }
  }

  $(document).ready(function(){
    $('#PROVINSI').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>Profile_perusahaan/get_kabkot",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html += '<option value="'+data[i].ID_KABKOT+'">'+data[i].NAMA_KABKOT+'</option>';
          }
          $('.KABKOT').html(html);
        }
      });
    });
  });


</script>