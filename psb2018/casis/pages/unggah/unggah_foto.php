  <?php
      include "../conf/koneksi.php";
      include "../conf/library.php";
      include "../lib/inc.session.sis.php";   
  ?>

  <script type="text/javascript">
    function validasi(){
      /*--- validasi unggah dok foto ---*/
      var img_ft = (form1.fupload_ft.value);
      if(img_ft == ""){
        alert("Pilih file dokumen foto.");
        document.form1.fupload_ft.focus();
        return false;
      }
    }
  </script>
   
  <form role="form" name="form1" action="?page=svft" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">

          <div class="panel-heading">Unggah Dokumen Foto</div>
          <div class="panel-body">

            <div class="form-group">
              <label>Pilih dokumen</label>
              <input type="file" name="fupload_ft">
              <p class="help-block">File dokumen harus bertipe *.jpeg, *.jpg, atau *.png</p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-left" name="submit">Save</button>
            </div>

          </div>
      </div>
    </div>
  </form>
  

  