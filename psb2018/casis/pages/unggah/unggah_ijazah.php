  <?php
      include "../conf/koneksi.php";
      include "../conf/library.php";
      include "../lib/inc.session.sis.php";   
  ?>

  <script type="text/javascript">
    function validasi(){
      /*--- validasi unggah dok ijazah ---*/
      var img_iz = (form1.fupload_iz.value);
      if(img_iz == ""){
        alert("Pilih file dokumen ijazah.");
        document.form1.fupload_iz.focus();
        return false;
      }
    }
  </script>
   
  <form role="form" name="form1" action="?page=sviz" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">

          <div class="panel-heading">Unggah Dokumen Ijazah/SKHU/SKL</div>
          <div class="panel-body">

            <div class="form-group">
              <label>Pilih dokumen</label>
              <input type="file" name="fupload_iz">
              <p class="help-block">File dokumen harus bertipe *.jpeg, *.jpg, atau *.png</p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-left" name="submit">Save</button>
            </div>

          </div>
      </div>
    </div>
  </form>
  

  