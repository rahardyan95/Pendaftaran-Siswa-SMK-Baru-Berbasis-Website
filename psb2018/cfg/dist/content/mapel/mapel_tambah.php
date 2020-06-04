<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
            <h5>Tambah Data Mata Pelajaran</h5>
            <ul class="nav pull-right">
              <li>
                <div class="btn-group">
                  <a class="accordion-toggle btn btn-default btn-xs minimize-box" data-toggle="collapse" href="#div-1">
                    <i class="fa fa-minus"></i>
                  </a> 
                  <button class="btn btn-danger btn-xs close-box">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </li>
            </ul>
      </header>

      <div id="div-1" class="body collapse in">
        <form action="?page=svmapel" method="post">
          
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Mata Pelajaran</label>
            <div class="col-lg-8">
              <input type="text" id="mapel" name="mapel" placeholder="Mata pelajaran" class="form-control" required="required">
            </div>
          </div>

          <div class="form-actions">
            <div class="col-lg-8">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->