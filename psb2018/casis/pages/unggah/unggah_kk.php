  <?php
      include "../conf/koneksi.php";
      include "../lib/inc.session.sis.php";   
  ?>

  <script type="text/javascript">
    function validasi(){
      /*--- validasi unggah dok kk ---*/
      var img_kk = (form1.fupload_kk.value);
      if(img_kk == ""){
        alert("Pilih file dokumen kartu keluarga.");
        document.form1.fupload_kk.focus();
        return false;
      }
    }
  </script>
	 
  <form role="form" name="form1" action="?page=svkk" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">

          <div class="panel-heading">Unggah Dokumen Kartu Keluarga</div>
          <div class="panel-body">

            <div class="form-group">
              <label>Pilih dokumen</label>
              <input type="file" name="fupload_kk">
              <p class="help-block">File dokumen harus bertipe *.jpeg, *.jpg, atau *.png</p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-left" name="submit">Save</button>
            </div>

          </div>
      </div>
    </div>
  </form>
  

  